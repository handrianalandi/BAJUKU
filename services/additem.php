<?php
include "database.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $harga=$_POST['harga'];
	$nama= $_POST['nama'];
	$sizesmall=$_POST['qtysmall'];
	$sizemedium=$_POST['qtymedium'];
    $sizelarge=$_POST['qtylarge'];
    $file = $_FILES['photoinput'];
    $filename = $file['name'];
    $destination = "../assets/images/".$filename;
    $directory="assets/images/".$filename;
    move_uploaded_file($file['tmp_name'], $destination);

    $sql= "INSERT INTO item (id_item, nama_item, item_image_directory, size_s, size_m, size_l,harga) VALUES (?, ?, ?, ? ,? ,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['', $nama,$directory,$sizesmall,$sizemedium,$sizelarge,$harga]);
    header("Location: ../addnewitem.php?status=10");
}
else{
    header("Location: ../addnewitem.php?status=20");
}

// if ( 0 < $_FILES['file']['error'] ) {
//     echo 'Error: ' . $_FILES['file']['error'] . '<br>';
// }
// else {
//     move_uploaded_file($_FILES['file']['tmp_name'], 'assets/images/' . $_FILES['file']['name']);
//     echo 1;
// }
?>


