<?php


include_once '../autoload.php';

use Entities\User;



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();
    $user = new User();


    $username = $_POST['username'];
    $email = $_POST['email'];

    $data = [
        'username' => $username,
        'email' => $email
    ];

    
    $updated = $user->updateProfile($data);
    $redirect = new class(){
        use HasPageActions;
        public function updated(){
            $this->redirect('index.php');
        }
    };

    if($updated){
        
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        
        
        $_SESSION['username'];
        $_SESSION['email'];

        // $redirect->updated();
    }
    

}
