<?php
//include file config.php
include('../../koneksi/koneksi.php');

$del = mysqli_query($koneksi, "TRUNCATE TABLE data_primer") or die(mysqli_error($koneksi));
$del = mysqli_query($koneksi, "TRUNCATE TABLE data_konversi") or die(mysqli_error($koneksi));
	if($del){
		echo '<script>alert("Berhasil menghapus seluruh data alternatif."); document.location="../tampil/tampil.php";</script>';
	}else{
		echo '<script>alert("Gagal menghapus data."); document.location="../tampil/tampil.phpp";</script>';
	}
?>