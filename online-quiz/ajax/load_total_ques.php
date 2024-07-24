<?php
session_start();
$user = "root";
$pass = "";
$db = "online_quiz";
$con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed" . mysqli_connect_error());

$sql = "select * from questions where Category = '$_SESSION[category]'";
$ans = $con->query($sql);
$count = 0;
$count = mysqli_num_rows($ans);
echo "$count";

?>