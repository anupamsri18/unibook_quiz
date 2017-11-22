<?php
require_once '../core/Config.php';
session_start();
//delete feedback
if (isset($_SESSION['key'])) {
    if (@$_GET['fdid'] && $_SESSION['key'] == 'AmitRai') {
        $id = @$_GET['fdid'];
        $result = mysqli_query($con, "DELETE FROM feedback WHERE id='$id' ") or die('Error');
        header("location:dash.php?q=3");
    }
}

//delete user

if (@$_GET['demail']) {
    $demail = @$_GET['demail'];
    $delete = new Database();
    $del = $delete->delete("DELETE FROM user WHERE email='$demail'");
    /*$del=$delete->delete("DELETE FROM feedback WHERE email='$demail'" );
    $del=$delete->delete("DELETE FROM history WHERE email='$demail'" );
    $r1 = mysqli_query($con,"DELETE FROM rank WHERE email='$demail' ") or die('Error');
    $r2 = mysqli_query($con,"DELETE FROM history WHERE email='$demail' ") or die('Error');
    $result = mysqli_query($con,"DELETE FROM user WHERE email='$demail' ") or die('Error');*/
    header("location:admin.php?q=2");
}
//remove quiz
if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'rmquiz' && $_SESSION['key'] == 'sunny7785068889') {
        $eid = @$_GET['eid'];
        $result = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
        while ($row = mysqli_fetch_array($result)) {
            $qid = $row['qid'];
            $r1 = mysqli_query($con, "DELETE FROM options WHERE qid='$qid'") or die('Error');
            $r2 = mysqli_query($con, "DELETE FROM answer WHERE qid='$qid' ") or die('Error');
        }
        $r3 = mysqli_query($con, "DELETE FROM questions WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con, "DELETE FROM quiz WHERE eid='$eid' ") or die('Error');
        $r4 = mysqli_query($con, "DELETE FROM history WHERE eid='$eid' ") or die('Error');

        header("location:dash.php?q=5");
    }
}

//add quiz

if (@$_GET['q'] == 'addquiz') {
    $name = $_POST['name'];
    $name = ucwords(strtolower($name));
    $total = $_POST['total'];
    $right_ans = $_POST['right'];
    $wrong_ans = $_POST['wrong'];
    $time = $_POST['time'];
    $faculty = $_POST['faculty'];
    $description = $_POST['desc'];
    $insert = new Database();
    $ins = $insert->insert("INSERT INTO exam VALUES  ('$name' , '$right_ans' , '$wrong_ans','$total','$description','$time' ,'$faculty', NOW())");


    header("location:admin.php?q=4&step=2&n=$total");
}


//add question
if (@$_GET['q'] == 'addqns') {
    $n = @$_GET['n'];
    $eid = @$_GET['eid'];
    $ch = @$_GET['ch'];

    for ($i = 1; $i <= $n; $i++) {
        $qid = uniqid();
        $qns = $_POST['qns' . $i];
        $q3 = mysqli_query($con, "INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
        $oaid = uniqid();
        $obid = uniqid();
        $ocid = uniqid();
        $odid = uniqid();
        $a = $_POST[$i . '1'];
        $b = $_POST[$i . '2'];
        $c = $_POST[$i . '3'];
        $d = $_POST[$i . '4'];
        $qa = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$a','$oaid')") or die('Error61');
        $qb = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$b','$obid')") or die('Error62');
        $qc = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$c','$ocid')") or die('Error63');
        $qd = mysqli_query($con, "INSERT INTO options VALUES  ('$qid','$d','$odid')") or die('Error64');
        $e = $_POST['ans' . $i];
        switch ($e) {
            case 'a':
                $ansid = $oaid;
                break;
            case 'b':
                $ansid = $obid;
                break;
            case 'c':
                $ansid = $ocid;
                break;
            case 'd':
                $ansid = $odid;
                break;
            default:
                $ansid = $oaid;
        }


        $qans = mysqli_query($con, "INSERT INTO answer VALUES  ('$qid','$ansid')");

    }
    header("location:dash.php?q=0");
}


//quiz start
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
    $c_marks = $_SESSION['right_ans_marks'];
    $w_marks = $_SESSION['wrong_ans_marks'];
    $u_a_marks = 0;
    $index_new = @$_GET['n'];
    $total = @$_GET['total'];
    $set_name = @$_GET['set_name'];
    $exam_name = $_GET['name'];
    $question_unique_id = $_GET['u_id'];
    $Database = new Database();
    $query2 = $Database->get("select * from all_questions where unique_id='$question_unique_id'");
    $result = [];
    $email = Session::get('user')['EMAIL'];
    while ($row = mysqli_fetch_assoc($query2)) {
        array_push($result, $row);
    }
    foreach ($result as $all_questions) {
        if ($question_unique_id == $all_questions['unique_id']) {
            @$choosen_answer = $_POST['ans'];
            if ($choosen_answer == 'E') {
                $sql = $Database->Insert("Insert into result (email,un_answer,choosen_option,unique_id) values ('$email','$u_a_marks','E','$question_unique_id')");
            } elseif ($choosen_answer == $all_questions['CORRECT_ANSWER']) {
                $sql = $Database->Insert("Insert into result (email,right_answer,choosen_option,unique_id) values ('$email','$c_marks','$choosen_answer','$question_unique_id')");
            } else {
                $sql = $Database->Insert("Insert into result (email,wrong_answer,choosen_option,unique_id) values ('$email','$w_marks','$choosen_answer','$question_unique_id')");
            }
        }
    }
    $exam_ended = $_GET['exam_ended'];
    if ($exam_ended == 'true'){
        $query3 = $Database->get("select * from result");
        $result=[];
        while ($row = mysqli_fetch_assoc($query3)) {
            array_push($result, $row);
        }
        $total_marks = 0;
        foreach ($result as $value) {
            $total_marks  = $total_marks+ $value['right_answer'] - $value['wrong_answer'];
        }
        header("Location:result.php?total_marks=$total_marks");
    }else
    if ($index_new != $total - 1) {
        $index_new++;
        header("location:test1.php?set_name=$set_name&q=quiz&step=2&n=$index_new&title=$exam_name") or die('Error152');
    } else {
        $query3 = $Database->get("select * from result");
        $result=[];
        while ($row = mysqli_fetch_assoc($query3)) {
            array_push($result, $row);
        }
        $total_marks = 0;
        foreach ($result as $value) {
            $total_marks  = $total_marks+ $value['right_answer'] - $value['wrong_answer'];
        }
        header("Location:result.php?total_marks=$total_marks");
    }
}

//restart quiz
if (@$_GET['q'] == 'quizre' && @$_GET['step'] == 25) {
    $eid = @$_GET['eid'];
    $n = @$_GET['n'];
    $t = @$_GET['t'];
    $q = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error156');
    while ($row = mysqli_fetch_array($q)) {
        $s = $row['score'];
    }
    $q = mysqli_query($con, "DELETE FROM `history` WHERE eid='$eid' AND email='$email' ") or die('Error184');
    $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error161');
    while ($row = mysqli_fetch_array($q)) {
        $sun = $row['score'];
    }
    $sun = $sun - $s;
    $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die('Error174');
    header("location:account.php?q=quiz&step=2&eid=$eid&n=1&t=$t");
}

?>
