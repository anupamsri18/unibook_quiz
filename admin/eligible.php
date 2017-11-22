<!DOCTYPE html>
<?php
require_once 'headeradmin.php';
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Status</h1>
                <?php
                $check_status = new Database();
                $query = $check_status->getAll('user');
                $allStudents = [];
                if ($rows = mysqli_num_rows($query)) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        array_push($allStudents, $row);
                    }
                    echo "<table class='table table-hover table-responsive table-striped table-bordered'>";
                    echo "<tr><th>USER ID</th><th>NAME</th><th>EMAIL</th><th>MOBILE</th><th>COLLEGE NAME</th><th>DEGREE</th><th>BRANCH</th><th>YEAR</th><th>CITY</th><th>GENDER</th>";
                    foreach ($allStudents as $data) {
                        echo "<tr><th>" . $data['USER_ID'] . "</th><th>" . $data['NAME'] . "</th><th>" . $data['EMAIL'] . "</th><th>" . $data['MOBILE'] . "</th><th>" . $data['COLLEGE_NAME'] . "</th><th>" . $data['DEGREE'] . "</th><th>" . $data['BRANCH'] . "</th><th>" . $data['YEAR'] . "</th><th>" . $data['CITY'] . "</th><th>" . $data['GENDER'] . "</th>";
                    }
                    echo "</table>";
                }
                ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
