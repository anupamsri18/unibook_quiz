<?php
require_once '../core/Config.php';
date_default_timezone_set('Asia/Kolkata');
$timeAgoObj = new ConvertToAgo();
$user = new User();
$query = $user->db->get("SELECT * FROM feedback ORDER BY TIMESTAMP DESC");
if (mysqli_num_rows($query )>= 1) {
$feed = [];
while ($row = mysqli_fetch_assoc($query)) {
    array_push($feed, $row);
}
?>
<ul class="timeline list-unstyled">
    <?php
    foreach ($feed as $data) {
        $ts = $data['TIMESTAMP'];
        $convertedTime = ($timeAgoObj->convert_datetime($ts));
        $when = ($timeAgoObj->makeAgo($convertedTime));
        $data['NAME'];

        echo "<li>
        <div class='timeline-badge'><i class='fa fa-edit'></i>
        </div>
        <div class='timeline-panel'>
            <div class='timeline-heading'>

                <h4 class='timeline-title'>" . $data['NAME'] . "</h4>
                 <p>
                    <small class='text-muted'><i class='fa fa-clock-o'></i> " . $when . "
                    </small>
                </p>
            </div>
            <div class='timeline-body'>
                <p>" . $data['FEEDBACK'] . "</p>
            </div>
        </div>
    </li>";

    }
    }else echo"";
    ?>
</ul>



