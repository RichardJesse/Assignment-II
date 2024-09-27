<?php
include '../autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$user = new \Entities\User();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginResult = $user->login($email, $password);

    if ($loginResult === 'success') {

        $response = array(
            "status" => 'success',
            "message" => "Login successful!"
        );



    } else {

        $response = array(
            "status" => 'failed',
            "message" => $loginResult
        );


    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
