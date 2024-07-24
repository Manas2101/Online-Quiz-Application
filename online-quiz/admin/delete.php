<?php
$user = "root";
$pass = "";
$db = "online_quiz";
$id = $_GET['id'];
$con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed: " . mysqli_connect_error());
$sql = "delete from quiz_category where id = $id";
$ans = $con->query($sql);

?>
<script type="text/javascript">
    window.location.href = "exam_category.php";
</script>
<?php
?>