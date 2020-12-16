<?php
include "database.php";
header("Content-Type: application/json");
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE email='$email' AND `password` ='$password'";
	$stmt = $pdo->prepare($sql);
    $stmt->execute();

	if($stmt->rowCount()==1){
		$rowUser = $stmt->fetch();
		$_SESSION['email'] = $rowUser['email'];
		header("Location: ../home.php");
	}
	else{
		header("Location: ../login.php?status=3");
		exit();
	}
}
else{
	header("Location: ../login.php");
	exit();
}
?>