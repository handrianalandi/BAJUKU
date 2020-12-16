<?php
include $_SERVER['DOCUMENT_ROOT']."/ProyekTekweb/database.php";
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
                    Don't have accout? <a href="register.php">Sign Up!</a>
                </div>
            </div>
        </div>
        <script>

            function load_data() {
                $.ajax({
                    url: "/DB/services/user/get_all_user.php",
                    method: "GET",
                    success: function(data) {
                        var co = 1;
                        $("#user-content").html('');
                        data.forEach(function(mhs){
                            var row = $("<tr></tr>");
                            var col1 = $("<td>" + co + "</td>");
                            var col2 = $("<td>" + mhs['nrp'] + "</td>");
                            var col3 = $("<td>" + mhs['name'] + "</td>");
                            col1.appendTo(row);
                            col2.appendTo(row);
                            col3.appendTo(row);
                            
                            // Tools
                            var tools = $("<td></td>");
                            var edit_btn = $('<button id="edit-user-btn" class="btn btn-warning"><i class="lnr lnr-pencil"></i></button>');
                            var delete_btn = $('<button id="delete-user-btn" class="btn btn-danger"><i class="lnr lnr-trash"></i></button>');
                            
                            edit_btn.data('id', mhs['id']);
                            edit_btn.data('nrp', mhs['nrp']);
                            edit_btn.data('name', mhs['name']);
                            delete_btn.data('id', mhs['id']);

                            edit_btn.appendTo(tools);
                            tools.append(" ");
                            delete_btn.appendTo(tools);
                            tools.appendTo(row);

                            co++;
                            $("#user-content").append(row);
                        });
                    },
                    error: function(data) {

                    }
                });
            }

            $(document).ready(function(){
                load_data();
            });

            $("#add-user-btn").click(function(){
                $("#add-user-modal").modal();
            });
            $("#submit-user-button").click(function(){
                var nrp = $("#nrp").val();
                var name = $("#name").val();

            });

            $("#user-content").on("click", "[id='edit-user-btn']", function(){
                var id = $(this).data('id');
                var name = $(this).data('name');
                var nrp = $(this).data('nrp');
                
                $("#edit-id").val(id);
                $("#edit-name").val(name);
                $("#edit-nrp").val(nrp);
                $("#edit-user-modal").modal();
            });

            $("#edit-modal-button").click(function(){
                var id = $("#edit-id").val();
                var nrp = $("#edit-nrp").val();
                var name = $("#edit-name").val();
                
            });

            $("#user-content").on("click", "[id='delete-user-btn']", function(){
                var id = $(this).data('id');
                $.confirm({
                    title: 'Confirm!',
                    content: 'You cannot recover deleted data!',
                    buttons: {
                        confirm: {
                            text: 'Confirm',
                            btnClass: 'btn-success',
                            keys: ['enter'],
                            action: function(){
                                alert(id);
                                
                            }
                        },
                        cancel: {
                            text: 'Cancel',
                            btnClass: 'btn-secondary',
                            keys: ['shift'],
                            action: function(){
                                // alert("Cancel");
                            }
                        }
                    }
                });
            });
        </script>
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