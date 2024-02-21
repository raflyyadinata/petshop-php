<h2>Data Produk</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>harga</th>
			<th>berat</th>
			<th>foto</th>
			<th>foto2</th>
			<th>foto3</th>
			<th>foto4</th>
			<th>foto5</th>
			<th>tanggal</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
		<?php while($pecah = $ambil -> fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['berat_produk']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
			</td>
			<td>
				<img src="../foto_produk2/<?php echo $pecah['foto_produk2']; ?>" width="100">
			</td>
			<td>
				<img src="../foto_produk3/<?php echo $pecah['foto_produk3']; ?>" width="100">
			</td>
			<td>
				<img src="../foto_produk4/<?php echo $pecah['foto_produk4']; ?>" width="100">
			</td>
			<td>
				<img src="../foto_produk5/<?php echo $pecah['foto_produk5']; ?>" width="100">
			</td>
			<td><?php echo $pecah['tanggal']; ?></td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn">hapus </a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-warning">ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk" class = "btn btn-primary">Tambah Data</a>