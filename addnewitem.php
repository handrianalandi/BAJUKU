<?php
include "services/database.php";
include "header.php";
if ($_SESSION['email']=="admin@bajuku.com") {
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
}
if (isset($_GET['status'])) {
	$status = $_GET['status'];
if ($status == 10) {
    echo "<script>alert('Added Successfully!')</script>";
}
if ($status == 20) {
    echo "<script>alert('Failed to Add Item, Please Check Form Below and Resubmit!')</script>";
}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>BAJUKU INDONESIA</title>
	<link rel="icon" type="image/png" href="assets/images/logo.png">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="home.php">
				<img src="assets/images/logo.png" alt="" class="logobrand">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
					<span class="navbar-text text-white bg-dark mr-5">Admin Page</span>
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
            <div class="col-12 text-center">
				<h1>Add New Item</h1>
                <br>
                <h4>Please Fill This Form Below</h4>
			</div>
		</div>
        <br><br>
        <div class="row d-flex align-item-center justify-content-center">
            <form style="width:75%" action="services/additem.php" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="nama"><h2>Nama Item:</h2></label>
                    <input type="text" class="form-control" id="nama" placeholder="Input Nama" name="nama" required>
                </div>
                <div class="form-group mt-5" >
                    <label for="harga"><h2>Harga Item (tanpa titik):</h2></label>
                    <input type="number" class="form-control" id="harga" placeholder="Input Harga" name="harga"  min="1" required>
                </div>
                <div class="qty mt-5 form-group">
                        <h2>Small Stock(s): </h2>
                        <span class="minus bg-dark">-</span>
                        <input type="number" class="count small form-control" name="qtysmall" id="qtysmall" value="0">
                        <span class="plus bg-dark">+</span>
                </div>
                <div class="qty mt-5 form-group">
                        <h2>Medium Stock(s): </h2>
                        <span class="minus bg-dark">-</span>
                        <input type="number" class="count medium form-control" name="qtymedium" id="qtymedium" value="0">
                        <span class="plus bg-dark">+</span>
                </div>
                <div class="qty mt-5 form-group">
                        <h2>Large Stock(s): </h2>
                        <span class="minus bg-dark">-</span>
                        <input type="number" class="count large form-control" name="qtylarge" id="qtylarge" value="0">
                        <span class="plus bg-dark">+</span>
                </div>
                <div class="form-group text-center mt-5">
                    <label class="form-label" for="photoinput"><h2>Input Picture:</h2></label>
                    <input type="file" class="form-control" id="photoinput" name="photoinput" accept="image/*" required/>
                </div>
                <input class="btn btn-success add-item-button" type="submit" value="Add">
            </form>
        </div>
	</div>
	<style>
        .form-group{
            width:100%;
            color:white;
        }
        h1,h4,h2{
            color:white;
        }
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
		.addbutton{
			
		}


		.icon-bar {
			position: fixed;
			right:50px;
			bottom:50px;
			z-index:10;
		}
		.icon-bar a {
			transition: all .3s ease;
			z-index:10;
			width:60px;
			height:60px;
			background-color:rgba(128, 128, 128,0.5);
			color:rgba(0,0,0,0.5);
			display:flex;
			align-items:center;
			justify-content:center;
			border-radius:50%;
			right:50px;
			bottom:50px;
		}
		.icon-bar a:hover {
			background:lightgreen;
			color:white;
			text-decoration:none;
			transform:scale(1.1);
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
</body>
<script>
        $(document).ready(function() {
			$(document).on('click', '.plus', function() {
				$(this).parent().find('.count').val(parseInt($(this).parent().find('.count').val()) + 1);
			});
			$(document).on('click', '.minus', function() {
			$(this).parent().find('.count').val(parseInt($(this).parent().find('.count').val()) - 1);
			if ($(this).parent().find('.count').val() == -1) {
				$(this).parent().find('.count').val(0);
			}
			});
		});
        // $(".add-item-button").click(function() {
        //     var file_data = $("#photoinput").prop("files")[0];  
        //     var form_data = new FormData();
        //     form_data.append("file", file_data);
        //     var sizesmall=$('.count.small').val();
		// 	var sizemedium=$('.count.medium').val();
		// 	var sizelarge=$('.count.large').val();
        //     var nama=$('#nama').val();
        //     var harga=$('#harga').val();
		// 	$.ajax({
		// 		url: 'services/additem.php',
		// 		method: 'POST',
        //         cache: false,
        //         contentType: false,
        //         processData: false,
		// 		data: {
        //             harga:harga,
        //             form_data:form_data,
		// 			nama: nama,
		// 			sizesmall:sizesmall,
		// 			sizemedium:sizemedium,
		// 			sizelarge:sizelarge
		// 		},
		// 		success: function(data) {
		// 			if (data != 0) {
		// 			} else {
		// 			}
		// 		},
		// 		error: function($xhr, textStatus, errorThrown) {
		// 			alert($xhr.responseJSON['error']);
		// 		}
		// 	});
		// })
</script>
</html>
