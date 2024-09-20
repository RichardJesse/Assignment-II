<?php

include_once  '../autoload.php';
session_start();

$tags = new Tags();
$mainPage = new MainPage();
$table = new Table();
$user = new \Entities\User();
$allUsers = $user->all();
$headers = ["ID", "Username", "Email", "Created At"];
$content = $allUsers;

$mainPageContent = $mainPage->content($table->content($headers, $content));



$tags->bodySkeleton('Main Page | Where The Magic Happens✨', $mainPageContent );


