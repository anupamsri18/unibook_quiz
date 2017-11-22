<?php

require_once 'header.php';
date_default_timezone_set('Asia/Kolkata');
$my_email = Session::get('user')['EMAIL'];
$Database = new Database();
$all = $Database->get("SELECT * FROM assigned_set");
@Session::delete('start_time');
@Session::delete('end_time');
@Session::delete('right_ans_marks');
@Session::delete('wrong_ans_marks');
echo '
</div>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>

                <h3 class="page-header">

                    Available Exams
                </h3>
            </div>
        </div>
';
if (mysqli_num_rows($all) >= 1) {
    $result = [];
    while ($row = mysqli_fetch_assoc($all)) {
        array_push($result, $row);
    }
    foreach ($result as $data) {
        $email = explode(",", $data['email']);
        foreach ($email as $item) {
            if ($my_email == $item) {
                $assigned_set = $data['assigned_set'];
                $date1 = $data['date'];
                $time = $data['time'];
                $date = strtotime(date($date1 . ' ' . $time));
                $end_time = date('Y-m-d H:i:s', $date);
                $start_time = date('Y-m-d H:i:s');
                $title = $Database->get("SELECT * FROM question_set where set_name='$assigned_set'");
                if (mysqli_num_rows($title) >= 1) {
                    $exam_title = [];
                    while ($row1 = mysqli_fetch_assoc($title)) {
                        array_push($exam_title, $row1);
                    }
                    foreach ($exam_title as $value) {
                        $name = $value['subject_title'];
                        $exam_time = $value['time'];
                        $right_ans_marks = $value['right_ans_marks'];
                        $wrong_ans_marks = $value['wrong_ans_marks'];
                        echo '<div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-laptop fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"></div>
                                <div> ';

                        echo $name;
                        echo ' !</div>
                            </div>
                        </div>
                    </div>
                    
                    ';
                        echo '<a href="instruction.php?set_name=' . $assigned_set . '&q=quiz&step=2&n=0&title=' . $name . '&start_time=' . $start_time . '&end_time=' . $end_time . '&exam_time=' . $exam_time . '&right_ans_marks=' . $right_ans_marks . '&wrong_ans_marks=' . $wrong_ans_marks . '">';
                        echo '
                        <div class="panel-footer">
                            <span class="pull-left">Take Exam</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            
        </div>
        ';
                    }
                }
            }
        }
    }
}
?>
<script>
    localStorage.clear();
</script>



