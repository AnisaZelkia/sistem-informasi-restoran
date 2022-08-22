<?php
$conn=mysqli_connect("localhost", "root", "", "restaurant");

function query($query)
	{
		global $conn;
	$result=mysqli_query( $conn,"SELECT * FROM menu");
	$rows=[];
		while( $row = mysqli_fetch_assoc($result))
			{
				$rows[] = $row;
			}
			return $rows;
	}
function tambah ($data)
	{
		global $conn;

		$gambar =htmlspecialchars($data["gambar"]);
		$nama =htmlspecialchars($data["nama"]);
		$jenis =htmlspecialchars($data ["jenis"]);
		$stok = htmlspecialchars($data["stok"]);
		$harga =htmlspecialchars($data["harga"]);
	
		$query = "INSERT INTO menu
						VALUES
				('$gambar','','$nama','$jenis','$stok' , '$harga')

				";
	mysqli_query ( $conn , $query );
	return mysqli_affected_rows( $conn );
	}
function hapus($id)
	{
		global $conn;
		mysqli_query($conn, "DELETE FROM menu WHERE id = $id");
		return mysqli_affected_rows($conn);
	}
function ubah($data)
	{
		global $conn;
		$id = $data["id"];
		$gambar =htmlspecialchars($data["gambar"]);
		$nama =htmlspecialchars($data["nama"]);
		$jenis =htmlspecialchars($data ["jenis"]);
		$stok = htmlspecialchars($data["stok"]);
		$harga =htmlspecialchars($data["harga"]);
	
		$query = "UPDATE menu SET
						gambar='$gambar',
						nama='$nama',
						jenis='$jenis',
						stok='$stok' , 
						harga='$harga'
				where id = $id
				";
				mysqli_query ( $conn , $query );
	return mysqli_affected_rows( $conn );

	}


function cari ($keyword)
		{
			$query ="SELECT * FROM menu
						WHERE
					nama LIKE '%$keyword%' OR
					id LIKE '%$keyword%' OR
					jenis LIKE '%$keyword%'
					";
			return query($query);
		}
?> 