<!DOCTYPE html>
<?php
require_once 'headeradmin.php';
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">My Profile</h1>

                <div class=" row well container col-lg-8 col-md-9 text-capitalize">
                    <?php
                    @$user_id = Session::get('user')['USER_ID'];
                    @$user_name = Session::get('user')['NAME'];
                    @$user_email = Session::get('user')['EMAIL'];
                    @$user_mobile = Session::get('user')['MOBILE'];
                    @$user_college_name = Session::get('user')['COLLEGE_NAME'];
                    @$user_degree = Session::get('user')['DEGREE'];
                    @$user_branch = Session::get('user')['BRANCH'];
                    @$user_city = Session::get('user')['CITY'];

                    echo "<table class='table table-hover table-responsive table-striped table-bordered'>";
                    echo "<tr><th>Name</th><th>" . $user_name . "</th>";
                    echo "<tr><th>Student Id</th><th>" . $user_id . "</th>";
                    echo "<tr><th>Email<th>" . $user_email . "</th>";
                    echo "<tr><th>Mobile</th><th>" . $user_mobile . "</th>";
                    echo "<tr><th>College</th><th>" . $user_college_name . "</th>";
                    echo "<tr><th>Degree</th><th>" . $user_degree . "</th>";
                    echo "<tr><th>Branch</th><th>" . $user_branch . "</th>";
                    echo "<tr><th>City</th><th>" . $user_city . "</th>";
                    echo "</table>";

                    ?>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
