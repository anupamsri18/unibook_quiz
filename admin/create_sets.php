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
                    <label for="marks_right">Marks on Right Ans:</label>
                    <input class="form-control col-lg-3" type="text" name="marks_right">
                </div>
                <div class="col-lg-2">
                    <label for="marks_wrong">Marks on Wrong Ans:</label>
                    <input class="form-control col-lg-3" type="text" name="marks_wrong">
                </div>
            </div>
            <?php
            if (@$_GET['q'] == 6) {
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
                                            <input type="submit" value="Create Sets" name="save_set" class="btn btn-default">
                                        </div>
                                      </div>';

                if (isset($_POST['save_set'])) {
                    $selected_set = $_POST['set'];
                    $selected_title = $_POST['title'];
                    $selected_time = $_POST['time'];
                    $val = $_POST['check'];
                    $tablename = "question_set";
                    $selected_check_box = implode(",", $val);
                    $sets = new Database();
                    $sql = $sets->Insert("Insert into question_set (subject_title,set_name,time,unique_id) values ('$selected_title','$selected_set','$selected_time','$selected_check_box')");

                }

                echo '</form>';
            } ?>
        </div>


    </div>
</div>


<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>