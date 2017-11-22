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

    <title>Online Quiz</title>

    <link rel="shortcut icon" type="image/png" href="../bower_components/bootstrap/imgs/titleicon.png"/>
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/clocktimer.css" rel="stylesheet">

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
<?php
$name = @$_GET['title'];
?>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fix-top" style="padding: 0px; margin: 0px; border-radius: 0px;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="container row">
                <a class="navbar-brand col-lg-3" style="color: #f3e8e8" href="#"> <?php
                    echo "Welcome " . Session::get('user')['NAME'];
                    ?> </a>
                <a class="navbar-brand " style="color: #f3e8e8" href="#">
                    <?php echo $name; ?>

                </a>
                <a class="navbar-brand col-lg-offset-6" style="color: #f3e8e8" href="#">
                    <button type="button" class="badge" data-toggle="modal" data-target="#myModal">Calculator
                    </button>
                </a>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog" style="margin-top: 80px; width: 23%;">

                        <!-- Modal content-->
                        <div class="modal-content">

                            <div class="modal-body">
                                <html>
                                <head></head>
                                <body>
                                <h3>Calculator</h3>
                                <br/>
                                <style>
                                    #calc{width:300px;height:250px;}
                                    #btn{width:100%;height:40px;font-size:20px;}
                                </style>
                                <form Name="calc">
                                    <table id="calc" border=2>
                                        <tr>
                                            <td colspan=5><input id="btn" name="display" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text"></td>
                                            <td style="display:none"><input name="M" type="number"></td>
                                        </tr>
                                        <tr>
                                            <td><input id="btn" type=button value="MC" OnClick="calc.M.value=''"></td>
                                            <td><input id="btn" type=button value="0" OnClick="calc.display.value+='0'"></td>
                                            <td><input id="btn" type=button value="1" OnClick="calc.display.value+='1'"></td>
                                            <td><input id="btn" type=button value="2" OnClick="calc.display.value+='2'"></td>
                                            <td><input id="btn" type=button value="+" OnClick="calc.display.value+='+'"></td>
                                        </tr>
                                        <tr>
                                            <td><input id="btn" type=button value="MS" OnClick="calc.M.value=calc.display.value"></td>
                                            <td><input id="btn" type=button value="3" OnClick="calc.display.value+='3'"></td>
                                            <td><input id="btn" type=button value="4" OnClick="calc.display.value+='4'"></td>
                                            <td><input id="btn" type=button value="5" OnClick="calc.display.value+='5'"></td>
                                            <td><input id="btn" type=button value="-" OnClick="calc.display.value+='-'"></td>
                                        </tr>
                                        <tr>
                                            <td><input id="btn" type=button value="MR" OnClick="calc.display.value=calc.M.value"></td>
                                            <td><input id="btn" type=button value="6" OnClick="calc.display.value+='6'"></td>
                                            <td><input id="btn" type=button value="7" OnClick="calc.display.value+='7'"></td>
                                            <td><input id="btn" type=button value="8" OnClick="calc.display.value+='8'"></td>
                                            <td><input id="btn" type=button value="x" OnClick="calc.display.value+='*'"></td>
                                        </tr>
                                        <tr>
                                            <td><input id="btn" type=button value="M+" OnClick="calc.M.value=(Number(calc.M.value))+(Number(calc.display.value))"></td>
                                            <td><input id="btn" type=button value="9" OnClick="calc.display.value+='9'"></td>
                                            <td><input id="btn" type=button value="±"

                                                       OnClick="calc.display.value=(calc.display.value==Math.abs(calc.display.value)?-(calc.display.value):Math.abs(calc.display.value))">

                                            </td>
                                            <td><input id="btn" type=button value="=" OnClick="calc.display.value=eval(calc.display.value)"></td>
                                            <td><input id="btn" type=button value="/" OnClick="calc.display.value+='/'"></td>
                                        </tr>
                                        <tr>
                                            <td><input id="btn" type=button value="1/x" OnClick="calc.display.value=1/calc.display.value"></td>
                                            <td><input id="btn" type=button value="." OnClick="calc.display.value+='.'"></td>
                                            <td><input id="btn" type=button value="x2" OnClick="calc.display.value=Math.pow(calc.display.value,2)"></td>
                                            <td><input id="btn" type=button value="√" OnClick="calc.display.value=Math.sqrt(calc.display.value)"></td>
                                            <td><input id="btn" type=button value="C" OnClick="calc.display.value=''"></td>
                                        </tr>
                                    </table>
                                </form>
                                </body>
                                </html>
                            </div>

                        </div>

                    </div>
                </div>
                <a class="navbar-brand col-lg-offset-0">
                    <div class="badge" id="timer"></div>
                </a>
                <script>
                    //localStorage.clear();
                    window.onload = function () {
                        sessionStorage.setItem("exam_time",<?php echo $_SESSION['exam_time']; ?>);
                        var exam_time = sessionStorage.getItem("exam_time");
                        if (typeof localStorage.getItem("min") !== 'undefined' && typeof localStorage.getItem("sec") !== 'undefined' && localStorage.getItem("min") != null && localStorage.getItem("sec") != null) {
                            var min = localStorage.getItem("min");
                            var sec = localStorage.getItem("sec");
                        }
                        else {
                            console.log("c2");
                            var min = "0" + exam_time;
                            var sec = "0" + 0;
                            var finishedtext = "Countdown finished!";
                        }
                        var time;

                        var counter = setInterval(function () {

                            localStorage.setItem("min", min);
                            localStorage.setItem("sec", sec);
                            time = min + " : " + sec;
                            document.getElementById("timer").innerHTML = time;
                            if (sec == 00) {
                                if (min != 0) {
                                    min--;
                                    sec = 59;
                                    if (min < 10) {
                                        min = "0" + min;
                                    }
                                }
                            }
                            else {
                                sec--;
                                if (sec < 10) {

                                    sec = "0" + sec;

                                }
                                if (sec == 00 && min == 00) {
                                    clearTimeout(counter);
                                    localStorage.setItem("min", null);
                                    localStorage.setItem("sec", null);
                                    localStorage.removeItem("min");
                                    localStorage.removeItem("sec");
                                    localStorage.clear();
                                    document.getElementById('timer').innerHTML = "Countdown finished";
                                    if (confirm("TIME UP!"))
                                        window.location.href = "../pages/update.php?q=quiz&step=2&exam_ended=true";
                                    else
                                        window.location.href = "../pages/update.php?q=quiz&step=2&exam_ended=true";
                                }

                            }
                        }, 1000);
                    }
                </script>

            </div>
        </div>


    </nav>

</div>


<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->


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
