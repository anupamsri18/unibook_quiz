<!DOCTYPE html>
<?php
require_once 'header.php';
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">You have Successfully submitted your response</h2>

                <div class="row"></div>
                    <div class="panel panel-default">
                        <div class="panel-heading form-inline">
                            <div class="row">
                                <i class="fa fa-clock-o fa-fw"></i> Feedback
                                <form class=" col-lg-offset-7 col-md-offset-7 col-sm-offset-4 col-xs-offset-4 form-group form-inline"
                                      action="feedbackProcess.php" method="post" name="feedbackform">
                                    <div class="input-group form-inline">
                                        <input id="btn-input" type="text" class="form-control input-sm" name="feedback"
                                               placeholder="Type your message here..."/>
                                        <span class="input-group-btn">
                                    <button type="submit" name="submit_feedback" class="btn btn-warning btn-sm"
                                            id="btn-chat">
                                        Submit Feedback
                                    </button>
                                </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="panel-body">
                            <?php
                            require_once 'feedbackShow.php';
                            ?>

                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
