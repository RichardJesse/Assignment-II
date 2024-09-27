<?php

namespace Entities;

use Activation;

class User extends AbstractEntities
{
    use \HasPageActions;


    private $id;
    private $username;
    private $password;
    private $emailAddress;


    /**
     * Adds users details to the database
     *
     * @param $username
     * @param $email
     * @param $password
     * @return false|string
     */
    public function register($username, $email, $password)
    {
        if (empty($username) || empty($email) || empty($password)) {
            return "All fields are required!";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $verification = new \Verification();
        $mail = new \Entities\Mail();
        $activation = new Activation();
        $activation_code = $activation->generateCode();


        if ($this->checkUsernameExists($username)) {
            return "Username exists!";
        }

        if ($this->checkEmailExists($email)) {
            return "Email already has an account";
        }

        $passwordRule = $this->evaluatePassword($password);
        if ($passwordRule['isValid'] == false) {
            foreach ($passwordRule['messages'] as $message) {
                return $message;
            }
        }


        try {

            $sql = "INSERT INTO users (username, email, password, activation_code) 
                    VALUES (:username, :email, :password, :activation_code)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':activation_code', $activation_code);



            $stmt->execute();


            if ($stmt->rowCount() > 0) {
                $mail->sendMailWithTemplate($email, "Verify Email", $verification->content($activation->generateActivationLink(APP_URL, 'verify.php', $activation_code), $username));

                return "Registration successfull!";
            } else {
                return "Registration failed!";
            }
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                return json_encode("Username or email already exists!");
            } else {
                return "Error: " . $e->getMessage() . json_encode();
            }
        }
    }

    /**
     * verifies users credentials before logging them in
     *
     * @param $email
     * @param $password
     * @return string
     */
    public function login($email, $password)
    {
        $user = $this->findUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['created_at'] = $user['created_at'];
            return 'success';
        } else {
            return 'Invalid email or password.';
        }
    }

    /**
     * Finds all associated user details
     *
     * @param $email
     * @return mixed
     */
    public function findUserByEmail($email)
    {

        $user = User::query()->select()->where('email', $email)->fetchFirstArray();
        return $user;
    }


    /**
     * Checks if the username exists
     * 
     * @param $username
     * 
     * @return bool
     * 
     */
    public function checkUsernameExists($username)
    {

        $match = User::query()->select()->where('username', $username)->rowCount();
        return $match > 0;
    }

    public function checkEmailExists($email)
    {

        $match = User::query()->select()->where('email', $email)->rowCount();
        return $match > 0;
    }

    /**
     * Evaluates if a password meets specified rules.
     *
     * @param string $password The password to evaluate.
     * @return array An array containing the evaluation result and messages.
     */
    function evaluatePassword($password)
    {

        $result = [
            'isValid' => true,
            'messages' => []
        ];


        if (strlen($password) < 8) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must be at least 8 characters long.";
        }


        if (!preg_match('/[A-Z]/', $password)) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must include at least one uppercase letter.";
        }


        if (!preg_match('/[a-z]/', $password)) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must include at least one lowercase letter.";
        }


        if (!preg_match('/[0-9]/', $password)) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must include at least one number.";
        }


        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $result['isValid'] = false;
            $result['messages'][] = "Password must include at least one special character.";
        }

        return $result;
    }

    /**
     * Validates if the email is in the correct format.
     *
     * @param string $email The email to validate.
     * @return bool Returns true if the email is valid, false otherwise.
     */
    function validateEmail($email)
    {
        // Use PHP's built-in filter to validate email format
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }


    /**
     * Validates if the username follows specific format rules.
     *
     * @param string $username The username to validate.
     * @return array An array containing the evaluation result and messages.
     */
    function validateUsername($username)
    {
        $result = [
            'isValid' => true,
            'messages' => []
        ];


        if (strlen($username) < 4 || strlen($username) > 20) {
            $result['isValid'] = false;
            $result['messages'][] = "Username must be between 4 and 20 characters.";
        }


        if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            $result['isValid'] = false;
            $result['messages'][] = "Username can only contain letters, numbers, and underscores.";
        }

        return $result;
    }


    /**
     * Destroys the current logged in user session
     *
     * @param $redirectPage
     * @return void
     */
    public function logUserOut($redirectPage)
    {
        $this->logOut($redirectPage);
    }

    /**
     * Returns all the details of the current user
     *
     * @return array|null
     */
    public function current()
    {
        if (isset($_SESSION['user_id'])) {
            return [
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username'],
                'email' => $_SESSION['email'],
                'created_at' => $_SESSION['created_at']
            ];
        } else {
            return null;
        }
    }

    public  function all()
    {
        $users = User::query()->select()->fetchArrays();

        return $users;
    }
}
