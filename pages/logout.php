<?php
session_start();
require_once '../core/classes/User.php';
require_once '../core/classes/Redirect.php';

$user= new User();
if('true') {
    $status = $user->logout();
    if ($status) {
        Redirect::to('../index.php');
    } else {
        Redirect::with('index.php?e=4');
    }
}
?>