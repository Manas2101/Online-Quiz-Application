<?php
require "header.php";

$user = "root";
$pass = "";
$db = "online_quiz";
$id = $_GET['id'];

$con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM quiz_category WHERE id = $id";
$ans = $con->query($sql);
if ($row = mysqli_fetch_array($ans)) {
    $examcat = $row['category'];
} else {
    echo "No record found.";
    exit;
}
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Questions in <?php echo $examcat; ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-header"><strong>Add New Questions</strong></div>
                                <div class="card-body card-block">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="company" class="form-control-label">New Question</label>
                                            <input type="text" name="question" placeholder="Enter New Question" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="opt1" class="form-control-label">OPTION 1</label>
                                            <input type="text" name="opt1" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="opt2" class="form-control-label">OPTION 2</label>
                                            <input type="text" name="opt2" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="opt3" class="form-control-label">OPTION 3</label>
                                            <input type="text" name="opt3" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="opt4" class="form-control-label">OPTION 4</label>
                                            <input type="text" name="opt4" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="ans" class="form-control-label">Answer</label>
                                            <input type="text" name="ans" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Add Question" class="btn btn-success" name="addques">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['addques'])) {
    $question = $_POST['question'];
    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];
    $opt3 = $_POST['opt3'];
    $opt4 = $_POST['opt4'];
    $ans = $_POST['ans'];

    $loop = 0;
    $count = 0;

    $sql = "SELECT * FROM questions WHERE category = '$examcat' ORDER BY question_no ASC";
    $ans_result = $con->query($sql);
    $count = $ans_result->num_rows;

    if ($count > 0) {
        while ($row = mysqli_fetch_array($ans_result)) {
            $loop = $loop + 1;
            $sq = "UPDATE questions SET question_no = '$loop' WHERE id = " . $row['id'];
            $a = $con->query($sq);
        }
    }

    $loop = $loop + 1;
    $sqll = "INSERT INTO questions (question_no, question, opt1, opt2, opt3, opt4, answer, category) VALUES ('$loop', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$ans', '$examcat')";
    $aa = $con->query($sqll);

    ?>
    <script type="text/javascript">
        alert("Question Saved Successfully");
        window.location.href = window.location.href;
    </script>
    <?php
}
?>

<?php
require "footer.php";
?>
