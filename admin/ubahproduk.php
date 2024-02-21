<h2>Ubah Produk</h2>
<?php
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		  <label>Nama Produk</label>
		  <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'];?>">
	</div>

	<div class="form-group">
		  <label>Harga (Rp)</label>
		  <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk'];?>">
	</div>

	<div class="form-group">
		  <label>Berat (Gr)</label>
		  <input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat_produk'];?>">
	</div>

	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['foto_produk']?>" width="100">
		<img src="../foto_produk/<?php echo $pecah['foto_produk2']?>" width="100">
		<img src="../foto_produk/<?php echo $pecah['foto_produk3']?>" width="100">
		<img src="../foto_produk/<?php echo $pecah['foto_produk4']?>" width="100">
		<img src="../foto_produk/<?php echo $pecah['foto_produk5']?>" width="100">
	</div>

	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
		<label>Ganti Foto 2</label>
		<input type="file" name="foto2" class="form-control">
		<label>Ganti Foto 3</label>
		<input type="file" name="foto3" class="form-control">
		<label>Ganti Foto 4</label>
		<input type="file" name="foto4" class="form-control">
		<label>Ganti Foto 5</label>
		<input type="file" name="foto5" class="form-control">
	</div>

	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi_produk']; ?></textarea>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $berat = $_POST['berat'];
    $deskripsi = $_POST['deskripsi'];

    // Proses update foto-foto
    $namafoto1 = $_FILES['foto']['name'];
    $lokasifoto1 = $_FILES['foto']['tmp_name'];

    $namafoto2 = $_FILES['foto2']['name'];
    $lokasifoto2 = $_FILES['foto2']['tmp_name'];

    $namafoto3 = $_FILES['foto3']['name'];
    $lokasifoto3 = $_FILES['foto3']['tmp_name'];

    $namafoto4 = $_FILES['foto4']['name'];
    $lokasifoto4 = $_FILES['foto4']['tmp_name'];

    $namafoto5 = $_FILES['foto5']['name'];
    $lokasifoto5 = $_FILES['foto5']['tmp_name'];

    // Cek apakah ada foto yang diupload dan lakukan proses upload jika ada
    if (!empty($lokasifoto1)) {
        move_uploaded_file($lokasifoto1, "../foto_produk/$namafoto1");
    }
    if (!empty($lokasifoto2)) {
        move_uploaded_file($lokasifoto2, "../foto_produk2/$namafoto2");
    }
    if (!empty($lokasifoto3)) {
        move_uploaded_file($lokasifoto3, "../foto_produk3/$namafoto3");
    }
    if (!empty($lokasifoto4)) {
        move_uploaded_file($lokasifoto4, "../foto_produk4/$namafoto4");
    }
    if (!empty($lokasifoto5)) {
        move_uploaded_file($lokasifoto5, "../foto_produk5/$namafoto5");
    }

    // Membuat query update berdasarkan foto yang diupload
    $query = "UPDATE produk SET 
                nama_produk = '$nama', 
                harga_produk = '$harga', 
                berat_produk = '$berat',";

    if (!empty($namafoto1)) {
        $query .= "foto_produk = '$namafoto1',";
    }
    if (!empty($namafoto2)) {
        $query .= "foto_produk2 = '$namafoto2',";
    }
    if (!empty($namafoto3)) {
        $query .= "foto_produk3 = '$namafoto3',";
    }
    if (!empty($namafoto4)) {
        $query .= "foto_produk4 = '$namafoto4',";
    }
    if (!empty($namafoto5)) {
        $query .= "foto_produk5 = '$namafoto5',";
    }

    $query .= "deskripsi_produk = '$deskripsi'
               WHERE id_produk = '$_GET[id]'";

    // Jalankan query
    $koneksi->query($query);

    // Tampilkan pesan dan redirect
    echo "<script>alert('Data produk telah diubah');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>
