<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register Now</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="error-pagewrap">
        <div class="error-page-int">
            <div class="text-center custom-login">
                <h3>Register Now</h3>
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form id="loginForm" name="form2" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>FirstName</label>
                                    <input type="text" class="form-control" name="fname">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>LastName</label>
                                    <input type="text" class="form-control" name="lname">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="pass">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" name="contact">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn" type="submit" name="Register">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

<?php
$user = "root";
$pass = "";
$db = "online_quiz";
$con = mysqli_connect("localhost", $user, $pass, $db) or die("connection failed" . mysqli_connect_error());

if (isset($_POST['Register'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $ans = $con->query($sql);

        if ($ans->num_rows > 0) {
            $msg = "This user is already registered";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        } else {
     
            $sql = "INSERT INTO user (firstname, lastname, username, password, email, contact) VALUES ('$fname', '$lname', '$username', '$password', '$email', '$contact')";
            if ($con->query($sql) === TRUE) {
                $msg = "This user is registered successfully";
                echo "<script type='text/javascript'>alert('$msg');</script>";
            } else {
                $msg = "Error registering user: " . $con->error;
                echo "<script type='text/javascript'>alert('$msg');</script>";
            }
        }
    }
}
?>

</body>

</html>
