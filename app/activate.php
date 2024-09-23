<?php

include_once  '../autoload.php';

$activate = new Activate();

$tags->bodySkeleton('Email Verification ', $activate->content());