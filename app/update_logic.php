<?php

// use the update profile function to add
//  the changed details to the database

use Entities\User;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User;


    $username = $_POST['username'];
    $email = $_POST['email'];

    $data = [
        'username' => $username,
        'email' => $email
    ];

    
    // $user->updateProfile($data);
    // update function implementation pending completion

}
