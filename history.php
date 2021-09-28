<?php
include "services/database.php";

if (isset($_SESSION['email'])) {
	$usersql = "SELECT * FROM user WHERE email = ?";
	$userstmt = $pdo->prepare($usersql);
	$userstmt->execute([$_SESSION['email']]);
	$user = $userstmt->fetch();
	$admin=false;
	$loggedin = true;
	if($user['email']=="admin@bajuku.com"){
		$admin=true;
	}
} else {
	$loggedin = false;
	$admin=false;
	header("Location: home.php");
	// exit();
}

if (isset($_GET['status'])) {
	$status = $_GET['status'];
	if ($status == 10) {
		echo "<script>alert('Sign Up Successful!')</script>";
	}
	if ($status == 20) {
		echo "<script>alert('Transaction Successful!')</script>";
	}
	if ($status == 30) {
		echo "<script>alert('Transaction Failed!')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<?php include "header.php"; ?>

<head>
	<title>BAJUKU INDONESIA</title>
	<link rel="icon" type="image/png" href="assets/images/logo.png">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="assets/images/logo.png" alt="" class="logobrand">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
				aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<?php
					if ($loggedin) {
						echo
							'<li class="nav-item">
							<a class="navbar-text text-white mr-5 history" href="#">History <i class="fa fa-history" aria-hidden="true"></i></a>
					<span class="navbar-text text-white bg-dark mr-5">Hello, ' . $user['nama'] . '!</span>
					</li>';
					}
					?>

					<li class="nav-item">
						<?php
						if ($loggedin) {
							echo '<form class="form-inline my-2 my-lg-0" action="services/userlogout.php">
								<input class="btn btn-outline-light" type="submit" value="Logout"/>
								</form>';
						} else {
							echo '<form class="form-inline my-2 my-lg-0" action="login.php">
								<input class="btn btn-outline-light" type="submit" value="Login"/>
								</form>';
						}
						?>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-5 mb-5">

		<div class="row">
			<div class="col-12 d-flex justify-content-center align-items-center">
				<img src="assets/images/bajuku.png" alt="" class="logobrandfull">
			</div>
		</div>
		<div class="row">
			<table class="table table-light table-stripped">
				<thead>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		
	</div>

	<footer class="page-footer font-small teal pt-4">
		<div class="container text-center text-md-left">
			<div class="row">
				<div class="col-12 col-md-6 mt-md-0 mt-3">
					<h5 class="text-uppercase font-weight-bold"><img src="assets/images/logo.png" alt=""
							class="logobrand">BAJUKU</h5>
					<p>BAJUKU is the best</p>
				</div>
				<hr class="clearfix w-100 d-md-none pb-3">
				<div class="col-12 col-md-6 mb-md-0 mb-3 text-right">
					<h5 class="text-uppercase font-weight-bold">CONNECT WITH US!</h5>
					<i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;: @bajukuinibro<br>
					<i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;: bajukuinibro<br>
					<i class="fa fa-whatsapp" aria-hidden="true"></i>&nbsp;: +628123123123<br>
					<i class="fa fa-home" aria-hidden="true"></i>&nbsp;: Jalan Pondok Indah<br>
					<i class="fa fa-hand-peace-o" aria-hidden="true"></i><br>

				</div>
			</div>
		</div>
		<div class="footer-copyright text-center py-3">© 2020 Copyright: BAJUKU INDONESIA</div>
	</footer>
	<style>
		footer {
			background: rgba(0, 0, 0, 0.5);
			color: white;
		}

		body {
			background-image: url("assets/images/background.jpg");
			background-size: 100% 100%;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center;
		}

		.navbar {
			background: rgba(0, 0, 0, 0.3) !important;
		}

		.navbar-text {
			background: transparent !important;
		}

		.logobrandfull {
			height: 300px;
			width: auto;
		}

		.logobrand {
			height: 50px;
			width: auto;
		}

		.fotobaju {
			max-width: 500px;
			height: 500px;
			width: 100%;
			border-radius: 10px;
		}

		.modal-body img {
			max-width: 400px;
			width: 100%;
			height: 400px;
		}

		.namabaju {
			color: white;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.modal-open {
			overflow: initial;
		}

		.selectitem img {
			transition: .5s ease;
		}

		.selectitem:hover img {
			box-shadow: 2px 5px 10px 5px white;
			transition: .5s ease;
		}

		.addbutton {}


		.icon-bar {
			position: fixed;
			right: 50px;
			bottom: 50px;
			z-index: 10;
		}

		.icon-bar a {
			transition: all .3s ease;
			z-index: 10;
			width: 60px;
			height: 60px;
			background-color: rgba(128, 128, 128, 0.5);
			color: rgba(0, 0, 0, 0.5);
			display: flex;
			align-items: center;
			justify-content: center;
			border-radius: 50%;
			right: 50px;
			bottom: 50px;
		}

		.icon-bar a:hover {
			background: lightgreen;
			color: white;
			text-decoration: none;
			transform: scale(1.1);
		}





		.qty .count {
			color: #000;
			display: inline-block;
			vertical-align: top;
			font-size: 25px;
			font-weight: 700;
			line-height: 30px;
			padding: 0 2px;
			min-width: 35px;
			text-align: center;
		}

		.qty .plus {
			cursor: pointer;
			display: inline-block;
			vertical-align: top;
			color: white;
			width: 30px;
			height: 30px;
			font: 30px/1 Arial, sans-serif;
			text-align: center;
			border-radius: 50%;
		}

		.qty .minus {
			cursor: pointer;
			display: inline-block;
			vertical-align: top;
			color: white;
			width: 30px;
			height: 30px;
			font: 30px/1 Arial, sans-serif;
			text-align: center;
			border-radius: 50%;
			background-clip: padding-box;
		}

		div {
			text-align: center;
		}

		.minus:hover {
			background-color: #717fe0 !important;
		}

		.plus:hover {
			background-color: #717fe0 !important;
		}

		/*Prevent text selection*/
		span {
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
		}

		input.count {
			border: 0;
			width: 2%;
		}

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		input:disabled {
			background-color: white;
		}
	</style>
	<script>

		function load_data() {
			$.ajax({
				url: "services/get_history.php",
				method: "GET",
				success: function (data) {
					$("thead").html('');
					var admin = "<?php echo $admin?>";
					if(admin==true){
						var header=$(`
						<tr>
						<th scope="col">#</th>
						<th scope="col">Tanggal</th>
						<th scope="col">ID Baju</th>
						<th scope="col">No Order</th>
						<th scope="col">Email Buyer</th>
						</tr>
						`);
						$("thead").append(header);

						$('tbody').html("");
						var co=1;
						data.forEach(function(history){
							
                            	var row = $("<tr></tr>");
								var col5 = $("<td>" + co + "</td>");
                            	var col1 = $("<td>" + history['tanggal'] + "</td>");
                            	var col2 = $("<td>" + history['id_baju'] + "</td>");
                            	var col3 = $("<td>" + history['no_order'] + "</td>");
								var col4 = $("<td>" + history['email'] + "</td>");
								col5.appendTo(row);
                            	col1.appendTo(row);
                            	col2.appendTo(row);
                            	col3.appendTo(row);
                            	col4.appendTo(row);
                            	co++;
                            	$("tbody").append(row);
							
						})
					}
					else{
						var header=$(`
						<tr>
						<th scope="col">#</th>
						<th scope="col">Tanggal</th>
						<th scope="col">ID Baju</th>
						<th scope="col">No Order</th>
						</tr>
						`);
						$("thead").append(header);

						$('tbody').html("");
						var co=1;
						var email = "<?php echo $_SESSION['email']; ?>"
						console.log(email);
						data.forEach(function(history){
							// console.log(history['email']);
							if(history['email']==email){
                            	var row = $("<tr></tr>");
								var col4 = $("<td>" + co + "</td>");
                            	var col1 = $("<td>" + history['tanggal'] + "</td>");
                            	var col2 = $("<td>" + history['id_baju'] + "</td>");
                            	var col3 = $("<td>" + history['no_order'] + "</td>");
								col4.appendTo(row);
                            	col1.appendTo(row);
                            	col2.appendTo(row);
                            	col3.appendTo(row);
                            	
                            	co++;
                            	$("tbody").append(row);
							}
						})
					}
				},
				error: function (data) {
					console.log("ga masok");
				}
			});
		}

		$(document).ready(function () {
			load_data();
		});
	</script>
</body>

</html>