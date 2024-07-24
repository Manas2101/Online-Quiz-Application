<?php
session_start();
$question_no = $_GET['question_no'];
$rvalue = $_GET['rvalue'];
$_SESSION["answer"][$question_no] = $rvalue;
?>
