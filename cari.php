<?php
require 'function.php';

if( isset($_POST["cari"])) 
	{
		$data = cari($_POST["keyword"]);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body style="text-align: center">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<h1>DAFTAR MENU</h1><br>
	<a href="tambah.php">+ Tambah data menu</a>
	<br><br>
	<form action="" method="post">
		<input type="search" name="keyword" size="25" autofocus placeholder=" Masukan keyword pencarian..." autocomplete="off">
		<button type="search" name="cari">Search</button>
	<br>
	<br>
	<table border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th>Opsi</th>
			<th>Gambar</th>
			<th>Id</th>
			<th>Nama</th>
			<th>Jenis</th>
			<th>Stok</th>
			<th>Harga</th>
		</tr>
		<tr>
			<td>
					<a href="ubah.php?id=<?=$row["id"];?>">ubah</a> |
					<a href="hapus.php?id=<?=$row["id"];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"];?>" width="100px"></td>
			<td><?= $row["id"];?></td>
			<td><?= $row["nama"];?></td>
			<td><?= $row["jenis"];?></td>
			<td><?= $row["stok"];?></td>
			<td>Rp.<?= $row["harga"];?></td>
		</tr>
		
	</table> 
	</form>


</body>
</html>