<?php
include "database.php";

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

if(isset($_POST['id']) && ($_POST['size']=="S"||$_POST['size']=="M"||$_POST['size']=="L")) {
    $timestamp = date("Y-m-d H:i:s");
    $no_order = RandomInt();

    $sql= "INSERT INTO transaksi (id, tanggal, size, email, kuantitas, no_order,id_baju) VALUES (?, ?, ?, ? ,? ,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['', $timestamp, $_POST['size'], $_SESSION['email'], 1, $no_order,$_POST['id']]);

    if ($_POST['size'] == 'S') {
        $updatestocksql = "UPDATE item SET size_s = size_s - 1 WHERE id_item = ?";
    }
    if ($_POST['size'] == 'M') {
        $updatestocksql = "UPDATE item SET size_m = size_m - 1 WHERE id_item = ?";
    }
    if ($_POST['size'] == 'L') {
        $updatestocksql = "UPDATE item SET size_l = size_l - 1 WHERE id_item = ?";
    }
    $updatestockstmt = $pdo->prepare($updatestocksql);
    $updatestockstmt->execute([$_POST['id']]);

    echo $no_order;
}
else{
	echo 0;
}
