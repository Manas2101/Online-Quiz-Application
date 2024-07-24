<?php
session_start();
$user = "root";
$pass = "";
$db = "online_quiz";
$con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed" . mysqli_connect_error());

$question_no = $_GET['question_no'];
$ans = "";
if (isset($_SESSION["answer"][$question_no])) {
    $ans = $_SESSION["answer"][$question_no];
}
$sql = "select * from questions where category = '$_SESSION[category]' && Question_no = '$question_no'";
$result = $con->query($sql);
$count = mysqli_num_rows($result);
if ($count == 0) {
    echo "over";
} else {
    while ($row = mysqli_fetch_array($result)) {
        $question_no = $row["Question_no"];
        $question = $row["question"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];
    }
    ?>
    <table>
        <tr>
            <td style="font-weight: bold; font-size:18px; padding-left:5px;" colspan="2">
              <?php echo "(" . $question_no . ")  " . $question; ?>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" onclick="save_ans(this.value, <?php echo $question_no; ?>)"
                <?php
                if ($ans == $opt1) {
                    echo "checked";
                }
                ?>>
            </td>
            <td style="padding-left: 10px;">
                <?php
                echo $opt1;
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" onclick="save_ans(this.value, <?php echo $question_no; ?>)"
                <?php
                if ($ans == $opt2) {
                    echo "checked";
                }
                ?>>
            </td>
            <td style="padding-left: 10px;">
                <?php
                echo $opt2;
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" onclick="save_ans(this.value, <?php echo $question_no; ?>)"
                <?php
                if ($ans == $opt3) {
                    echo "checked";
                }
                ?>>
            </td>
            <td style="padding-left: 10px;">
                <?php
                echo $opt3;
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" onclick="save_ans(this.value, <?php echo $question_no; ?>)"
                <?php
                if ($ans == $opt4) { 
                    echo "checked";
                }
                ?>>
            </td>
            <td style="padding-left: 10px;">
                <?php
                echo $opt4;
                ?>
            </td>
        </tr>
    </table>
    <?php
}
?>
