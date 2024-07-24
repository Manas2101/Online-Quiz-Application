<?php
session_start();

if (!isset($_SESSION['end_time'])) {
    echo "00:00:00";
} else {
    $end_time = strtotime($_SESSION['end_time']);
    $current_time = strtotime(date("Y-m-d H:i:s"));
    $time_difference = $end_time - $current_time;

    if ($time_difference <= 0) {
        echo "00:00:00";
    } else {
        echo gmdate("H:i:s", $time_difference);
    }
}
?>
