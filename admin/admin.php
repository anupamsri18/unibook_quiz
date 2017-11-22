<!DOCTYPE html>
<?php
require_once 'headeradmin.php';
if (!Session::get('user')['NAME']) {
    Redirect::to('../index.php');

}
?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <?php
                if (@$_GET['q'] == 1) {
                ?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small> </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!--
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-info alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                                    </div>
                                </div>
                            </div>
                -->
                <!-- /.row -->

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-code fa-5x"></i>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <a href="admin.php?q=8" <span class="pull-left">Faculty Registration</span></a>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-code fa-5x"></i>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <a href="admin.php?q=7" <span class="pull-left">Student Registration</span></a>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-code fa-5x"></i>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <a href="admin.php?q=9"><span class="pull-left">All Questions</span></a>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-code fa-5x"></i>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <a href="admin.php?q=10"><span class="pull-left">Question Sets</span></a>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>

                <?php
                $user = new User();
                $query = $user->db->get("SELECT * FROM user");
                $query1 = $user->db->get("SELECT * FROM question_set");
                $query2 = $user->db->get("SELECT * FROM all_questions");
                $query3 = $user->db->get("SELECT * FROM user");
                $query4 = $user->db->get("SELECT * FROM user");
                $query5 = $user->db->get("SELECT * FROM user");
                $query6 = $user->db->get("SELECT * FROM user");
                $info = [];
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($info, $row);
                }
                $total_registered_users = mysqli_num_rows($query);
                $total_no_of_set = mysqli_num_rows($query1);
                $total_no_of_questions = mysqli_num_rows($query2);
                ?>

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Info Panel</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <span class="badge"><?php echo $total_registered_users ?></span>
                                    <i class="fa fa-fw fa-calendar"></i> Total Registered Users
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="badge"><?php echo $total_no_of_set; ?></span>
                                    <i class="fa fa-fw fa-comment"></i> No of Created Sets
                                </a>
                                <a href="#" class="list-group-item">
                                    <span class="badge"><?php echo $total_no_of_questions; ?></span>
                                    <i class="fa fa-fw fa-truck"></i> No. of Questions
                                </a>

                            </div>
                            <div class="text-right">
                                <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <?php if (@$_GET['q'] == 2) {
                $user = new User();
                $query = $user->db->get("SELECT * FROM user");
                $feed = [];
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Registered Users
                            <small> </small>
                        </h1>
                    </div>
                </div>
                <?php
                echo '<div class="panel"><table class="table table-striped title1">
                        <tr><td><b>S.N.</b></td><td><b>NAME</b></td><td><b>EMAIL</b></td><td><b>COLLEGE</b></td><td><b>MOBILE</b></td><td><b>BRANCH</b></td><td></td></tr>';
                $c = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($feed, $row);
                }
                foreach ($feed as $data) {
                    $name = $data['NAME'];
                    $mobile = $data['MOBILE'];
                    $college = $data['COLLEGE_NAME'];
                    $email = $data['EMAIL'];
                    $branch = $data['BRANCH'];

                    echo '<tr><td>' . $c++ . '</td><td>' . $name . '</td><td>' . $email . '</td><td>' . $college . '</td><td>' . $mobile . '</td><td>' . $branch . '</td>
                            <td><a title="Delete User" href="update.php?demail=' . $email . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
                }
                $c = 0;
                echo '</table></div>';
            } ?>



            <?php if (@$_GET['q'] == 3) {
                $user = new User();
                $query = $user->db->get("SELECT * FROM feedback");
                $feed = []; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Feedback
                            <small> </small>
                        </h1>
                    </div>
                </div>
                <?php
                echo '<div class="panel">
                            <table class="table table-striped title1">
                                <tr>
                                    <td>
                                        <b>S.N.</b>
                                    </td>
                                   <td><b>Name</b></td><td><b>Feedback</b></td></tr>';
                $c = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($feed, $row);
                }
                foreach ($feed as $data) {
                    $name = $data['NAME'];
                    $feedback = $data['FEEDBACK'];


                    echo '<tr><td>' . $c++ . '</td><td>' . $name . '</td><td>' . $feedback . '</td></tr>';
                }
                $c = 0;
                echo '</table></div>';
            } ?>



            <?php
            if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
                echo '
                        <div class="row">
                        <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Subject Details</b></span><br /><br />
                         <div class="col-md-3"></div>
                         <div class="col-md-6">
                            <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
                        <fieldset>


                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-12 control-label" for="name"></label>
                          <div class="col-md-12">
                          <input id="name" name="name" placeholder="Enter Exam title" class="form-control input-md" type="text">

                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-12 control-label" for="desc"></label>
                          <div class="col-md-12">
                          <input id="desc" name="desc" placeholder="Enter description of exam" class="form-control input-md" min="1" type="text">

                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-12 control-label" for="faculty"></label>
                          <div class="col-md-12">
                          <input id="faculty" name="faculty" placeholder="Faculty name" class="form-control input-md" min="1" type="text">

                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-md-12 control-label" for=""></label>
                          <div class="col-md-12">
                            <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Next" class="btn btn-primary"/>
                          </div>
                        </div>

                        </fieldset>
                        </form>
                        </div>
                        </div>';


            }
            ?>


            <!--add quiz step2 start-->
            <?php

            if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
            $title = @$_GET['title'];
            $sn = @$_GET['sn'];
            $user = new User();
            $query = $user->db->get("SELECT sn from all_questions where title='$title'");
            while ($row = mysqli_fetch_array($query)) {
                $ques_no = $row['sn'];
                $sn = $ques_no + 1;
            }

            echo '
                        <div id="page-wrapper">
                          <div class="container-fluid">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <h1 class="page-header">Mock Creation</h1>

                                      <div class="form-group">
                                          <form class="form-horizontal" action="update.php?q=add_questions&sn='; ?><?php echo $sn; ?> <?php echo '&title='; ?><?php echo $title; ?><?php echo '" method="post" enctype="multipart/form-data">
                                              
                                          ';
        echo '<hr>
                                              <div class="form-group">
                                                  <label class="control-label col-sm-3" for="exam_name"> Question for ' . $title . '';

        echo '</label>
                                              </div>
                                              <div class="form-group">
                                              
                          <label class="col-sm-3 control-label" for="question_no">Question No</label>
                          <div class="col-sm-8">
                          '; ?>  <label class="col-sm-0 control-label"
                                        for="question_no"><?php echo $sn; ?></label><?php echo '

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
                                              <div class="form-group" style="display:inline-block; position:relative;  margin-left:120px;">
                                                  <label class="control-label col-sm-3" for="a">Option A</label>

                                                  <div class="col-sm-4">
                                                      <textarea type="text" style="width:250px;" class="form-control" id="a" name="a"
                                                                value="" placeholder="Enter Option A"></textarea>
                                                      <div class="col-sm-4" style="padding-top: 10px">
                                                          <input class="btn btn-primary btn-group-sm btn-sm " type="file" name="option_a_img"
                                                                 id="option_a_img" value="upl1"/><br>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="form-group" style="display:inline-block; position:relative">
                                                  <label class="control-label col-sm-3" for="b">Option B</label>

                                                  <div class="col-sm-4">
                                                      <textarea type="text" style="width:250px;" class="form-control" id="b" name="b" value=""
                                                                placeholder="Enter Option B"></textarea>
                                                      <div class="col-sm-8" style="padding-top: 10px">
                                                          <input class="btn btn-success btn-group-sm btn-sm " type="file" name="option_b_img"
                                                                 id="option_b_img" value=" "/><br>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="form-group" style="display:inline-block; position:relative;  margin-left:120px;">
                                                  <label class="control-label col-sm-3" for="c">Option C</label>

                                                  <div class="col-sm-4">
                                                      <textarea type="text" style="width:250px;" class="form-control" id="c" name="c" value=""
                                                                placeholder="Enter Option C"></textarea>
                                                      <div class="col-sm-8" style="padding-top: 10px">
                                                          <input class="btn btn-success btn-group-sm btn-sm " type="file" name="option_c_img"
                                                                 id="option_c_img" value="upl3"/><br>
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="form-group" style="display:inline-block; position:relative">
                                                  <label class="control-label col-sm-3" for="d">Option D</label>

                                                  <div class="col-sm-4">
                                                      <textarea type="text" style="width:250px;" class="form-control" id="d" name="d" value=""
                                                                placeholder="Enter Option D"></textarea>
                                                      <div class="col-sm-8" style="padding-top: 10px">
                                                          <input class="btn btn-primary btn-group-sm btn-sm " type="file" name="option_d_img"
                                                                 id="option_d_img" value="upl4"/><br>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="control-label col-sm-3" for="c" style="padding-top: 0px;">Correct Answer</label>

                                                  <div class="col-sm-8" style="width: 100px;">
                                                      <select id="correct_answer" name="correct_answer">
                                                          <option value="A">A</option>
                                                          <option value="B">B</option>
                                                          <option value="C">C</option>
                                                          <option value="D">D</option>
                                                      </select>
                                                                                                           
                                                  </div>
                                                  <label class="control-label col-sm-3" for="c"><a href="admin.php">Finish</a></label>
                                              </div>
                                              
                                              <div class="form-group">
                                                  
                                              </div>
                                        ';
        echo '
                                        
                                              <div class="form-group">
                                                  <div class="col-sm-offset-3 col-sm-8">
                                                      <input type="submit" value="UPLOAD" name="submit"
                                                             class="btn btn-default">
                                                  </div>
                                              </div><hr>
                          ';
        ?>
            <?php
            echo '</form>
                </div>
            </div>
        </div>
    </div>';


            }
            ?><!--add quiz step 2 end-->


            <?php if (@$_GET['q'] == 5) {

                $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                echo '<div class="panel"><table class="table table-striped title1">
                        <tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
                $c = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $title = $row['title'];
                    $total = $row['total'];
                    $sahi = $row['sahi'];
                    $time = $row['time'];
                    $eid = $row['eid'];
                    echo '<tr><td>' . $c++ . '</td><td>' . $title . '</td><td>' . $total . '</td><td>' . $sahi * $total . '</td><td>' . $time . '&nbsp;min</td>
                            <td><b><a href="update.php?q=rmquiz&eid=' . $eid . '" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
                }
                $c = 0;
                echo '</table></div>';

            }
            ?>
            <?php if (@$_GET['q'] == 6) {
            $user = new User();
            $query = $user->db->get("SELECT * FROM user");
            $feed = [];
            $query1 = $user->db->get("SELECT * FROM user");
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Assign Sets
                    </h1>
                </div>
            </div>
            <form method="post" action="">
                <div class="dropdown col-sm-2">
                    <label for="set">Select Set:</label>
                    <select class="form-control" name="set" id="set">
                        <option value="set_1">1</option>
                        <option value="set_2">2</option>
                        <option value="set_3">3</option>
                        <option value="set_4">4</option>
                        <option value="set_5">5</option>
                        <option value="set_6">6</option>
                        <option value="set_7">7</option>
                        <option value="set_8">8</option>
                        <option value="set_9">9</option>
                        <option value="set_10">10</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label for="set">Select Date:</label>
                    <input class="form-control col-lg-3" type="date" name="date">
                </div>
                <div class="col-lg-2">
                    <label for="set">Select Time:</label>
                    <input class="form-control col-lg-3" type="time" name="time">
                </div>
                <?php
                echo '<div class="panel"><table class="table table-striped table-responsive title1">
                         <tr><td><b>S.N.</b></td><td><b>NAME</b></td><td><b>EMAIL</b></td><td><b>BRANCH</b></td><td><b>CHECK</b></td></tr>';
                $c = 1;
                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($feed, $row);
                }
                foreach ($feed as $data) {
                    $name = $data['NAME'];
                    $email = $data['EMAIL'];
                    $branch = $data['BRANCH'];

                    echo '<tr><td>' . $c++ . '</td><td>' . $name . '</td><td>' . $email . '</td><td>' . $branch . '</td>
                            <td><input name="assigned_set_to[]" multiple type="checkbox" value="' . @$data['EMAIL'] . '"></a></td></tr>';
                }
                $c = 0;
                echo '</table></div><button type="submit" name="assign_set" class="btn btn-primary">Assign Set</button>';
                }
                if (isset($_POST['assign_set'])) {
                    echo $selected_set = $_POST['set'];
                    @$assigned_set_to = $_POST['assigned_set_to'];
                    echo $date = $_POST['date'];
                    echo $time = $_POST['time'] . ':00';

                    if (!$assigned_set_to) {
                        echo "Please assign correct Values";
                    } else {

                        $selected_check_box = implode(",", $assigned_set_to);
                        $sets = new Database();
                        $sql = $sets->Insert("Insert into assigned_set (email,date,time,assigned_set) values ('$selected_check_box','$date','$time','$selected_set')");

                    }
                }
                ?>
            </form>
            <?php
            if (@$_GET['q'] == 7) {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Student Registration
                        </h1>
                    </div>
                </div>
                <div class="row well">
                    <form method="post" action="" class="form-group col-lg-6">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input required="required" type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input required="required" type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input required="required" type="password" class="form-control" name="pwd" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input required="required" type="number" class="form-control" name="mobile" id="mobile">
                        </div>
                        <div class="form-group">
                            <label for="college">College Name:</label>
                            <input required="required" type="text" class="form-control" name="college" id="college">
                        </div>
                        <div class="form-group">
                            <label for="degree">Degree:</label>
                            <input required="required" type="text" class="form-control" name="degree" id="degree">
                        </div>
                        <div class="form-group">
                            <label for="branch">Branch:</label>
                            <input required="required" type="text" class="form-control" id="branch" name="branch">
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input required="required" type="text" class="form-control" name="city" id="city">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="gender">Gender:</label>
                            <div class="col-sm-8">
                                <input type="radio" class="" id="gender" name="gender" value="M"
                                       checked="checked"><label>Male</label>
                                <input type="radio" class="" id="gender" name="gender"
                                       value="F"><label>Female</label>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-default">Register</button>
                        <?php
                        if (isset($_POST['submit'])) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $pwd = $_POST['pwd'];
                            $mobile = $_POST['mobile'];
                            $college = $_POST['college'];
                            $degree = $_POST['degree'];
                            $branch = $_POST['branch'];
                            $city = $_POST['city'];
                            $gender = $_POST['gender'];
                            $register = new Database();
                            $sql = $register->insert("Insert into user (NAME,EMAIL,PASSWORD,MOBILE,COLLEGE_NAME,DEGREE,BRANCH,CITY,GENDER,CREATED_ON) values ('$name','$email','$pwd','$mobile','$college','$degree','$branch','$city','$gender',NOW())");
                            if (($sql) >= 1) {
                                ?>
                                <script>alert("registered");</script>
                                <?php
                            }
                        }
                        ?>
                    </form>
                </div>
                <?php
            } ?>


            <?php
            if (@$_GET['q'] == 8) {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Faculty Regsistration
                        </h1>
                    </div>
                </div>
                <form method="post" action="" class="form-group col-lg-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input required="required" type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input required="required" type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input required="required" type="password" class="form-control" name="pwd" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile:</label>
                        <input required="required" type="text" class="form-control" name="mobile" id="mobile" maxlength="10">
                    </div>
                    <button type="submit" name="submit" class="btn btn-default">Register</button>
                    <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $pwd = $_POST['pwd'];
                        $mobile = $_POST['mobile'];
                        $register = new Database();
                        $sql = $register->insert("Insert into faculty (name,email,mobile,password) values ('$name','$email','$mobile','$pwd') ");
                        if (($sql) >= 1) {
                            ?>
                            <script>alert("registered");</script>
                            <?php
                        }
                    }
                    ?>
                </form>
                <?php
            } ?>

            <?php
            if (@$_GET['q'] == 9) {
                $user = new User();
                $query = $user->db->get("SELECT * FROM all_questions");
                $ques = [];


                while ($row = mysqli_fetch_assoc($query)) {
                    array_push($ques, $row);
                }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            All Questions
                        </h1>
                    </div>
                </div>
                <?php

                $c = 1;
                echo '<div class="container-fluid"><div class="panel">
                        <table class="table table-striped title1">
                            <tr>
                                <td>
                                    <b>S.N.</b>
                                </td>
                                <td>
                                    <b>Topic</b>
                                </td>
                               
                            </tr>';
                foreach ($ques as $data) {
                    $ques = $data['QUESTION'];
                    echo '<tr><td>' . $c++ . '</td><td>' . $ques . '</td></tr>';
                }
                $c = 0;
                echo '</table></div></div> ';
                echo '<div class="form-group">
                            <div class="col-sm-8">
                               <a href="admin.php?q=11"><button type="button" class="btn btn-info">Create Sets</button></a>
                            </div>
                          </div>';
            } ?>

            <?php
            if (@$_GET['q'] == 10) {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Created Sets
                        </h1>
                    </div>
                </div>
                <?php
                $user = new User();
                $query = $user->db->get("SELECT DISTINCT subject_title FROM question_set");
                $value = [];
                if (mysqli_num_rows($query) == 0) {
                    echo "No sets Created";
                } else {
                    while ($row = mysqli_fetch_assoc($query)) {
                        array_push($value, $row);
                    }
                    echo '<form method="post" action="">';
                    foreach ($value as $data) {
                        $subject_title = $data['subject_title'];
                        ?>
                        <br><br><br>
                        <div class="well well-sm" style="display: block"><?php echo $subject_title ?>
                        </div>
                        <?php
                        $result = $user->db->get("SELECT * FROM question_set where subject_title = '$subject_title' ") or die('Error');
                        while ($row = mysqli_fetch_array($result)) {
                            $set_name = $row['set_name'];
                            ?>
                            <div class="well well-sm col-lg-1 text-center"><?php echo $set_name; ?></div>
                            <?php
                        }
                    }
                    echo '</form>';
                }
            } ?>

            <?php
            if (@$_GET['q'] == 11) {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Create Question Paper Sets</h1>
                        <div class="form-group col-md-2">
                            <div class="form-group col-md-10">
                                <form method="post" action="">
                                    <label for="set">Select Set:</label>
                                    <select class="form-control" name="set" id="set">
                                        <option>Set</option>
                                        <option value="set_1">1</option>
                                        <option value="set_2">2</option>
                                        <option value="set_3">3</option>
                                        <option value="set_4">4</option>
                                        <option value="set_5">5</option>
                                        <option value="set_6">6</option>
                                        <option value="set_7">7</option>
                                        <option value="set_8">8</option>
                                        <option value="set_9">9</option>
                                        <option value="set_10">10</option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="title">Exam Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="time">Time Duration:</label>
                            <input type="text" class="form-control" id="time" name="time">
                        </div>
                        <div class="col-lg-2">
                            <label for="right_ans_marks">Marks on Right Ans:</label>
                            <input class="form-control col-lg-3" type="number" name="right_ans_marks">
                        </div>
                        <div class="col-lg-2">
                            <label for="wrong_ans_marks">Marks on Wrong Ans:</label>
                            <input class="form-control col-lg-3" type="number" name="wrong_ans_marks">
                        </div>
                    </div>
                    <?php
                    if (@$_GET['q'] == 11) {
                        $user = new User();
                        $query = $user->db->get("SELECT * FROM all_questions");
                        $ques = [];


                        while ($row = mysqli_fetch_assoc($query)) {
                            array_push($ques, $row);
                        }
                        $c = 1;
                        echo '<div class="container-fluid"><div class="panel">
                         <table class="table table-striped title1">
                            <tr>
                                <td>
                                    <b>S.N.</b>
                                </td>
                                <td>
                                    <b>Topic</b>
                                </td>
                               
                            </tr>';
                        foreach ($ques as $data) {
                            $ques = $data['QUESTION'];
                            echo '<tr><td>' . $c++ . '</td><td>' . $ques . '</td><td><input name="check[]" multiple type="checkbox" value="' . $data['unique_id'] . '"></td></tr>';
                        }
                        $c = 0;
                        echo '</table></div></div> ';
                        echo '<div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="submit" value="Create Sets" name="save_set" class="btn btn-primary">
                                        </div>
                                      </div>';

                        if (isset($_POST['save_set'])) {
                            $selected_set = $_POST['set'];
                            $selected_title = $_POST['title'];
                            $selected_time = $_POST['time'];
                            $val = $_POST['check'];
                            $tablename = "question_set";
                            $right_ans_marks = $_POST['right_ans_marks'];
                            $wrong_ans_marks = $_POST['wrong_ans_marks'];
                            $selected_check_box = implode(",", $val);
                            $sets = new Database();
                            $sql = $sets->Insert("Insert into question_set (subject_title,set_name,time,right_ans_marks,wrong_ans_marks,unique_id) values ('$selected_title','$selected_set','$selected_time','$right_ans_marks','$wrong_ans_marks','$selected_check_box')");

                        }

                        echo '</form>';
                    } ?>
                </div>
                <?php
            } ?>
        </div>
    </div>
</div>
</div>

</body>

</html>
