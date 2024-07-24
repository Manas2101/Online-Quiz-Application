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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                    
                            <div class="card-body">      
                            
                <h1><CENTER>PAST RESULTS</CENTER></h1>
                <?php
                  $user = "root";
                  $pass = "";
                  $db = "online_quiz";
                  $con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed" . mysqli_connect_error());
                  $sql = "select * from exam_results  order by id desc";
                  $ans = $con->query($sql);
                  $count = 0;
                  $count = mysqli_num_rows($ans);
                  if($count==0)
                  {
                    ?>
                    <center>
                        <h1>NO RESULT FOUND</h1>
                    </center>
                    <?php
                  }
                  else{
                    echo "<table class = 'table table-bordered'>";
                    echo "<tr>";
                    echo "<th>"; echo "username"; echo "</th>";
                    echo "<th>"; echo "Category"; echo "</th>";
                    echo "<th>"; echo "Total Question"; echo "</th>";
                    echo "<th>"; echo "Correct"; echo "</th>";
                    echo "<th>"; echo "Incorrect"; echo "</th>";
                    echo "<th>"; echo "Date"; echo "</th>";
                    echo "</tr>";
                    while($row = mysqli_fetch_array($ans))
                    {
                    echo "<tr>";
                    echo "<th>"; echo $row['username']; echo "</th>";
                    echo "<th>"; echo $row['Exam_category']; echo "</th>";
                    echo "<th>"; echo $row['Total_ques']; echo "</th>";
                    echo "<th>"; echo $row['correct_ans']; echo "</th>";
                    echo "<th>"; echo $row['wrong_ans']; echo "</th>";
                    echo "<th>"; echo $row['exam_time']; echo "</th>";
                    echo "</tr>";
                    }
                    echo "</table>";
                  }
            

                ?>
                                
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
