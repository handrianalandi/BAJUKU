<?php
include "database.php";
header("Content-Type: application/json");
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $sql="SELECT * FROM user WHERE email = '$email'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount()>0){
        header("Location: ../register.php?status=10");
        exit();
	}
	else{
		$sql = "INSERT INTO user (id_user,email,nama,alamat,`password`) VALUES (DEFAULT,'$email','$nama','$alamat','$password')";
	    $stmt = $pdo->prepare($sql);
    
	    if($stmt->execute()){
			$_SESSION['email'] = $rowUser['email'];
            header("Location: ../home.php?status=10");
            exit();
	    }
	    else{
		    header("Location: ../register.php?status=3");
		    exit();
	    }
	}

	
}
else{
	header("Location: ../register.php");
	exit();
}
?>