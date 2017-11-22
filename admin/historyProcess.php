<?php
require_once '../core/Config.php';
$user = new User();
$InsertInto = new InsertInto();

if (isset(Session::get('user')['ID'])) {
    $user_id = Session::get('user')['ID'];
    $user_name = Session::get('user')['NAME'];
    $user_email = Session::get('user')['EMAIL'];
    //$user_college_name = Session::get('user')['COLLEGE_NAME'];
    date_default_timezone_set('Asia/Kolkata');
    $t = time();
    $query = $user->db->get("SELECT * FROM history WHERE USER_ID='$user_id'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $last_login = $row['LAST_LOGIN_TIME'];
        $current_login_time = date("Y-m-d H:i:s", $t);
        $put = $InsertInto->addHistory($user_id, $user_name, $user_email, $current_login_time);
    } else {
        $current_login_time = date("Y-m-d H:i:s", $t);
        $last_login = $current_login_time;
        $put = $InsertInto->addHistory($user_id, $user_name, $user_email, $current_login_time);
    }
}
?>