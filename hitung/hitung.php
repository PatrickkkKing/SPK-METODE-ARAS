<?php
session_start();
if(isset($_SESSION['username'])){
?>

<?php
//memasukkan file config.php
include('../koneksi/koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Proses dan Perankingan</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="icon" href="../img/logo_bi.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="../css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="../index.php"> <img src="../img/logo_bi.png" alt="logo" width="100" height="100"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>                        
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="../index.php">Beranda</a>
                                </li>
								<li class="nav-item active">
									<a class="nav-link" href="../crud/tampil/tampil.php">Data Alternatif</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../hitung/hitung.php">Perhitungan ARAS</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="../logout/logout.php">Logout</a>
								</li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

	<div class="container" style="margin-top:200px">
		<h2>Hasil Perankingan Alternatif</h2>
		<hr>
        <!-- Langkah 1 -->
		<!-- Normalisasi Matriks per Kriteria -->
        <!-- Mendapatkan Nilai Max per Kriteria -->
		<?php
			$query_mysql = mysqli_query($koneksi,"SELECT MIN(pembukaan_rekening) AS maximum FROM data_konversi")or die(mysqli_error());
			$row = mysqli_fetch_assoc($query_mysql);
			$maxk1 = $row['maximum'];
		?>
		<?php
			$query_mysql = mysqli_query($koneksi,"SELECT MIN(transfer_antar_bank) AS maximum FROM data_konversi")or die(mysqli_error());
			$row = mysqli_fetch_assoc($query_mysql);
			$maxk2 = $row['maximum'];
		?>
		<?php
			$query_mysql = mysqli_query($koneksi,"SELECT MIN(transfer_beda_bank) AS maximum FROM data_konversi")or die(mysqli_error());
			$row = mysqli_fetch_assoc($query_mysql);
			$maxk3 = $row['maximum'];
		?>
		<?php
			$query_mysql = mysqli_query($koneksi,"SELECT MIN(tabungan) AS maximum FROM data_konversi")or die(mysqli_error());
			$row = mysqli_fetch_assoc($query_mysql);
			$maxk4 = $row['maximum'];
		?>
		<?php
			$query_mysql = mysqli_query($koneksi,"SELECT MAX(pinjaman) AS maximum FROM data_konversi")or die(mysqli_error());
			$row = mysqli_fetch_assoc($query_mysql);
			$maxk5 = $row['maximum'];
		?>
		
		<!-- Langkah 1 -->
		<!-- Matriks Keputusan -->
		<?php 
		include('../koneksi/koneksi.php');
		mysqli_query($koneksi,"TRUNCATE TABLE data_matrik")or die(mysqli_error());
		mysqli_query($koneksi,"INSERT INTO data_matrik VALUES('','-','$maxk1','$maxk2','$maxk3','$maxk4','$maxk5')");
		$query_mysql = mysqli_query($koneksi,"SELECT * FROM data_konversi")or die(mysqli_error());
		$nomor = 1;
		$sumk1 = 0;
		$sumk2 = 0;
		$sumk3 = 0;
		$sumk4 = 0;
		$sumk5 = 0;
		while($data = mysqli_fetch_array($query_mysql)) 
		{ ?>
			<?php 
				$nama = $data['alternatif'];
				$k1 = $data['pembukaan_rekening'];
				$k2 = $data['transfer_antar_bank'];
				$k3 = $data['transfer_beda_bank'];
				$k4 = $data['tabungan'];
				$k5 = $data['pinjaman'];

				mysqli_query($koneksi,"INSERT INTO data_matrik VALUES('','$nama','$k1','$k2','$k3','$k4','$k5')");
			?>
		<?php } ?>

		<!-- Konversi Nilai Benefit -->
		<?php 
		include('../koneksi/koneksi.php');
		mysqli_query($koneksi,"TRUNCATE TABLE nilai_benefit")or die(mysqli_error());
		$query_mysql = mysqli_query($koneksi,"SELECT * FROM data_matrik")or die(mysqli_error());
		$nomor = 1;
		$sumk1 = 0;
		$sumk2 = 0;
		$sumk3 = 0;
		$sumk4 = 0;
		$sumk5 = 0;

		while($data = mysqli_fetch_array($query_mysql))
		{ ?>
			<?php 
				$nama = $data['alternatif'];
				$k1 = $data['pembukaan_rekening'];
				$k2 = $data['transfer_antar_bank'];
				$k3 = $data['transfer_beda_bank'];
				$k4 = $data['tabungan'];
				$k5 = $data['pinjaman'];


				$knb1 = $sumk1 + 1/ $k1;
				$knb2 = $sumk2 + 1/ $k2;
				$knb3 = $sumk3 + 1/ $k3;
				$knb4 = $sumk4 + 1/ $k4;
				$knb5 = $k5 ;
				mysqli_query($koneksi,"INSERT INTO nilai_benefit VALUES('','$nama','$knb1','$knb2','$knb3','$knb4', '$knb5')");
			?>
		<?php } ?>

		<!-- Langkah 2 -->
		<!-- Normalisasi Matriks -->
		<!-- Normalisasi Matriks per Kriteria -->
        <?php 
		include('../koneksi/koneksi.php');
		mysqli_query($koneksi,"TRUNCATE TABLE normalisasi")or die(mysqli_error());
		$query_mysql = mysqli_query($koneksi,"SELECT * FROM nilai_benefit")or die(mysqli_error());
		$sumk1 = 0;
		$sumk2 = 0;
		$sumk3 = 0;
		$sumk4 = 0;
		$sumk5 = 0;

		while($data = mysqli_fetch_array($query_mysql))
		{ ?>
			<?php 
				$nama = $data['alternatif'];
				$knb1 = $data['pembukaan_rekening'];
				$knb2 = $data['transfer_antar_bank'];
				$knb3 = $data['transfer_beda_bank'];
				$knb4 = $data['tabungan'];
				$knb5 = $data['pinjaman'];

				$sumk1 = $sumk1 + $knb1;
				$sumk2 = $sumk2 + $knb2;
				$sumk3 = $sumk3 + $knb3;
				$sumk4 = $sumk4 + $knb4;
				$sumk5 = $sumk5 + $knb5;				
			?>
		<?php } ?>
        
        
		<?php
		include('../koneksi/koneksi.php');
		$query_mysql = mysqli_query($koneksi,"TRUNCATE TABLE normalisasi")or die(mysqli_error());
		?>
		<br>
        
        <?php 
		include('../koneksi/koneksi.php');
		$query_mysql = mysqli_query($koneksi,"SELECT * FROM nilai_benefit")or die(mysqli_error());
		$nomor = 0;
		while($data = mysqli_fetch_array($query_mysql))
		{ ?>
			<?php 
				$nama = $data['alternatif'];
				$knb1 = $data['pembukaan_rekening'];
				$knb2 = $data['transfer_antar_bank'];
				$knb3 = $data['transfer_beda_bank'];
				$knb4 = $data['tabungan'];
				$knb5 = $data['pinjaman'];

				$kn1=$knb1/$sumk1;
				// $kn1=round($kn1,5);
				$kn2=$knb2/$sumk2;
				// $kn2=round($kn2,5);
				$kn3=$knb3/$sumk3;
				// $kn3=round($kn3,5);
				$kn4=$knb4/$sumk4;
				// $kn4=round($kn4,5);
				$kn5=$knb5/$sumk5;
				// $kn5=round($kn5,5);
				mysqli_query($koneksi,"INSERT INTO normalisasi VALUES('','$nama','$kn1','$kn2','$kn3','$kn4','$kn5')");
			?>
		<?php } ?>
		
        <!-- Langkah 3 -->
        <!-- Menghitung Nilai Normalisasi * Bobot -->
		<?php
		include('../koneksi/koneksi.php');
		$query_mysql = mysqli_query($koneksi,"TRUNCATE TABLE normalisasi_terbobot")or die(mysqli_error());
		?>
		<br>
        
    	<?php 
		include('../koneksi/koneksi.php');
		$query_mysql = mysqli_query($koneksi,"SELECT * FROM normalisasi")or die(mysqli_error());
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql))
		{ ?>
			<?php 
				$nama = $data['alternatif'];
				$kn1 = $data['pembukaan_rekening'];
				$kn2 = $data['transfer_antar_bank'];
				$kn3 = $data['transfer_beda_bank'];
				$kn4 = $data['tabungan'];
				$kn5 = $data['pinjaman'];

				$nil1 = $kn1*0.20;
				// $nil1 = round($nil1,5);
				$nil2 = $kn2*0.15;
				// $nil2 = round($nil2,5);
				$nil3 = $kn3*0.15;
				// $nil3 = round($nil3,5);
				$nil4 = $kn4*0.25;
				// $nil4 = round($nil4,5);
				$nil5 = $kn5*0.25;
				// $nil5 = round($nil5,5);
				
				mysqli_query($koneksi,"INSERT INTO normalisasi_terbobot VALUES('','$nama','$nil1','$nil2','$nil3','$nil4','$nil5')");
			?>
		<?php } ?>
		
        <!-- Langkah 4 -->
		<!-- Menentukan Nilai Dari Fungsi Optimum -->
		<?php
		include('../koneksi/koneksi.php');
		$query_mysql = mysqli_query($koneksi,"TRUNCATE TABLE hasil")or die(mysqli_error());
		?>
		<br>
        
    	<?php 
		include('../koneksi/koneksi.php');
		$query_mysql = mysqli_query($koneksi,"SELECT * FROM normalisasi_terbobot")or die(mysqli_error());
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql))
		{ ?>
			<?php 
				$nama = $data['alternatif'];
				$nil1 = $data['pembukaan_rekening'];
				$nil2 = $data['transfer_antar_bank'];
				$nil3 = $data['transfer_beda_bank'];
				$nil4 = $data['tabungan'];
				$nil5 = $data['pinjaman'];
				$nilop = $nil1+$nil2+$nil3+$nil4+$nil5;
				
				mysqli_query($koneksi,"INSERT INTO hasil VALUES('','$nama','$nilop')");
			?>
		<?php } ?>

		<!-- Langkah 4 -->
		<!-- Perangkingan -->
		<?php
			$query_mysql = mysqli_query($koneksi,"SELECT MAX(nilai_optimum) AS maximum FROM hasil")or die(mysqli_error());
			$row = mysqli_fetch_assoc($query_mysql);
			$maxoptimum = $row['maximum'];
		?>

		<?php
		include('../koneksi/koneksi.php');
		$query_mysql = mysqli_query($koneksi,"TRUNCATE TABLE hasil2")or die(mysqli_error());
		?>
		<br>
        
    	<?php 
		include('../koneksi/koneksi.php');
		$query_mysql = mysqli_query($koneksi,"SELECT * FROM hasil")or die(mysqli_error());
		$nomor = 1;
		while($data = mysqli_fetch_array($query_mysql))
		{ ?>
			<?php 
				$nama = $data['alternatif'];
				$k1 = $data['nilai_optimum'];
				$rang =$k1/$maxoptimum;
				// $rang = round($rang,5);
				
				mysqli_query($koneksi,"INSERT INTO hasil2 VALUES('','$nama','$rang')");
			?>
		<?php }
			 
			$del = mysqli_query($koneksi, "DELETE FROM hasil2 WHERE no='1'") or die(mysqli_error($koneksi));
		?>

		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
        			<th>Nama</th>
        			<th>Nilai</th>
        			<th>Ranking</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM hasil2 ORDER by nilai_akhir DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					$rank = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['alternatif'].'</td>
							<td>'.$data['nilai_akhir'].'</td>
							<td>Ranking ke '.$rank.'</td>
						</tr>
						';
						$no++;
						$rank++;
						
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
		<p align="center">
        <a href="../skema_hitung/skema_hitung.php" class="btn btn-warning">View Skema</a>
        <a href="../laporan/laporan.php" class="btn btn-warning">Cetak Laporan</a>
        </p>
        <hr>
	</div>
	
</body>
</html>

<?php
}else{
echo "<script language=\"javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href='../login/index.php';</script>";
}
?>