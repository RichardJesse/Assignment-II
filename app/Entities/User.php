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
    public function register($username, $email, $password) {
        if (empty($username) || empty($email) || empty($password)) {
            return "All fields are required!";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $verification = new \Verification();
        $mail = new \Entities\Mail();
        $activation = new Activation();
        $activation_code = $activation->generateCode();

        

        
        
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
                return json_encode("Username or email already exists!") ;
            } else {
                return "Error: " . $e->getMessage().json_encode();
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
    public function login($email, $password) {
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
    public function findUserByEmail($email) {
        $user = User::query()->select()->where('email', $email)->fetchFirstArray();

        return $user;
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
    public function current() {
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
        $sql = "SELECT * FROM users";
        $stmt = $this->db->query($sql);


        $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $user;
    }


}