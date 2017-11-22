<!DOCTYPE html>
<?php
require_once 'headertest.php';
if (!empty($_GET)) {
    if (array_key_exists('i', $_GET)) {
        $table = $_SESSION['table'] = $_GET['i'];
    }
}
?>

<?php
$sn = 1;
$Database = new Database();
$set_name = @$_GET['set_name'];
$exam_name = @$_GET['title'];
$query1 = $Database->get("select * from question_set where subject_title='$exam_name' AND set_name='$set_name'");
if (mysqli_num_rows($query1) >= 1) {
$result = [];
while ($row = mysqli_fetch_assoc($query1)) {
    array_push($result, $row);
}
$index = @$_GET['n'];
foreach ($result as $data) {


$unique_id = explode(",", $data['unique_id']);
$question_unique_id = array($unique_id)[0][$index];
$index_new = $index;
$index_new++;
$total_count = count($unique_id);
?>
<html>
<body>
<div id="page-wrapper">
    <div class="container-fluid col-lg-12" style="padding-left: 0px;">
        <div class="row col-lg-10" style="padding-right: 0px;">
            <div class="well col-lg-12">
                <?php

                if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
                $query2 = $Database->get("select * from all_questions where unique_id='$question_unique_id'");
                $result = [];
                while ($row = mysqli_fetch_assoc($query2)) {
                    array_push($result, $row);
                }
                foreach ($result as $all_questions) {
                if ($question_unique_id == $all_questions['unique_id']) {
                    echo '<form action="update.php?set_name=' . $set_name . '&q=quiz&step=2&name=' . $exam_name . '&n=' . $index . '&total=' . $total_count . '&u_id='.$question_unique_id.'" method="POST"  class="form-horizontal">';
                    $qns = $all_questions['QUESTION'];
                    $qns_img = $all_questions['ques_img'];

                echo '<b><div class=" col-lg-12" style="overflow-y: scroll; height: 200px;">Ques ' . $index_new . '.&nbsp;&nbsp;' . $qns . '';
                if ($qns_img != '') {
                    echo '<img class="thumbnail" width="auto" height="200px" src="../admin/' . $qns_img . '">';
                }
                }
                echo '</div>';


                $optionA = $all_questions['A'];
                $img_a = $all_questions['img_a'];
                $optionB = $all_questions['B'];
                $img_b = $all_questions['img_b'];
                $optionC = $all_questions['C'];
                $img_c = $all_questions['img_c'];
                $optionD = $all_questions['D'];
                $img_d = $all_questions['img_d'];
                ?>

            </div>
        </div>
        <div class="well col-lg-2" style="float: right; overflow-y: scroll;">
            <?php
            $sn=1;
            for ($i = 0; $i < $total_count; $i++) {
                if ($i == $index) {
                    $k = $i;
                    echo '<a  style="margin:2px; display:inline-block; position:relative;" class="btn btn-primary " href="test1.php?set_name=' . $set_name . '&q=quiz&step=2&title=' . $exam_name . '&n=' . $i . '&t=' . $total_count . '">' . $sn++ . '</a>';
                } else {
                    echo '<a style="margin:2px;  display:inline-block; position:relative" class="btn btn-default " href="test1.php?set_name=' . $set_name . '&q=quiz&step=2&title=' . $exam_name . '&n=' . $i . '&t=' . $total_count . '">' . $sn++ . '</a>';
                }


            }
            ?>

        </div>
        <div class="container-fluid" style="padding-left: 0px;">
            <div class="row">
                <div class="well col-lg-5" style="overflow-y: scroll; height: 280px;">
                    <?php
                    echo '<div >A&nbsp;.&nbsp;<input type="radio" name="ans" value="A">&nbsp;&nbsp;' . $optionA . '';
                    echo '</div><div >B&nbsp;.&nbsp;<input type="radio" name="ans" value="B">&nbsp;&nbsp;' . $optionB . '';
                    echo '</div><div>C&nbsp;.&nbsp;<input type="radio" name="ans" value="C">&nbsp;&nbsp;' . $optionC . '';
                    echo '</div><div>D&nbsp;.&nbsp;<input type="radio" name="ans" value="D">&nbsp;&nbsp;' . $optionD . '';
                    echo '</div><div>&nbsp;&nbsp;<input style="display: none;" checked="checked" type="radio" name="ans" value="E">&nbsp;&nbsp;';
                    echo '</div>';
                    ?>
                </div>
                <?php
                if ($img_a != '' || $img_b != '' || $img_c != '' || $img_d != '') {
                    ?>
                    <div class="col-lg-5" style="overflow-y: scroll; height: 280px;">
                        <?php
                        if ($img_a != '') {
                            echo 'A<img class="thumbnail" width="100%" height="200px" src="../admin/' . $img_a . '">';
                        }

                        if ($img_b != '') {
                            echo 'B<img class="thumbnail" width="100%" height="200px" src="../admin/' . $img_b . '">';
                        }

                        if ($img_c != '') {
                            echo 'C<img class="thumbnail" width="100%" height="200px" src="../admin/' . $img_c . '">';
                        }

                        if ($img_d != '') {
                            echo 'D<img class="thumbnail" width="100%" height="200px" src="../admin/' . $img_d . '">';
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class='col-lg-11 col-lg-offset-1'>

                <?php
                echo '<button style="float: right;" type="submit" class="btn btn-primary"><span class="fa fa-2x" aria-hidden="true"></span>&nbsp;Next</button></form></div><br><br>';
                ?>
            </div>
            <?php
            }
            }
            }
            } ?>
        </div>
    </div>
</div>
</body>
</html>