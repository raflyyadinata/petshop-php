<?php
session_start();
// mendapatkan id_produk dari url 

$id_produk = $_GET['id'];

// Jika sudah ada produk itu dikeranjang, maka produk itu jumlahnya di +1

if (isset($_SESSION['like'][$id_produk]))
{
	$_SESSION['like'][$id_produk]+=1;
}

//Selain itu (belum ada di keranjang) maka produk itu di anggap dibeli 1

else
{
	$_SESSION['like'][$id_produk]=1;
}

echo "<script>alert('masuk wishlist');</script>";


//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

//larikan ke halaman keranjang

echo "<script>location='shop-full-width.php';</script>";

?>