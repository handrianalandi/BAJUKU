<?php
include "database.php";

if(isset($_POST['id'])) {
    $updatestocksql = "UPDATE item SET size_s = ?,size_m = ?,size_l = ? WHERE id_item = ?";
    $updatestockstmt = $pdo->prepare($updatestocksql);
    $updatestockstmt->execute([$_POST['sizesmall'],$_POST['sizemedium'],$_POST['sizelarge'],$_POST['id']]);
    echo 1;
}
else{
	echo 0;
}
