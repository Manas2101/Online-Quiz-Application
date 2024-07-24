<?php
session_start();
if(!isset($_SESSION['username']))
{
    ?>
    <script type="text/javascript">
        window.location = "login.php";
    </script>
    <?php
    exit(); 
}
?>
<?php
include "header.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    <h1><center>Select Quiz</center></h1>
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <?php
        $user = "root";
        $pass = "";
        $db = "online_quiz";
        $con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed" . mysqli_connect_error());
        $sql = "select * from quiz_category";
        $ans= $con->query($sql);
        while($row = mysqli_fetch_array($ans))
        {
            ?>
            <input type="button" class="btn btn-success form-control" value="<?php echo $row['category']; ?>" onclick="set_exam(this.value)" style="background-color: blue; color:aliceblue">
            <?php
        }
        ?>
    </div>
</div>

<script type="text/javascript">
function set_exam(category) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            window.location = "dashboard.php";
        }
    };
    xhttp.open("GET", "ajax/set_exam.php?category=" + category, true);
    xhttp.send();
}
</script>

<?php
include "footer.php";
?>
