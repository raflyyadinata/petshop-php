<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="text" class="form-control" name="nama" id="nama" required>
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="text" class="form-control" name="harga" id="harga" required>
    </div>
    <div class="form-group">
        <label for="berat">Berat</label>
        <input type="text" class="form-control" name="berat" id="berat" required>
    </div>
    <div class="form-group">
        <label for="foto1">Foto 1</label>
        <input type="file" class="form-control" name="foto1" id="foto1">
    </div>
    <div class="form-group">
        <label for="foto2">Foto 2</label>
        <input type="file" class="form-control" name="foto2" id="foto2">
    </div>
    <div class="form-group">
        <label for="foto3">Foto 3</label>
        <input type="file" class="form-control" name="foto3" id="foto3">
    </div>
    <div class="form-group">
        <label for="foto4">Foto 4</label>
        <input type="file" class="form-control" name="foto4" id="foto4">
    </div>
    <div class="form-group">
        <label for="foto5">Foto 5</label>
        <input type="file" class="form-control" name="foto5" id="foto5">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $berat = $_POST['berat'];
    $deskripsi = $_POST['deskripsi'];

    $foto1 = $_FILES['foto1']['name'];
    $lokasi1 = $_FILES['foto1']['tmp_name'];
    move_uploaded_file($lokasi1, "../foto_produk/" . $foto1);

    $foto2 = $_FILES['foto2']['name'];
    $lokasi2 = $_FILES['foto2']['tmp_name'];
    move_uploaded_file($lokasi2, "../foto_produk2/" . $foto2);

    $foto3 = $_FILES['foto3']['name'];
    $lokasi3 = $_FILES['foto3']['tmp_name'];
    move_uploaded_file($lokasi3, "../foto_produk3/" . $foto3);

    $foto4 = $_FILES['foto4']['name'];
    $lokasi4 = $_FILES['foto4']['tmp_name'];
    move_uploaded_file($lokasi4, "../foto_produk4/" . $foto4);

    $foto5 = $_FILES['foto5']['name'];
    $lokasi5 = $_FILES['foto5']['tmp_name'];
    move_uploaded_file($lokasi5, "../foto_produk5/" . $foto5);
	
	$tanggal = date('Y-m-d');

    $koneksi->query("INSERT INTO produk (nama_produk, harga_produk, berat_produk, foto_produk, foto_produk2, foto_produk3, foto_produk4, foto_produk5, deskripsi_produk,tanggal) 
                    VALUES ('$nama', '$harga', '$berat', '$foto1', '$foto2', '$foto3', '$foto4', '$foto5', '$deskripsi', '$tanggal')");

    echo "<div class='alert alert-info'>Data tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>
