<?php
session_start();
$date = date("Y-m-d H:i:s");
$_SESSION['end_time'] = date("Y-m-d H:i:s", strtotime($date . "+{$_SESSION["Exam_duration"]} minutes")); 
include "header.php"
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">
    
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <?php
        $user = "root";
        $pass = "";
        $db = "online_quiz";
        $con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed: " . mysqli_connect_error());
        $correct = 0;
        $wrong = 0;
         
        if(isset($_SESSION["answer"])) {
            foreach($_SESSION["answer"] as $question_no => $user_answer) {
                $sql = "SELECT answer FROM questions WHERE category = '$_SESSION[category]' AND Question_no = '$question_no'";
                $ans = $con->query($sql);
                
                if(mysqli_num_rows($ans) > 0) {
                    $row = mysqli_fetch_assoc($ans);
                    $answer = $row["answer"];

                    if($answer == $user_answer) {
                        $correct++;
                    } else {
                        $wrong++;
                    }
                }
            }

            $count = 0;
            $sql_total = "SELECT * FROM questions WHERE category = '$_SESSION[category]'";
            $ans_total = $con->query($sql_total);
            $count = mysqli_num_rows($ans_total);

            echo "<br><br>";
            echo "<center>";
            echo "Total Questions: " . $count . "<br>";
            echo "Correct Answers: " . $correct . "<br>";
            echo "Wrong Answers: " . $wrong . "<br>";
            echo "</center>";
        }
        ?>

<?php
$user = "root";
$pass = "";
$db = "online_quiz";
$con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed: " . mysqli_connect_error());
if(isset($_SESSION['exam_start']))
{
$date = date("Y-m-d ");
$sqlt = "insert into exam_results(username,Exam_category,Total_ques,correct_ans,wrong_ans,exam_time) values('$_SESSION[username]','$_SESSION[category]','$count','$correct','$wrong','$date')";
$anst = $con->query($sqlt);
}

if(isset($_SESSION['exam_start']))
{
    unset($_SESSION['exam_start']);
    ?>
    <script type="text/javascript">
        window.location.href = window.location.href;
    </script>
    <?php
}

?>
    </div>

</div>

<?php
include "footer.php";
?>
