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

    <title>Uni-Book</title>
    <link rel="shortcut icon" type="image/png" href="../bower_components/bootstrap/imgs/titleicon2.png"/>


    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">


    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>

<body>
<?php
$set_name = @$_GET['set_name'];
$exam_name = @$_GET['title'];
?>
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
                <a class="navbar-brand col-lg-offset-3 " href="#">
                    <div class="badge" id="response"></div>

                </a>
            </div>
        </div>

    </nav>

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
        setInterval(function () {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "response.php", false);
                xmlhttp.send(null);
                var finish = document.getElementById("response").innerHTML = xmlhttp.responseText;
                if (finish == 'Finished') {
                    sessionStorage.removeItem('start_time');
                    sessionStorage.removeItem('end_time');
                    window.location.href = "test1.php?set_name=<?php echo $set_name ?>&q=quiz&step=2&n=0&title=<?php echo $exam_name ?>";
                }
            },
            1000
        )
        ;
    </script>

</body>

</html>
