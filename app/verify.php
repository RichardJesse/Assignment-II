<?php


include_once  '../autoload.php';

$code = $_GET['code'];

$tags->bodySkeleton('verificaiton table', $verify->content(base64_decode($code)));