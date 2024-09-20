
<?php

include_once '../autoload.php';

$tags = new Tags();
$toast = new Toast();
$signUpForm = new SignUpForm();


$tags->bodySkeleton('Sign Up | Lets Go!', $signUpForm->content($toast->content()) );