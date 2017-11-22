<!DOCTYPE html>
<?php
require_once 'header.php';
@$user_id = Session::get('user')['USER_ID'];
@$user_name = Session::get('user')['NAME'];
@$user_email = Session::get('user')['EMAIL'];
@$user_password = Session::get('user')['PASSWORD'];
@$user_mobile = Session::get('user')['MOBILE'];
@$user_college_name = Session::get('user')['COLLEGE_NAME'];
@$user_degree = Session::get('user')['DEGREE'];
@$user_branch = Session::get('user')['BRANCH'];
@$user_city = Session::get('user')['CITY'];
@$user_gender = Session::get('user')['GENDER'];
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update My Profile</h1>

                <div class=" row well container col-lg-8 col-md-9">
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="name">Name:</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_name ?>"
                                           placeholder="Enter Name" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Email:</label>

                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user_email ?>"
                                           placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="password">Password:</label>

                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="password" name="password"
                                           value="<?php echo $user_password ?>" placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="mobile">Mobile No:</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $user_mobile ?>"
                                           placeholder="Enter Mobile No." maxlength="11">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="college_name">College Name:</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="college_name"
                                           name="college_name" value="<?php echo $user_college_name ?>" placeholder="Enter College Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="degree">Degree:</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="degree" name="degree"
                                           value="<?php echo $user_degree ?>" placeholder="Enter Degree">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="control-label col-sm-3" for="branch">Branch:</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="branch" name="branch"
                                           value="<?php echo $user_branch ?>" placeholder="Enter Branch">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="city">City:</label>

                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="city" name="city"
                                           value="<?php echo $user_city ?>" placeholder="Enter City">
                                </div>
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
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <input type="submit" value="Update" name="update"
                                           class="btn btn-default">
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['update'])) {
                                extract($_POST);
                                $user_id = Session::get('user')['USER_ID'];
                                $user_name = $_POST['name'];
                                $user_email = $_POST['email'];
                                $user_password = $_POST['password'];
                                $user_mobile = $_POST['mobile'];
                                $user_college_name = $_POST['college_name'];
                                $user_degree = $_POST['degree'];
                                $user_branch = $_POST['branch'];
                                $user_city = $_POST['city'];
                                $user_gender = $_POST['gender'];
                                $update = new InsertInto();
                                $sql = $update->updateUserDetails($user_id, $user_name, $user_email, $user_password, $user_mobile, $user_college_name, $user_degree, $user_branch, $user_city, $user_gender);
                                if (($sql) >=1) {

                                    ?>
                                    <script>
                                        window.alert("Data Successfully Updated");
                                    </script>
                                <?php

                                } else {
                                ?>
                                    <script>window.alert("Something went Wrong");</script>
                                    <?php
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
