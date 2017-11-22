<!DOCTYPE html>
<?php
require_once 'headeradmin.php';
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mock Creation</h1>

                <div class="form-group">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="start_date">Quiz Start date: </label>

                            <div>
                                <input type="date" class="btn btn-info" id="start_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="start_time">Quiz Start time: </label>

                            <div>
                                <input type="time" class="btn btn-info" id="start_time">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="quiz">Select Question Type:</label>

                            <div class="col-sm-8">
                                <select id="quiz" name="quiz" class="btn btn-default">
                                    <option value="mcq">MCQ</option>
                                    <option value="comprehension">COMPREHENSION</option>
                                    <option value="image">IMAGE</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="quiz">Select Quiz:</label>

                            <div class="col-sm-8">
                                <select id="quiz" name="quiz">
                                    <option value="quiz_java">JAVA</option>
                                    <option value="quiz_c">C</option>
                                    <option value="quiz_php">PHP</option>
                                    <option value="quiz_css">CSS 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="question_no">Question no.</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="question_no" name="question_no" value=""
                                       placeholder="Enter Question Number">
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="control-label col-sm-3" for="question">Question</label>

                            <div class="col-sm-8">
                              <textarea class="form-control" id="question" name="question" value=""
                                        placeholder="Type Question Or Select Image"></textarea>

                                <div class="col-sm-8" style="padding-top: 10px">
                                    <input class="btn btn-success btn-group-sm btn-sm " type="file" name="question_img"
                                           id="question_img" value="upl"/><br>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="a">Option A</label>

                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="a" name="a"
                                          value="" placeholder="Enter Option A"></textarea>
                                <div class="col-sm-8" style="padding-top: 10px">
                                    <input class="btn btn-success btn-group-sm btn-sm " type="file" name="option_a_img"
                                           id="option_a_img" value="upl1"/><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="b">Option B</label>

                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="b" name="b" value=""
                                          placeholder="Enter Option B"></textarea>
                                <div class="col-sm-8" style="padding-top: 10px">
                                    <input class="btn btn-success btn-group-sm btn-sm " type="file" name="option_b_img"
                                           id="option_b_img" value="upl2"/><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="c">Option C</label>

                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="c" name="c" value=""
                                          placeholder="Enter Option C"></textarea>
                                <div class="col-sm-8" style="padding-top: 10px">
                                    <input class="btn btn-success btn-group-sm btn-sm " type="file" name="option_c_img"
                                           id="option_c_img" value="upl3"/><br>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="d">Option D</label>

                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="d" name="d" value=""
                                          placeholder="Enter Option D"></textarea>
                                <div class="col-sm-8" style="padding-top: 10px">
                                    <input class="btn btn-success btn-group-sm btn-sm " type="file" name="option_d_img"
                                           id="option_d_img" value="upl4"/><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="c">Correct Answer</label>

                            <div class="col-sm-8">
                                <select id="correct_answer" name="correct_answer">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8">
                                <input type="submit" value="UPLOAD" name="submit"
                                       class="btn btn-default">
                            </div>
                        </div>
                        <?php


                        if (isset($_POST['submit'])) {
                            extract($_POST);
                            $tablename = $_POST['quiz'];
                            $question_no = $_POST['question_no'];
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
                                            $question = $path;
                                            if ($question) {
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
                                            $a = $path;
                                            if ($a) {
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
                                            $b = $path;
                                            if ($b) {
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
                                            $c = $path;
                                            if ($c) {
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
                                            $d = $path;
                                            if ($d) {
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

                            $ques = new InsertInto();
                            $sql = $ques->addQuestion($tablename, $question_no, $question, $a, $b, $c, $d, $correct_answer);
                            if (($sql) === TRUE) {
                                ?>
                                <script>window.alert("Question Updated Successfully");</script>
                            <?php
                            } else {
                            ?>

                                <script>window.alert("Question Updation Failed");</script>
                                <?php
                            }
                        }
                        ?>
                    </form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
