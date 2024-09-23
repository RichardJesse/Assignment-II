<?php

use Auth\Authenticator;

include_once  '../autoload.php';
session_start();
$authenticator = new Authenticator();

$authenticator->restrictedPageGuard('user_id', 'login.php');


$mainPage = new MainPage();
$table = new Table();
$user = new \Entities\User();
$allUsers = $user->all();
$headers = ["ID", "Username", "Email", "Created At"];
$content = $allUsers;

$mainPageContent = $mainPage->content($table->content($headers, $content));



$tags->bodySkeleton('Main Page | Where The Magic Happens✨', $mainPageContent );


