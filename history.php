<?php
include "services/database.php";

if (isset($_SESSION['email'])) {
	$usersql = "SELECT * FROM user WHERE email = ?";
	$userstmt = $pdo->prepare($usersql);
	$userstmt->execute([$_SESSION['email']]);
	$user = $userstmt->fetch();
<<<<<<< Updated upstream
	$admin=false;
	$loggedin = true;
	if($user['email']=="admin@bajuku.com"){
		$admin=true;
	}
} else {
	$loggedin = false;
	$admin=false;
=======
	$admin = false;
	$loggedin = true;
	if ($user['email'] == "admin@bajuku.com") {
		$admin = true;
	}
} else {
	$loggedin = false;
	$admin = false;
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="assets/images/logo.png" alt="" class="logobrand">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
				aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
=======
	<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
		<div class="container-fluid">

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="assets/images/logo.png" alt="" class="logobrand">
				</a>
				<div class="dropdown-menu logo" aria-labelledby="navbarDropdown">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12 text-left p-3" style="color:grey">
								Menu
							</div>
						</div>

					</div>
					<div class="row mt-3">
						<div class="col-12 justify-content-center d-flex menu-each-parent">
							<a href="www.google.com" class="justify-content-center d-flex">
								<div class="d-flex menu-each justify-content-left align-items-center pl-4">
									<i class="bi bi-bank"></i>
									<span class="ml-4 text-left">hello too</span>
								</div>
							</a>
						</div>
						<div class="col-12 justify-content-center d-flex menu-each-parent mt-1">
							<a href="www.google.com" class="justify-content-center d-flex">
								<div class="d-flex menu-each justify-content-left align-items-center pl-4">
									<i class="bi bi-bag-plus"></i>
									<span class="ml-4 text-left">testing 1323</span>
								</div>
							</a>
						</div>
						<div class="col-12 justify-content-center d-flex menu-each-parent mt-1">
							<a href="www.google.com" class="justify-content-center d-flex">
								<div class="d-flex menu-each justify-content-left align-items-center pl-4">
									<i class="bi bi-battery"></i>
									<span class="ml-4 text-left">coba123</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</li>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
>>>>>>> Stashed changes
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<?php
					if ($loggedin) {
						echo
<<<<<<< Updated upstream
							'<li class="nav-item">
=======
						'<li class="nav-item">
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
								</form>';
=======
								</form>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Dropdown
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdownacc">
										<div class="container-fluid">
											<div class="row">
												<div class="col-3">
													askdmw
												</div>
												<div class="col-9">
													nama@nama.nama
												</div>
											</div>
										</div>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</li>';
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
		<div class="row">
			<div class="col-12 d-flex justify-content-center align-items-center">
				<img src="assets/images/bajuku.png" alt="" class="logobrandfull">
			</div>
		</div>
		<div class="row">
<<<<<<< Updated upstream
			<table class="table table-light table-stripped">
				<thead>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		
=======
			<div class="table-responsive table-dark" style="border-radius:10px">
				<table class="table table-stripped">
					<thead>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
		Launch demo modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
>>>>>>> Stashed changes
	</div>

	<footer class="page-footer font-small teal pt-4">
		<div class="container text-center text-md-left">
			<div class="row">
<<<<<<< Updated upstream
				<div class="col-12 col-md-6 mt-md-0 mt-3">
					<h5 class="text-uppercase font-weight-bold"><img src="assets/images/logo.png" alt=""
							class="logobrand">BAJUKU</h5>
					<p>BAJUKU is the best</p>
				</div>
				<hr class="clearfix w-100 d-md-none pb-3">
				<div class="col-12 col-md-6 mb-md-0 mb-3 text-right">
=======
				<!--<div class="col-12 col-md-6 mt-md-0 mt-3">
					<h5 class="text-uppercase font-weight-bold"><img src="assets/images/logo.png" alt="" class="logobrand">BAJUKU</h5>
					<p>BAJUKU is the best</p>
				</div>-->
				<hr class="clearfix w-100 d-md-none pb-3">
				<div class="col-12 col-md-6 mb-md-0 mb-3 offset-3 text-center">
>>>>>>> Stashed changes
					<h5 class="text-uppercase font-weight-bold">CONNECT WITH US!</h5>
					<i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;: @bajukuinibro<br>
					<i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;: bajukuinibro<br>
					<i class="fa fa-whatsapp" aria-hidden="true"></i>&nbsp;: +628123123123<br>
					<i class="fa fa-home" aria-hidden="true"></i>&nbsp;: Jalan Pondok Indah<br>
<<<<<<< Updated upstream
					<i class="fa fa-hand-peace-o" aria-hidden="true"></i><br>

=======
>>>>>>> Stashed changes
				</div>
			</div>
		</div>
		<div class="footer-copyright text-center py-3">© 2020 Copyright: BAJUKU INDONESIA</div>
	</footer>
	<style>
<<<<<<< Updated upstream
=======
		/* .table-responsive{
			padding-left: 50px;
			padding-right: 50px;
		} */
		.popupone {
			position: fixed;
			width: 50px;
			height: 50px;
			right: 100px;
			top: 50px;
			background-color: white;
			border-radius: 10px;
			z-index: 100;
		}

		.menu-each {
			width: 85% !important;
			height: 50px;
			border-radius: 10px;
			background-color: transparent;
			transition: .5s ease;
		}

		.menu-each i,
		.menu-each span {
			color: grey;
		}

		.menu-each:hover i {
			color: aquamarine;
			transition: .5s ease;
		}

		.menu-each:hover span {
			color: aquamarine;
			transition: .5s ease;
		}

		.menu-each:hover {
			background-color: lightgrey;
			transition: .5s ease;
			color: aquamarine;
		}

		.menu-each-parent a {
			width: 100%;
			color: black;
		}

		.menu-each-parent a:hover {
			text-decoration: none;
		}

>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
=======
		li {
			list-style-type: none;
		}

		#accepted:before {
			content: "";
			width: 100px;
			height: 100px;
			background-color: white;
		}

>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
=======
		table {
			margin-right: 25px;
			margin-left: 25px;
		}

		table th,
		table td {
			text-align: left;
		}

		table tr {
			height: 70px;
		}

>>>>>>> Stashed changes
		.modal-body img {
			max-width: 400px;
			width: 100%;
			height: 400px;
		}

<<<<<<< Updated upstream
=======
		#dropdownacc {
			position: absolute;
			left: -225%;
			width: 300px;
		}

		.dropdown-menu {
			width: 300px;
		}

		.dropdown-menu.logo {
			left: 0;
			top: 50px;
			width: 300px;
			border-radius: 10px;
			box-shadow: 2px 2px 5px;
		}

>>>>>>> Stashed changes
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


<<<<<<< Updated upstream



=======
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
=======
		.tdwbutton {
			text-align: right;
		}

>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
		input:disabled {
			background-color: white;
		}
	</style>
	<script>

=======
		.dropdown-toggle::after {
			content: none;
		}

		input:disabled {
			background-color: white;
		}

		.divaccept:before {
			content: "";
			background-color: white;
			width: 1000px;
			height: 1000px;
		}

		@media screen and (min-width: 0px) and (max-width: 1000px) {}
	</style>
	<script>
>>>>>>> Stashed changes
		function load_data() {
			$.ajax({
				url: "services/get_history.php",
				method: "GET",
<<<<<<< Updated upstream
				success: function (data) {
					$("thead").html('');
					var admin = "<?php echo $admin?>";
					if(admin==true){
						var header=$(`
=======
				success: function(data) {
					$("thead").html('');
					var admin = "<?php echo $admin ?>";
					if (admin == true) {
						var header = $(`
>>>>>>> Stashed changes
						<tr>
						<th scope="col">#</th>
						<th scope="col">Tanggal</th>
						<th scope="col">ID Baju</th>
						<th scope="col">No Order</th>
						<th scope="col">Email Buyer</th>
<<<<<<< Updated upstream
=======
						<th></th>
>>>>>>> Stashed changes
						</tr>
						`);
						$("thead").append(header);

						$('tbody').html("");
<<<<<<< Updated upstream
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
=======
						var co = 1;
						data.forEach(function(history) {

							var row = $("<tr class='tabletr'></tr>");
							var col5 = $("<td width='5%'>" + co + "</td>");
							var col1 = $("<td width='10%'>" + history['tanggal'] + "</td>");
							var col2 = $("<td width='10%'>" + history['id_baju'] + "</td>");
							var col3 = $("<td width='20%'>" + history['no_order'] + "</td>");
							var col4 = $("<td width='20%' class='tdemail'>" + history['email'] + "</td>");
							var col6 = $(`
								<td width='25%' class="tdwbutton">
									<a href='#' id="rejected" style="color:red;display:none">Reject</a>
									<button type="button" class="btn btn-secondary ml-3" id="accepted" style="display:none">Secondary</button>
								</td>
								`)
							col5.appendTo(row);
							col1.appendTo(row);
							col2.appendTo(row);
							col3.appendTo(row);
							col4.appendTo(row);
							col6.appendTo(row);
							co++;
							$("tbody").append(row);

						})
					} else {
						var header = $(`
>>>>>>> Stashed changes
						<tr>
						<th scope="col">#</th>
						<th scope="col">Tanggal</th>
						<th scope="col">ID Baju</th>
						<th scope="col">No Order</th>
						</tr>
						`);
						$("thead").append(header);

						$('tbody').html("");
<<<<<<< Updated upstream
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
=======
						var co = 1;
						var email = "<?php echo $_SESSION['email']; ?>"
						console.log(email);
						data.forEach(function(history) {
							// console.log(history['email']);
							if (history['email'] == email) {
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
>>>>>>> Stashed changes
							}
						})
					}
				},
<<<<<<< Updated upstream
				error: function (data) {
=======
				error: function(data) {
>>>>>>> Stashed changes
					console.log("ga masok");
				}
			});
		}
<<<<<<< Updated upstream

		$(document).ready(function () {
			load_data();
		});
=======
		$(document).ready(function() {
			load_data();
		});
		$(document).on("mouseenter", "tr", function() {
			$(this).children().last().children().css("display", "");
		});
		$(document).on("mouseleave", "tr", function() {
			$(this).children().last().children().css("display", "none");
		});
		$(document).on("click", "#rejected", function() {
			var pos = $(this).parent().position();
			console.log(pos.top);
			var message = "You're Rejected " + $(this).parent().siblings('.tdemail').html();
			alert(message);
		});
		$(document).on("click", "#accepted", function() {
			var message = "You're Accepted " + $(this).parent().siblings('.tdemail').html();
			alert(message);

		});
>>>>>>> Stashed changes
	</script>
</body>

</html>