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

    <title>Uni - Quiz</title>
    <link rel="shortcut icon" type="image/png" href="../bower_components/bootstrap/imgs/titleicon2.png"/>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="container row">
                <a class="navbar-brand col-lg-3 " style="color: #f3e8e8" href="#"> <?php
                    echo "Welcome " . Session::get('user')['NAME'];
                    ?> </a>
                <a class="navbar-brand col-lg-1 " style="color: #f3e8e8" href="#"> ADMIN </a>
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
        <!-- /.navbar-header -->
        <div class="col-sm-offset-6" >
            <ul class="nav navbar-top-links navbar-right ">

                <!-- /.dropdown -->
                <li class="dropdown " style="float:right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down" ></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="adminProfileDetails.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="adminProfileUpdate.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>

                        <li><a value="true" href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>

                </li>

            </ul>
        </div>

    </nav>

    <div class="navbar-default  sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="admin.php?q=1"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="admin.php?q=2"><i class="fa fa-fw fa-bar-chart-o"></i>Registered Users</a>
                </li>
                <li>
                    <a href="admin.php?q=3"><i class="fa fa-fw fa-table"></i> User Feedback</a>
                </li>
                <li>
                    <a href="admin.php?q=111"><i class="fa fa-fw fa-edit"></i> Ranking</a>
                </li>
                <li>
                    <a href="result.php?q=1"><i class="fa fa-fw fa-edit"></i> Results</a>
                </li>
                <li>
                    <a href="http://localhost/unibook3/pages/index.php" target="_blank"><i class="fa fa-fw fa-edit"></i> User Section</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i
                                class="fa fa-fw fa-arrows-v"></i> Exam <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="admin.php?q=6">Assign Set</a>
                        </li>
                        <li>
                            <a href="admin.php?q=4">Add New Subject</a>
                        </li>
                        <li>
                            <a href="admin.php?q=5">Delete Subject</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
</div>

<!-- /#page-wrapper -->
<!-- /#page-wrapper -->

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Notifications - Use for reference -->
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
