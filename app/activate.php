<?php

include_once  '../autoload.php';

$activate = new Activate();
$unverifiedEmail = $_GET['email'];

$tags->bodySkeleton('Email Verification ', $activate->content($unverifiedEmail));