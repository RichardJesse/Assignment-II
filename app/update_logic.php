<?php


include_once '../autoload.php';

use Entities\User;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User();


    $username = $_POST['username'];
    $email = $_POST['email'];

    $data = [
        'username' => $username,
        'email' => $email
    ];

    
    $user->updateProfile($data);
    $redirect = new class(){
        use HasPageActions;
        public function updated(){
            $this->redirect('index.php');
        }
    };

    $redirect->updated();


}
