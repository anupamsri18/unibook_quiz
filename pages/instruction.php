<?php
require_once '../core/Config.php';
require_once 'header_instruction.php';

date_default_timezone_set('Asia/Kolkata');
if (!Session::get('user')['NAME']) {
    Redirect::to('../index.php');
}
$_SESSION['start_time'] = @$_GET['start_time'];
$_SESSION['end_time'] = @$_GET['end_time'];
$_SESSION['exam_time']=@$_GET['exam_time'];
$_SESSION['right_ans_marks']=@$_GET['right_ans_marks'];
$_SESSION['wrong_ans_marks']=@$_GET['wrong_ans_marks'];
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
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body>

<div id="wrapper">
    <div class="col-md-12 col-sm-12">
        <div class="margin-bottom">
            <h1>Online Exam Instructions</h1>
        </div>
        <div class="copy-body">
            <!--
THIS FILE IS NOT USED AND IS HERE AS A STARTING POINT FOR CUSTOMIZATION ONLY.
See http://api.drupal.org/api/function/theme_field/7 for details.
After copying this file to your theme's folder and customizing it, remove this
HTML comment.
-->
            <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                <div class="field-items">
                    <div class="field-item even"><h4><strong>Steps For&nbsp;Accessing Your Exam Online:</strong></h4>

                        <ul>
                            <li>Close all programs, including email</li>
                            <li>Click on the Click here to open the exam link provided in the email from The College.
                            </li>
                            <li>Click Logon To Exam at the bottom of the screen.</li>
                            <li>Have your Proctor enter the Username and Password provided in the email from The College
                                and click enter.
                            </li>
                            <li>To begin the exam, click on the link to the appropriate exam listed under Online
                                Assessments.
                            </li>
                        </ul>

                        <p><br>
                            <strong>Before starting the exam:</strong></p>

                        <p>Please verify that the student's last name appears correctly within the User ID box.</p>

                        <p><strong>During the exam:</strong></p>

                        <ul>
                            <li>The student may not use his or her textbook, course notes, or receive help from a
                                proctor&nbsp;or any other outside source.
                            </li>
                            <li>Students must complete the 50-question multiple-choice exam within the 75 minute time
                                frame allotted for the exam.
                            </li>
                            <li>Students must not stop the session and then return to it. This is especially important
                                in the online environment where the system will "time-out" and not allow the student or
                                you to reenter the exam site.
                            </li>
                        </ul>

                        <h4><strong>What to do if your online exam is interrupted</strong></h4>

                        <ul>
                            <li>If your online exam is interrupted, click the “Back” button on your web browser to see
                                if you can return to the exam. If not, follow the instructions below to resume taking
                                the exam. <em>Note: Answers are saved by the system in 10-minute intervals. If you have
                                    to log back in to complete your exam, your prior answers will be remain from the
                                    last system-save.</em></li>
                            <li>Reconnect to the Internet and log back into Blackboard.</li>
                            <li>Follow your original instructions to access the exam login page.</li>
                            <li>Ask your proctor to re-enter the Username and Password, then select the check box "Show
                                list of unfinished exams, only select to re-enter an exam already in progress."&nbsp;This
                                will enable you to resume taking the exam, close to the point before the interruption
                                occurred.
                            </li>
                            <li>Have your Proctor enter the Username and Password provided in the email from The College
                                and click enter.
                            </li>
                        </ul>

                        <h4><strong>Minimum Browser Requirements</strong></h4>

                        <p>Internet Explorer 9, Firefox 1, or Google Chrome are required to log into the exam</p>

                        <h4><strong>Support</strong></h4>

                        <p>If you have any questions, please contact the Professional Education Department at
                            888-263-7265 or email ProfessionalEducation@TheAmericanCollege.edu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    setInterval(function () {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "response.php", false);
            xmlhttp.send(null);
            document.getElementById("response").innerHTML = xmlhttp.responseText;
        },
        1000
    )
    ;
</script>

</body>

</html>
