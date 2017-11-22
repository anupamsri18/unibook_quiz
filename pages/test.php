<!DOCTYPE html>
<?php
require_once 'header.php';
if (!empty($_GET)) {
    if (array_key_exists('i', $_GET)) {
        $table = $_SESSION['table'] = $_GET['i'];
    }
}
?>
<html>
<head>
    <script type="text/javascript">
        function countDown(secs, status, progressbar) {
            var element = document.getElementById(status);
            element.innerHTML = "Time Left " + secs + " seconds";
            if (secs < 1) {
                clearTimeout(timer)
                {
                    element.innerHTML = "Times Up Submit Answers";
                    document.getElementById("testtaken").method = "post";
                    document.getElementById("testtaken").action = "result.php";
                    document.getElementById("testtaken").submit();
                }
            }
            secs--;
            var timer = setTimeout('countDown(' + secs + ',"' + status + '","' + progressbar + '")', 1000);

        }
    </script>
</head>
<body>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header text-capitalize"><?php echo $_SESSION['table']; ?></h1>
                    </div>
                    <div class="col-lg-offset-1">
                        <h1 class="page-header" id="status"></h1>
                    </div>
                </div>

                <div>
                    <form class="form-horizontal" role="form" id='testtaken' method="post" action="result.php">
                        <?php
                        $Database = new Database();
                        $quiz = new Selftable();
                        $t = $quiz->testTaken($table);
                        $res = $Database->getAll($table);
                        $rows = mysqli_num_rows($res);
                        $i = 1;
                        while ($result = mysqli_fetch_array($res)) {
                            ?>

                            <?php if ($i == 1) { ?>
                                <div id='question<?php echo $i; ?>' class=''>
                                    <p class='questions' id="qname<?php echo $i; ?>"> <?php echo $i ?>
                                        .<?php echo $result['QUESTION']; ?></p>
                                    <input type="radio" value="A" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['A']; ?>
                                    <br/>
                                    <input type="radio" value="B" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['B']; ?>
                                    <br/>
                                    <input type="radio" value="C" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['C']; ?>
                                    <br/>
                                    <input type="radio" value="D" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['D']; ?>
                                    <br/>
                                    <input type="radio" checked='checked' style='display:none' value="5"
                                           id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>
                                    <br/>

                                </div>

                            <?php } elseif ($i < 1 || $i < $rows) { ?>

                                <div id='question<?php echo $i; ?>' class='cont'>
                                    <p class='questions' id="qname<?php echo $i; ?>"><?php echo $i ?>
                                        .<?php echo $result['QUESTION']; ?></p>
                                    <input type="radio" value="A" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['A']; ?>
                                    <br/>
                                    <input type="radio" value="B" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['B']; ?>
                                    <br/>
                                    <input type="radio" value="C" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['C']; ?>
                                    <br/>
                                    <input type="radio" value="D" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['D']; ?>
                                    <br/>
                                    <input type="radio" checked='checked' style='display:none' value="5"
                                           id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>
                                    <br/>

                                </div>

                            <?php } elseif ($i == $rows) { ?>

                                <div id='question<?php echo $i; ?>' class='cont'>
                                    <p class='questions' id="qname<?php echo $i; ?>"><?php echo $i ?>
                                        .<?php echo $result['QUESTION']; ?></p>
                                    <input type="radio" value="A" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['A']; ?>
                                    <br/>
                                    <input type="radio" value="B" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['B']; ?>
                                    <br/>
                                    <input type="radio" value="C" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['C']; ?>
                                    <br/>
                                    <input type="radio" value="D" id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>&nbsp&nbsp<?php echo $result['D']; ?>
                                    <br/>
                                    <input type="radio" checked='checked' style='display:none' value="5"
                                           id='radio1_<?php echo $result['TEST_ID']; ?>'
                                           name='<?php echo $result['TEST_ID']; ?>'/>
                                    <br/>

                                    <button id='next<?php echo $i; ?>' class='next btn btn-success' type='submit'>
                                        Submit Answers
                                    </button>
                                </div>
                            <?php }
                            $i++;
                        } ?>

                    </form>
                </div>
            </div>

        </div>
        <!-- /.col-lg-12 -->
        <script type="text/javascript">countDown(300, "status");</script>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
</body>
</html>