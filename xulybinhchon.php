<?php
$config = mysqli_connect('localhost', 'root', '', 'review');
$idPA = $_GET["idPA"];

$qr1 = "UPDATE binhchon SET SoLanChon = SoLanChon + 1 WHERE idBC=1";
$qr2 = "UPDATE phuongan SET SoLanChon = SoLanChon + 1 WHERE idBC=1 AND idPA=$idPA";

if(mysqli_query($config, $qr1) && mysqli_query($config, $qr2)) {
    header('Location: ketquabinhchon.php');
} else {
    echo "Thất bại!";
}
?>