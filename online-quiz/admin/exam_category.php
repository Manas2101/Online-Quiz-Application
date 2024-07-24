<?php
session_start();
if(!isset($_SESSION['admin']))
{
?>
<script type="text/javascript">
window.location.href = "index.php";
</script>
<?php
}
require "header.php";
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Exam</h1>
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
                                    <div class="card-header"><strong>Add Exam</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">New Exam Category</label>
                                            <input type="text" name="examcat" placeholder="Enter Exam Category" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Exam Duration</label>
                                            <input type="text" name="Duration" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Add Quiz" style="background-color: aquamarine;" name="addquiz">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Current Exam</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Exam Category</th>
                                                    <th scope="col">Exam Duration</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user = "root";
                                                $pass = "";
                                                $db = "online_quiz";
                                                $con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed: " . mysqli_connect_error());
                                                $res = "SELECT * FROM quiz_category";
                                                $ans = $con->query($res);
                                                $count = 0;
                                                while ($row = mysqli_fetch_array($ans)) {
                                                    $count++;
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $count; ?></th>
                                                        <td><?php echo $row['category']; ?></td>
                                                        <td><?php echo $row['Exam_duration']; ?></td>
                                                        <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                                                        <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
$user = "root";
$pass = "";
$db = "online_quiz";
$con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed: " . mysqli_connect_error());

if (isset($_POST['addquiz'])) {
    $examcat = $_POST['examcat'];
    $duration = $_POST['Duration'];
    $sql = "INSERT INTO quiz_category(category, Exam_duration) VALUES ('$examcat', '$duration')";
    $ans = $con->query($sql);
    ?>
    <script type = "text/javascript">
    window.location = "exam_category.php";
    </script>
    <?php
}
?>

<?php
require "footer.php";
?>
