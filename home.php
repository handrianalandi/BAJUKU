<?php
include "services/database.php";

if (isset($_SESSION['email'])) {
	$usersql = "SELECT * FROM user WHERE email = ?";
	$userstmt = $pdo->prepare($usersql);
	$userstmt->execute([$_SESSION['email']]);
	$user = $userstmt->fetch();

	$loggedin = true;
} else {
	$loggedin = false;
	// header("Location: login.php");
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
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<?php
					if ($loggedin) {
						echo
							'<li class="nav-item">
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
		<div class="row mt-5 itemcontainer">

		</div>

		<div class="modal fade" id="select-item-modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<form action="services/buyitem.php" method="POST" id="formbuyitem">

					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title text-center" id="nama"></h5>
						</div>
						<div class="modal-body">
							<img src="" alt="">
							<h5></h5>
							<p></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" id="submit-buy-button" type="submit" class="btn btn-success"><span class="lnr lnr-cart"></span> Buy</button>
						</div>
					</div>

				</form>
			</div>
		</div>

		<div class="modal fade" id="edit-item-modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-center"></h5>
					</div>
					<div class="modal-body">
						<img src="" alt="">
						<h5></h5>
						<p></p>
						<div class="qty mt-5">
							<span class="minus bg-dark">-</span>
							<input type="number" class="count" name="qty" value="1">
							<span class="plus bg-dark">+</span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" id="submit-buy-button" name="submit" class="btn btn-success"><span class="lnr lnr-cart"></span> Buy</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Please Log in before you buy our stuff!</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<a class="btn btn-primary" href="login.php" role="button">Login!</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer class="page-footer font-small teal pt-4">
		<div class="container text-center text-md-left">
			<div class="row">
				<div class="col-12 col-md-6 mt-md-0 mt-3">
					<h5 class="text-uppercase font-weight-bold"><img src="assets/images/logo.png" alt="" class="logobrand">BAJUKU</h5>
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

		.selectitem {
			transition: .5s ease;
		}

		.selectitem:hover img {
			box-shadow: 2px 5px 10px 5px white;
			transition: .5s ease;
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
				url: "services/get_all_item.php",
				method: "GET",
				success: function(data) {
					console.log("testmasok");
					$(".itemcontainer").html('');
					data.forEach(function(baju) {
						var jumlah_item = baju['size_s'] + baju['size_m'] + baju['size_l'];
						if (jumlah_item > 0) {
							var contain =
								$(
									`<div class="col-12 col-md-6 mt-5">
										<a class="selectitem" href="#">
											<img src="` + baju['item_image_directory'] + `" alt="" class="fotobaju">
											<div class="namabaju">` + baju['nama_item'] + `</div>
											<div class="kodebaju" style="display:none">` + baju['id_item'] + `</div>
											<div class="sizes" style="display:none">` + baju['size_s'] + `</div>
											<div class="sizem" style="display:none">` + baju['size_m'] + `</div>
											<div class="sizel" style="display:none">` + baju['size_l'] + `</div>
											<div class="hargabaju" style="display:none">Rp` + baju['harga'] + `</div>
										</a>
									</div>`
								);
							$(".itemcontainer").append(contain);
						}
					});
				},
				error: function(data) {
					console.log("ga masok");
				}
			});
		}

		$(document).ready(function() {
			load_data();
			$(document).ready(function() {
				$('.count').prop('disabled', true);
				$(document).on('click', '.plus', function() {
					$('.count').val(parseInt($('.count').val()) + 1);
				});
				$(document).on('click', '.minus', function() {
					$('.count').val(parseInt($('.count').val()) - 1);
					if ($('.count').val() == 0) {
						$('.count').val(1);
					}
				});
			});
		});
		$(document).on("click", ".selectitem", function() {
			var loggedin = "<?php echo $loggedin; ?>";
			if (loggedin) {
				var directory = $(this).find("img").attr("src");
				var idbaju = $(this).find(".kodebaju").html();
				var namabaju = $(this).find(".namabaju").html();
				var hargabaju = $(this).find(".hargabaju").html();
				var size_s = $(this).find(".sizes").html();
				var size_m = $(this).find(".sizem").html();
				var size_l = $(this).find(".sizel").html();
				$(".modal-title").html(namabaju);
				$(".modal-body").find("h5").html("ID Baju: " + idbaju);
				$(".modal-body").find("img").attr("src", directory);
				var header = `
					Harga: ` + hargabaju + `<br>
					Available Size:
					<center>
						<select class="form-control" id="size" style="height:40px; font-size: 12pt; width: 60%;">
						<option value="">Pilih size</option>
				`;
				if (size_s > 0) {
					header += `<option value="S">S</option>`;
				}
				if (size_m > 0) {
					header += `<option value="M">M</option>`;
				}
				if (size_l > 0) {
					header += `<option value="L">L</option>`;
				}
				header += `</select>
					</center>`;
				$(".modal-body").find("p").html(header);
				$(".count").val(1);
				$("#select-item-modal").modal();
			} else {
				$("#login-modal").modal();
			}
		});
	</script>
</body>

</html>