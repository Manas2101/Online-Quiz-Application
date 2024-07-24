<?php
session_start();

$user = "root";
$pass = "";
$db = "online_quiz";
$con = mysqli_connect("localhost", $user, $pass, $db) or die("Connection failed" . mysqli_connect_error());

$category = $_GET["category"];
$_SESSION["category"] = $category;

$sql = "SELECT * FROM quiz_category WHERE category = '$category'";
$result = $con->query($sql);

while ($row = mysqli_fetch_array($result)) {
    $_SESSION["Exam_duration"] = $row['Exam_duration'];
}

$date = date("Y-m-d H:i:s");
$_SESSION['end_time'] = date("Y-m-d H:i:s", strtotime($date . "+{$_SESSION["Exam_duration"]} minutes"));
$_SESSION['exam_start'] = "YES";
?>

