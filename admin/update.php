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
    header("location:faculty.php?q=2");
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
    $faculty = $_POST['faculty'];
    $description = $_POST['desc'];
    $insert = new Database();
    $ins = $insert->insert("INSERT INTO question_attributes  (name,description,faculty,time_stamp) VALUES  ('$name' ,'$description' ,'$faculty', NOW())");

    header("location:faculty.php?q=4&step=2&title=$name&sn=1");
}


if (@$_GET['q'] == 10) {
    $sn= @$_GET['sn'];

    $tques= @$_GET['tques'];
    $title= @$_GET['title'];


        header("location:faculty.php?q=4&step=2&sn=$sn&tques=$tques&title=$title");

}




//quiz start
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
    
    $sn = @$_GET['n'];
    $total = @$_GET['t'];

    
    if ($sn != $total) {
        $sn++;
        header("location:test1.php?q=quiz&step=2&n=$sn&t=$total") or die('Error152');
    }
}


if (@$_GET['q']=='add_questions') {
    $title = @$_GET['title'];
    $sn = @$_GET['sn'];
    extract($_POST);
    $tablename = "all_questions";
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $correct_answer = $_POST['correct_answer'];
    $question = $_POST['question'];
    $name = $_FILES['question_img']['name'];
    $tmp_name = $_FILES['question_img']['tmp_name'];
    $error = $_FILES['question_img']['error'];
    $size = $_FILES['question_img']['size'];
    $arr = explode(".", $name);
    $ext = end($arr);
    $ext = strtolower($ext);
    $allowedExt = array("jpg", "png", "jpeg");
    if (in_array($ext, $allowedExt)) {
        if ($error == 0) {
            if (($size / 1024) <= 300) {
                $path = "mock/questions/" . time() . $name;
                if (move_uploaded_file($tmp_name, $path)) {
                    $question_img = $path;
                    if ($question_img) {
                        $msg = "Successfully Uploaded";
                    } else {
                        $msg = "Database Error ";
                    }
                } else {
                    $msg = "error occured";
                }
            } else {
                $msg = "File size should not be more than 300KB";
            }
        } else {
            $msg = "server error";
        }
    } else {
        $msg = "File Format Invalid";
    }

    $name = $_FILES['option_a_img']['name'];
    $tmp_name = $_FILES['option_a_img']['tmp_name'];
    $error = $_FILES['option_a_img']['error'];
    $size = $_FILES['option_a_img']['size'];
    $arr = explode(".", $name);
    $ext = end($arr);
    $ext = strtolower($ext);
    $allowedExt = array("jpg", "png", "jpeg");
    if (in_array($ext, $allowedExt)) {
        if ($error == 0) {
            if (($size / 1024) <= 300) {
                $path = "mock/options/" . time() . $name;
                if (move_uploaded_file($tmp_name, $path)) {
                    $option_a_img = $path;
                    if ($option_a_img) {
                        $msg = "Successfully Uploaded";
                    } else {
                        $msg = "Database Error ";
                    }
                } else {
                    $msg = "error occured";
                }
            } else {
                $msg = "File size should not be more than 300KB";
            }
        } else {
            $msg = "server error";
        }
    } else {
        $msg = "File Format Invalid";
    }

    $name = $_FILES['option_b_img']['name'];
    $tmp_name = $_FILES['option_b_img']['tmp_name'];
    $error = $_FILES['option_b_img']['error'];
    $size = $_FILES['option_b_img']['size'];
    $arr = explode(".", $name);
    $ext = end($arr);
    $ext = strtolower($ext);
    $allowedExt = array("jpg", "png", "jpeg");
    if (in_array($ext, $allowedExt)) {
        if ($error == 0) {
            if (($size / 1024) <= 300) {
                $path = "mock/options/" . time() . $name;
                if (move_uploaded_file($tmp_name, $path)) {
                    $option_b_img = $path;
                    if ($option_b_img) {
                        $msg = "Successfully Uploaded";
                    } else {
                        $msg = "Database Error ";
                    }
                } else {
                    $msg = "error occured";
                }
            } else {
                $msg = "File size should not be more than 300KB";
            }
        } else {
            $msg = "server error";
        }
    } else {
        $msg = "File Format Invalid";
    }

    $name = $_FILES['option_c_img']['name'];
    $tmp_name = $_FILES['option_c_img']['tmp_name'];
    $error = $_FILES['option_c_img']['error'];
    $size = $_FILES['option_c_img']['size'];
    $arr = explode(".", $name);
    $ext = end($arr);
    $ext = strtolower($ext);
    $allowedExt = array("jpg", "png", "jpeg");
    if (in_array($ext, $allowedExt)) {
        if ($error == 0) {
            if (($size / 1024) <= 300) {
                $path = "mock/options/" . time() . $name;
                if (move_uploaded_file($tmp_name, $path)) {
                    $option_c_img = $path;
                    if ($option_c_img) {
                        $msg = "Successfully Uploaded";
                    } else {
                        $msg = "Database Error ";
                    }
                } else {
                    $msg = "error occured";
                }
            } else {
                $msg = "File size should not be more than 300KB";
            }
        } else {
            $msg = "server error";
        }
    } else {
        $msg = "File Format Invalid";
    }

    $name = $_FILES['option_d_img']['name'];
    $tmp_name = $_FILES['option_d_img']['tmp_name'];
    $error = $_FILES['option_d_img']['error'];
    $size = $_FILES['option_d_img']['size'];
    $arr = explode(".", $name);
    $ext = end($arr);
    $ext = strtolower($ext);
    $allowedExt = array("jpg", "png", "jpeg");
    if (in_array($ext, $allowedExt)) {
        if ($error == 0) {
            if (($size / 1024) <= 300) {
                $path = "mock/options/" . time() . $name;
                if (move_uploaded_file($tmp_name, $path)) {
                    $option_d_img = $path;
                    if ($option_d_img) {
                        $msg = "Successfully Uploaded";
                    } else {
                        $msg = "Database Error ";
                    }
                } else {
                    $msg = "error occured";
                }
            } else {
                $msg = "File size should not be more than 300KB";
            }
        } else {
            $msg = "server error";
        }
    } else {
        $msg = "File Format Invalid";
    }
    if (!$question)
        $question = " ";

    if (!$a)
        $a = " ";

    if (!$b)
        $b = " ";

    if (!$c)
        $c = " ";

    if (!$d)
        $d = " ";

    if (empty($question_img))
        $question_img = NULL;

    if (empty($option_a_img))
        $option_a_img = NULL;

    if (empty($option_b_img))
        $option_b_img = NULL;

    if (empty($option_c_img))
        $option_c_img = NULL;

    if (empty($option_d_img))
        $option_d_img = NULL;

    function generate_random_letters($length)
    {
        $random = 'amit';
        for ($i = 0; $i < $length; $i++) {
            $random .= chr(rand(ord('a'), ord('z')));
        }
        return $random;
    }

    $u_id = generate_random_letters(6);

    $tques = @$_GET['tques'];

    $ques = new InsertInto();
    $sql1 = $ques->addQuestion($tablename, $question, $question_img, $a, $option_a_img, $b, $option_b_img, $c, $option_c_img, $d, $option_d_img, $correct_answer, $sn, $title, $u_id);

    if ($sql1 === True) {
        ?>
        <script> window.alert("google.com");
        window.location.href = "admin.php?q=4&step=2&title=<?php echo $title; ?>";
        </script>

        <?php
    } else {
        ?>
        <script> window.alert("facebook.com"); </script>
        <?php


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
