<?php



include '../autoload.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = new \Entities\User();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];


    try {

       

        

        $message = $user->register($username, $email, $password);

       
        

        if ($message === 'Registration successfull!') {

           $activationInfo = array('email' => $email); 
            
           
           $response = array(
               "status" => 'success',
               "message" => "Signup successfully!",
               "redirect" => 'activate.php?' . http_build_query($activationInfo)
            );
            
         
        } elseif ($message === "Username exists!") {

            $response = array(
                "status" => 'failed',
                "message" => "Username already exists!",
                "field" => "username" 
            );
            
        }

        elseif($message === "Email already has an account") {

            $response = array(
                "status" => 'failed',
                "message" => "Email Taken",
                "field" => "email" 
            );
             
        }
        
        else {

            $response = array(
                "status" => 'failed',
                "message" => $message
            );
        }
    } catch (Exception $e) {
        var_dump($e);

        $response = array(
            "status" => 'error',
            "message" => "An unexpected error occurred: " . $e->getMessage()
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
} // Return the JSON response

