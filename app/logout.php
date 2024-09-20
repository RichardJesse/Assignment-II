<?php

include_once '../autoload.php';

session_start();
$user = new \Entities\User();
$user->logUserOut('login.php');