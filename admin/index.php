<?php
require_once '../core/Config.php';
session_start();
$_SESSION['sn']=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login Signup</title>
    <link rel="shortcut icon" type="image/png" href="../bower_components/bootstrap/imgs/titleicon2.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <script src="../bower_components/bootstrap/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            margin: auto;
            min-height: 200px;
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="#"><i class="glyphicon glyphicon-question-sign"></i></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li>
                    <button style="background-color: inherit;color: white" type="button" class="navbar-brand btn active"
                            data-toggle="modal"
                            data-target="#myHome">Home
                    </button>
                </li>
                <li>
                    <button style="background-color: inherit;color: white" type="button" class="navbar-brand btn active"
                            data-toggle="modal"
                            data-target="#myAbout">About
                    </button>
                </li>
                <li>
                    <button style="background-color: inherit;color: white" type="button" class="navbar-brand btn active"
                            data-toggle="modal"
                            data-target="#myContact">Contact
                    </button>
                </li>

                <div id="myAbout" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Who we are...</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal text-justify text-capitalize ">
                                    <div class="form-group">
                                        <label class="control-label col-lg-11">We Provide the best Online Assessment
                                            Based on Latest Set Available. </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-11">The Comprehensive Test for JAVA , CSS 3,
                                            C Language and many more. </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-11">If You want to Improve your programming
                                            Skills Than hop in And test </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-8">Yourself among the best Sets of Quizes
                                            Online .</label>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div id="myContact" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Contact us...</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal text-justify text-uppercase">
                                    <div class="form-group ">
                                        <label class="control-label col-lg-10">Main Developer by Anupam
                                            Srivastav</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-10">Grab me on Fb @ <a
                                                href="www.facebook.com/anupamsri">anupamsri@facebook.com</a></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-10">Co Developer Archana Singh</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-10">Grab Me on Fb @<a href="#">archana@facebook.com</a>
                                        </label>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button style="margin-top: 7px;" type="button" class="nav navbar-nav btn btn-primary"
                            data-toggle="modal"
                            data-target="#myModal">Login
                    </button>
                </li>
                <!--</ul>-->
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Admin Login</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="" method="post">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email_login">Email:</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email_login" name="email_login"
                                                   value=""
                                                   placeholder="Enter email" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="password_login">Password:</label>

                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password_login"
                                                   name="password_login" value=""
                                                   placeholder="Enter password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" value="login" name="login" class="btn btn-default">
                                            <input type="checkbox" checked="checked" name="rem"><label>Remember
                                                Me</label>
                                        </div>
                                    </div>

                                    <?php
                                    $error = ''; // Variable To Store Error Message
                                    if (isset($_POST['login'])) {
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

                                            ?>
                                            <script>window.location = "admin.php";</script>
                                        <?php
                                        } else {
                                        ?>
                                            <script>window.alert("Login Details do not Match Please fill correct details or Register.");</script>
                                            <?php
                                        }
                                    }
                                    ?>

                            </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!--<ul class="nav navbar-nav navbar-right"> -->
                <li>
                    <button style="margin-top: 7px;" type="button" class="nav navbar-nav btn btn-primary"
                            data-toggle="modal"
                            data-target="#myModal1">Admin Register
                    </button>
                </li>
            </ul>
            <!-- Modal -->
            <div id="myModal1" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Registeration Form</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" action="" method="post">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="name">Name:</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" value=""
                                               placeholder="Enter Name" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Email:</label>

                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="email" name="email" value=""
                                               placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="password">Password:</label>

                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="password" name="password"
                                               value="" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="mobile">Mobile No:</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="mobile" name="mobile" value=""
                                               placeholder="Enter Mobile No." maxlength="11">
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8">
                                <input type="submit" value="Register" name="submit"
                                       class="btn btn-default">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            extract($_POST);
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $mobile = $_POST['mobile'];
                            $user = new User();
                            $sql = $user->addAdmin($name, $email, $password, $mobile);
                            if (($sql) === TRUE) { ?>
                                <script>window.alert("Registerd Successfully Proceed to login");</script>
                            <?php

                            } else {
                            ?>
                                <script>window.location = "index.php";</script>
                                <?php
                            }
                        }
                        ?>
                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="../bower_components/bootstrap/imgs/quiz.jpg" style="height:250px;" class="img-responsive"
                 alt="Image">

            <div class="carousel-caption">
                <h3>Test Yourself</h3>

                <p>Among the best</p>
            </div>
        </div>

        <div class="item">
            <img src="../bower_components/bootstrap/imgs/css.jpg" style="height:250px;" class="img-responsive"
                 alt="Image">

            <div class="carousel-caption">
                <h3>Take Test</h3>

                <p>Improve more</p>
            </div>
        </div>
        <div class="item">
            <img src="../bower_components/bootstrap/imgs/php1.jpg" style="height:250px;" class="img-responsive"
                 alt="Image">

            <div class="carousel-caption">
                <h3>Welcome</h3>

                <p>Have fun Improving</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container text-center">
    <h3>What We Do</h3><br>

    <div class="row">
        <div class="col-sm-4">
            <a href="#"><img src="../bower_components/bootstrap/imgs/c.jpg" class="img-responsive" style="width:100%"
                             alt="Image"></a>

            <p>C Language</p>
        </div>
        <div class="col-sm-4">
            <a href="#"> <img src="../bower_components/bootstrap/imgs/php2.jpg" class="img-responsive"
                              style="width:100%"
                              alt="Image"> </a>

            <p>Php</p>
        </div>
        <div class="col-sm-4">
            <a href="#"> <img src="../bower_components/bootstrap/imgs/java2.jpg" class="img-responsive"
                              style="width:100%"
                              alt="Image"></a>

            <p>Java</p>
        </div>
    </div>
</div>
<br>

<footer class="container-fluid text-center">
    <p>Developed by Anupam Srivastav & Archana Singh</p>
</footer>

</body>
</html>
