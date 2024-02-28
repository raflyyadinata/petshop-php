<?php
session_start();
$id_produk=$_GET["id"];
unset($_SESSION["like"][$id_produk]);

echo "<script>alert('Produk telah dihapus dari wishlist');</script>";
echo "<script>location = 'wishlist.php';</script>"; 
?>