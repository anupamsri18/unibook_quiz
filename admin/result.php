<!DOCTYPE html>
<?php
require_once 'headeradmin.php';
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">RESULT</h2>
                        <?php
                        $user = new User();
                        $query = $user->db->get("SELECT * FROM user");
                        $feed = [];
                        ?>
                        <?php
                        if (@$_GET['q'] == 1) {
                        ?>
                        <h2 class="page-header">
                            Students
                        </h2>
                    </div>
                </div>
                <?php
                echo '<div class="panel"><table class="table table-striped title1">
                        <tr><td><b>S.N.</b></td><td><b>NAME</b></td><td><b>EMAIL</b></td><td><b>COLLEGE</b></td><td><b>MOBILE</b></td><td><b>BRANCH</b></td><td><b>SELECT</b></td></tr>';
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
                            <td><a title="View Result" href="result.php?q=123&name=' . $name . '&demail=' . $email . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
                }
                $c = 0;
                echo '</table></div>';
                ?>
            </div>
        </div>
    </div>

    <div>
        <?php
        }
        ?>
        <?php
        if (@$_GET['q'] == 123) {
        ?>
        <table class="table table-bordered ">
            <tr>
                <th>Questions</th>
                <th>Marks on Right Ans</th>
                <th>Marks on Wrong Ans</th>
            </tr>
            <?php
            $myemail = $_GET['demail'];
            $Database = new Database();
            $all = $Database->get("SELECT * FROM assigned_set");
            if (mysqli_num_rows($all) >= 1) {
                $result = [];
                while ($row = mysqli_fetch_assoc($all)) {
                    array_push($result, $row);
                }
                foreach ($result as $data) {
                    $email = explode(",", $data['email']);
                    foreach ($email as $item) {
                        if ($myemail == $item) {
                            $assigned_set = $data['assigned_set'];
                            $title = $Database->get("SELECT * FROM question_set where set_name='$assigned_set'");
                            if (mysqli_num_rows($title) >= 1) {
                                $exam_title = [];
                                while ($row1 = mysqli_fetch_assoc($title)) {
                                    array_push($exam_title, $row1);
                                }
                                foreach ($exam_title as $value) {
                                    $name = $value['subject_title'];
                                    $query1 = $Database->get("select * from question_set where set_name='$assigned_set'");
                                    if (mysqli_num_rows($query1) >= 1) {
                                        $result = [];
                                        while ($row = mysqli_fetch_assoc($query1)) {
                                            array_push($result, $row);
                                        }
                                        $index = 0;
                                        foreach ($result as $data) {
                                            $uid = '';
                                            $unique_id = explode(",", $data['unique_id']);
                                            foreach ($unique_id as $item) {
                                                $item = trim($item);
                                                $uid = $item;
                                                $total_count = count($unique_id);
                                                $query2 = $Database->get("select * from all_questions where unique_id='$uid'");
                                                $result1 = [];
                                                while ($row = mysqli_fetch_assoc($query2)) {
                                                    array_push($result1, $row);
                                                }
                                                foreach ($result1 as $all_questions) {
                                                    ($query3 = $Database->get("select * from result where unique_id='$uid' and email='$myemail'"));
                                                    $result2 = [];
                                                    while ($row = mysqli_fetch_assoc($query3)) {
                                                        array_push($result2, $row);
                                                    }
                                                    foreach ($result2 as $answers) {
                                                        if ($myemail == $answers['email']) {
                                                            $right = $answers['right_answer'];
                                                            $wrong = $answers['wrong_answer'];
                                                            $question_unique_id = array($unique_id)[0][$index];
                                                            $qns = $all_questions['QUESTION'];
                                                            echo '<tr><th>' . $qns . '</th><th>' . $right . '</th><th>' . $wrong . '</th></tr>';
                                                            echo '<br />';
                                                        } else {
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            }
            ?>
        </table>
        <?php
        ?>
    </div>
</div>

