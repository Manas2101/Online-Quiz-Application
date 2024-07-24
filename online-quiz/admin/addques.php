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
$user = "root";
$pass = "";
$db = "online_quiz";
$con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed: " . mysqli_connect_error());
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Select Quiz</h1>
                    </div>
                </div>
            </div>
            

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                    
                            <div class="card-body">                           
                            <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Exam Category</th>
                                                    <th scope="col">Exam Duration</th>
                                                    <th scope="col">Select</th>
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
                                                        <td><a style="color: red;" href="add.php?id=<?php echo $row['id']; ?>">Add/Edit</a></td>
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
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div>
                    </div>
                    <!--/.col-->      
<?php
require "footer.php";
?>
