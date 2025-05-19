<?php

include '../classes/User.php';
$user = new User;
session_start();

$user ->update($_POST);