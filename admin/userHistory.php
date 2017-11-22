<!DOCTYPE html>
<?php
require_once 'header.php';
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quiz Taken</h1>
                <div class=" row well container col-lg-8 col-md-9 text-capitalize">
                <?php
                $db = new Database();
                $user_id=Session::get('user')['USER_ID'];
                $query= $db->getByValue('test_taken','USER_ID',$user_id);
                $allRows = [];
                if ($rows = mysqli_num_rows($query)) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        array_push($allRows, $row);
                    }
                    echo "<table class='table table-hover table-responsive table-striped table-bordered'>";
                    echo "<tr><th>Quiz name</th><th>Marks obtained</th>";
                    foreach ($allRows as $data) {
                        echo "<tr><th>".$data['TEST_TAKEN'] . "</th><th>".$data['USER_MARKS']."</th>";
                    }
                    echo "</table>";
                }
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
