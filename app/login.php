<?php

include_once '../autoload.php';

$tags = new Tags();
$toast = new Toast();
$loginForm = new LoginForm();
$tags->bodySkeleton('Login | Get In!', $loginForm->content($toast->content()));