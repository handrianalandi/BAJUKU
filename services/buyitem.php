<?php
include "database.php";
header("Content-Type: application/json");

function RandomInt()
{
    $characters =
        '0123456789';
    $randstring = '';
    for ($i = 0; $i < 13; $i++) {
        $randchar = substr($characters, rand(0, strlen($characters)), 1);
        $randstring = $randstring . $randchar;
    }
    return $randstring;
}

if(isset($_POST['nama']) && isset($_POST['size']) && isset($_SESSION['email'])) {
    echo $_POST['nama'];
    $timestamp = date("Y-m-d H:i:s");
    $no_order = RandomInt();

    $sql= "INSERT INTO transaksi (id, tanggal, size, email, kuantitas, no_order) VALUES (?, ?, ?, ? ,? ,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['', $timestamp, $_POST['size'], $_SESSION['email'], 1, $no_order]);

    if ($_POST['size'] == 'S') {
        $updatestocksql = "UPDATE item SET size_s = size_s - 1 WHERE nama = ?";
    }
    if ($_POST['size'] == 'M') {
        $updatestocksql = "UPDATE item SET size_m = size_m - 1 WHERE nama = ?";
    }
    if ($_POST['size'] == 'L') {
        $updatestocksql = "UPDATE item SET size_l = size_l - 1 WHERE nama = ?";
    }
    $updatestockstmt = $pdo->prepare($updatestocksql);
    $updatestockstmt->execute([$_POST['nama']]);

    header("Location: ../home.php?status=20");
    exit();
}
else{
	header("Location: ../home.php?status=30");
	exit();
}
