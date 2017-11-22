<?php
require_once 'core/Config.php';
session_start();
if (isset($_POST['signinadmin'])) {
    extract($_POST);
    $user = new User();
    $email_login = $_POST['email_login'];
    $password_login = $_POST['password_login'];
    if (isset($_POST['rem'])) {
        $status = $user->loginAdmin($email_login, $password_login, true);

    } else {
        $status = $user->loginAdmin($email_login, $password_login);
    }
    if ($status != 'invalid credentials' || $status === true) {

        header("Location:admin/admin.php?q=1");
    } else {
        ?>
        <script>window.alert("Login Details do not Match Please fill correct details or Register.");</script>

        <?php
        header("Location:index.php");
    }
} else
    if (isset($_POST['signinfac'])) {
        extract($_POST);
        $user = new User();
        $email_login = $_POST['email_login'];
        $password_login = $_POST['password_login'];
        if (isset($_POST['rem'])) {
            $status = $user->loginAdmin($email_login, $password_login, true);

        } else {
            $status = $user->loginAdmin($email_login, $password_login);
        }
        if ($status != 'invalid credentials' || $status === true) {

            header("Location:admin/faculty.php?q=1");
        } else {
            ?>
            <script>window.alert("Login Details do not Match Please fill correct details or Register.");</script>
            <?php
            header("Location:index.php");
        }
    } else
        if (isset($_POST['signinstu'])) {
            extract($_POST);
            $user = new User();
            $email_login = $_POST['email_login'];
            $password_login = $_POST['password_login'];
            if (isset($_POST['rem'])) {
                $status = $user->login($email_login, $password_login, true);

            } else {
                $status = $user->login($email_login, $password_login);
            }
            if ($status != 'invalid credentials' || $status === true) {

                header("Location:pages/index.php");
            } else {
                ?>
                <script>window.alert("Login Details do not Match Please fill correct details or Register.");</script>
                <?php
                header("Location:index.php");
            }
        }
?>
