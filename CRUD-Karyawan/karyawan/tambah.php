<!DOCTYPE html>
<html>

<head>
	<title>FORM TAMBAH</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
	<div class="container col-md-6 mt-4">
		<h1>TABEL DATA</h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Tambah DATA
			</div>
			<div class="card-body">
				<form action="" method="post" role="form">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama">
					</div>
					<div class="form-group">
						<label for="tempat-lahir">Tempat Lahir</label>
						<input type="text" class="form-control" id="tempat-lahir" name="tempat-lahir">
					</div>
					<div class="form-group">
						<label for="tanggal-lahir">Tanggal Lahir</label>
						<input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea class="form-control" id="alamat" name="alamat"></textarea>
					</div>
					<div class="form-group">
						<label>Agama</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="agama" id="islam" value="islam">
							<label class="form-check-label" for="islam">Islam</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="agama" id="kristen" value="kristen">
							<label class="form-check-label" for="kristen">Kristen</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="agama" id="hindu" value="hindu">
							<label class="form-check-label" for="hindu">Hindu</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="agama" id="budha" value="budha">
							<label class="form-check-label" for="budha">Budha</label>
						</div>
					</div>
					<div class="form-group">
						<label for="jabatan">Jabatan</label>
						<select class="form-control" id="jabatan" name="jabatan">
							<option value="direktur">Direktur</option>
							<option value="manajer">Manajer</option>
							<option value="supervisor">Supervisor</option>
						</select>
					</div>

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
					
				</form>

				<?php
				include('koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$nama = $_POST['nama'];
					$tempat = $_POST['tempat-lahir'];
					$tanggal = $_POST['tanggal-lahir'];
					$alamat = $_POST['alamat'];
					$agama = $_POST['agama'];
					$jabatan= $_POST['jabatan'];

					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($koneksi, "insert into pendaftar (nama, tempat_lahir, tanggal_lahir, alamat, agama, jabatan) values 
					('$nama', '$tempat', '$tanggal', '$alamat', '$agama', '$jabatan')") or die(mysqli_error($koneksi));
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='index.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery-3.6.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>
