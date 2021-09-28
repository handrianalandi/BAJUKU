<?php
include "header.php";

if(isset($_GET['status'])){
    $status=$_GET['status'];
    if($status==3){
        echo "<script>alert('Sign Up Gagal!')</script>";
    }
    if($status==10){
        echo "<script>alert('Email telah dipakai!')</script>";
    }
}
?>
<!DOCTYPE html>
<html>


<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-12 d-flex justify-content-center align-items-center">
				<img src="assets/images/bajuku.png" alt="" class="logobrandfull">
			</div>
			<div class="col-12 col-md-6 offset-md-3" align="center" style="text-align: center;">
				<form method="POST" action="services/user-regist.php">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat"
							required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
							required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Password</label>
						<input type="password" class="form-control" id="password" name="password"
							placeholder="Enter Password" required>
					</div>
					<button type="submit" class="btn btn-primary">Sign Up</button>
				</form>
			</div>
		</div>
		<div class="row">
                <div class="col-12 signup" align="center" style="text-align:center">
                    Already have an account? <a href="login.php">Log in!</a>
                </div>
            </div>
	</div>
	<style>
	        body{
	        	background:black;
	        }
    </style>
<!-- 
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
		integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
	</script> -->
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