<?php
session_start();
$from_time = date('Y-m-d H:i:s', time());
$to_time = $_SESSION['end_time'];
$diff = strtotime($to_time) - strtotime($from_time);
$temp = $diff / 86400; // 60 sec/min*60 min/hr*24 hr/day=86400 sec/day
// days
$days = floor($temp);/* echo "days: $days<br/>\n"; */
$temp = 24 * ($temp - $days)-3;
// hours
$hours = floor($temp);/* echo "hours: $hours<br/>\n";*/
$temp = 60 * ($temp - $hours)-30;
// minutes
$minutes = floor($temp);
/* echo "minutes: $minutes<br/>\n"; */
$temp = 60 * ($temp - $minutes);
// seconds
$seconds = floor($temp); /*echo "seconds: $seconds<br/>\n<br/>\n";*/
$minutes = abs($minutes);
if($days<0){
    $hours = abs($hours);
}

if (($days <= 0) && ($hours <= 0) && ($minutes <= 0) && ($seconds <= 0)) {
    echo "Finished";
}else
{
    echo "Exam Starts in ... {$days}d {$hours}h {$minutes}m {$seconds}s<br/>\n";
}
?>