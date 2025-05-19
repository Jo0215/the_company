<?php
include'../classes/User.php';
$user = new User;

$user->register(request:$_POST);