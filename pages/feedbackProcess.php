<?php
require_once '../core/Config.php';
date_default_timezone_set('Asia/Kolkata');
session_start();
if (isset($_POST['submit_feedback'])) {
    $user_id=Session::get('user')['USER_ID'];
    $user_name=Session::get('user')['NAME'];
    $feedback = $_POST['feedback'];
    $InsertInto=new InsertInto();
    $put = $InsertInto->addFeedback($user_id,$user_name,$feedback);
    if (($put) === TRUE) {
        Redirect::to('index.php');
    }

}
    ?>