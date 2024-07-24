<?php
require "header.php";

$user = "root";
$pass = "";
$db = "online_quiz";
$con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed: " . mysqli_connect_error());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM quiz_category WHERE id = $id";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $examcat = $row['category'];
        $duration = $row['Exam_duration'];
    } else {
        echo "No record found.";
        exit;
    }
}

if (isset($_POST['editquiz'])) {
    $id = $_POST['id']; 
    $examcat = $_POST['examca'];
    $duration = $_POST['Duratio'];

    $stmt = "UPDATE quiz_category SET category = '$examcat', Exam_duration = '$duration' WHERE id = $id";
    $ans = $con->query($stmt);
    
        ?>
        <script type="text/javascript">
            window.location.href = "exam_category.php";
        </script>
        <?php
}
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Exam</h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="" name="exam_category" method="post">
                        <div class="card-body">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Edit Exam</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">New Exam Category</label>
                                            <input type="text" name="examca" value="<?php echo $examcat; ?>" placeholder="Enter Exam Category" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">New Exam Duration</label>
                                            <input type="text" name="Duratio" value="<?php echo $duration; ?>" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="submit" value="Edit confirm" style="background-color: aquamarine;" name="editquiz">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "footer.php";
?>
