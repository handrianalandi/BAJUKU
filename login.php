<?php
include "services/database.php";
if(isset($_SESSION['nama'])){
    header('location: home.php');
}
if(isset($_GET['status'])){
    $status=$_GET['status'];
    if($status==3){
        echo "<script>alert('Login Gagal!')</script>";
    }
    if($status==10){
        echo "<script>alert('Sign Up Successful!')</script>";
    }
}
?>
<html>

<head>
        <title>Login</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="assets/linearicons/style.css"/>

        <!-- JQuery Confirm -->
        <link rel="stylesheet" href="assets/jquery-confirm/jquery-confirm.css"/>

        <!-- JS -->
        <script src="assets/jquery/jquery-3.5.1.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.js"></script>
    </head>
<body>

        <div class="container">
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center align-items-center">
			        <img src="assets/images/bajuku.png" alt="" class="logobrandfull">
                </div>
                <div class="col-12 col-md-6 offset-md-3" align="center" style="text-align: center;">
					<form method="POST" action="services/verify-login.php">
						<div class="form-group" >
							<label for="exampleInputEmail1">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="password"  name="password" placeholder="Password" required>
						</div>
						
						<button type="submit" class="btn btn-outline-light">Login</button>
                    </form>
				</div>
            </div>
            <div class="row">
                <div class="col-12 signup" align="center" style="text-align:center">
                    Don't have an account? <a href="register.php">Sign Up!</a>
                </div>
            </div>
        </div>

        <style>
            body{
                background:black;
            }
            .nama,.signup,form{
                color:white;
            }
            .form-control{
                background:transparent;
            }
            .logobrandfull{
                height:300px;
                width:auto;
            }
        </style>
    </body>
</html>