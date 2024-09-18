<?php
require_once 'User.php';
User::logout();
header('location: index.php');