<?php
require_once '../core/Config.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
if (!Session::get('user')['NAME']) {
    Redirect::to('../index.php');
}
?>
<!DOCTYPE html>

<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Uni-book</title>
    <link rel="shortcut icon" type="image/png" href="../bower_components/bootstrap/imgs/titleicon2.png"/>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">


    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>

<body>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="container row">
                <a class="navbar-brand col-lg-3" href="#"> <?php
                    echo "Welcome " . Session::get('user')['NAME'];
                    ?> </a>
                <a class="navbar-brand col-lg-offset-5 col-md-offset-4 col-sm-offset-3 col-xs-offset-0" href="#">
                    <?php
                    if (Session::get('login_status') === true) {
                        require_once 'historyProcess.php';
                        $_SESSION['last'] = $last_login;
                        echo "<div class='badge'>Last login " . $_SESSION['last'] . "</div>";
                        Session::put('login_status', 2);
                    } elseif (Session::get('login_status') === 2) {
                        echo "<div class='badge'>Last login " . $_SESSION['last'] . "</div>";
                    }
                    ?> </a>
            </div>
        </div>

        <div class="col-sm-offset-6" >
            <ul class="nav navbar-top-links navbar-right ">

                <li class="dropdown " style="float:right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down" ></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="userProfileDetails.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="userProfileUpdate.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>

                        <li><a value="true" href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>

                </li>

            </ul>
        </div>

    </nav>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

            </ul>
        </div>

</div>


<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>


<script src="../dist/js/sb-admin-2.js"></script>

<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
</script>

</body>

</html>
