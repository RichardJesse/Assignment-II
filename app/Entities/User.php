<?php

namespace Entities;

use Activation;
use PDO;
use ValidationRule;

class User extends AbstractEntities
{
    use \HasPageActions;
    use ValidationRule;


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

        $this->validate($email, $password, $username);

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

        if ($user == null) {
            return "email does not exist";
        }

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
     * updating the user information based on the change that was made
     * 
     * @param $data - array 
     * 
     * @return bool|string 
     * 
     */
    public function updateProfile($data)
    {


        if (!$this->isArray($data)) {
            return 'there is a problem with the data that you are sending';
        }
            

        $update = User::build()->update('users');

        $oldDetails = $this->findUserByEmail($data['email']);

        if ($oldDetails['email'] != $data['email']) {

            $update->set('email',$data['email'] );
        }

        if ($oldDetails['username'] != $data['username']) {

            $update->set('username',$data['username'] );
        }
        

        $update->where('email', $oldDetails['email']);
        
        if($update){
            return true;
        }

        return false;

        
    }

    /**
     * Finds all associated user details
     *
     * @param $email
     * @return mixed
     */
    public function findUserByEmail($email)
    {
        if (!($this->checkEmailExists($email))) {
            return null;
        }

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

    /**
     * Check if the email exists
     * 
     * @return bool
     */
    public function checkEmailExists($email)
    {
        $match = User::query()->select()->where('email', $email)->rowCount();
        return $match > 0;
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

    /**
     * Get all the user record
     * 
     * 
     * @return array
     */
    public  function all()
    {
        $users = User::query()->select()->fetchArrays();

        return $users;
    }
}
