<?php
session_start();
require "header.php";
if(!isset($_SESSION['admin']))
{
?>
<script type="text/javascript">
window.location.href = "index.php";
</script>
<?php
}
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
                                <h1><center>Hi Admin!</center></h1>                       
                                
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
