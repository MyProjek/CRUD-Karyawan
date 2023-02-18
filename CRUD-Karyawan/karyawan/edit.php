<!DOCTYPE html>
<html>

<head>
	<title>EDIT DATA</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
	<div class="container col-md-6 mt-4">
		<h1>TABEL KARYAWAN</h1>
		<div class="card">
			<div class="card-header bg-success text-white ">
				EDIT DATA
			</div>
			<div class="card-body">
				<?php
				include('koneksi.php');

				$id = $_GET['id']; //mengambil id barang yang ingin diubah

				//menampilkan barang berdasarkan id
				$data = mysqli_query($koneksi, "select * from pendaftar where id = '$id'");
				$row = mysqli_fetch_assoc($data);

				?>
				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Nama</label>
						<!--  menampilkan nama barang -->
						<input type="text" name="nama" required="" class="form-control" value="<?= $row['nama']; ?>">
						<!-- ini digunakan untuk menampung id yang ingin diubah -->
						<input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
					</div>
					<div class="form-group">
						<label for="tempat-lahir">Tempat Lahir</label>
						<input type="text" class="form-control" id="tempat-lahir" name="tempat-lahir" required="" value="<?= $row['tempat_lahir']; ?>">
					</div>
					<div class="form-group">
						<label for="tanggal-lahir">Tanggal Lahir</label>
						<input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir" required="" value="<?= $row['tanggal_lahir']; ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea class="form-control" id="alamat" name="alamat" required=""><?= $row['alamat']; ?></textarea>
					</div>
					<div class="form-group">
						<label>Agama</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="agama" id="islam" value="islam" <?php if ($row['agama'] == 'islam') echo 'checked'; ?>>
							<label class="form-check-label" for="islam">Islam</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="agama" id="kristen" value="kristen" <?php if ($row['agama'] == 'kristen') echo 'checked'; ?>>
							<label class="form-check-label" for="kristen">Kristen</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="agama" id="hindu" value="hindu" <?php if ($row['agama'] == 'hindu') echo 'checked'; ?>>
							<label class="form-check-label" for="hindu">Hindu</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="agama" id="budha" value="budha" <?php if ($row['agama'] == 'budha') echo 'checked'; ?>>
							<label class="form-check-label" for="budha">Budha</label>
						</div>
					</div>
					<div class="form-group">
						<label for="jabatan">Jabatan</label>
						<select class="form-control" id="jabatan" name="jabatan">
							<option value="direktur" <?php if ($row['jabatan'] == 'direktur') echo 'selected'; ?> >Direktur</option>
							<option value="manajer" <?php if ($row['jabatan'] == 'manajer') echo 'selected'; ?> >Manajer</option>
							<option value="supervisor" <?php if ($row['jabatan'] == 'supervisor') echo 'selected'; ?>>Supervisor</option>
						</select>
					</div>

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">update data</button>

				</form>

				<?php

				//jika klik tombol submit maka akan melakukan perubahan
				if (isset($_POST['submit'])) {
					$id = $_POST['id'];
					$nama = $_POST['nama'];
					$tempat = $_POST['tempat-lahir'];
					$tanggal = $_POST['tanggal-lahir'];
					$alamat = $_POST['alamat'];
					$agama = $_POST['agama'];
					$jabatan= $_POST['jabatan'];
					//query mengubah barang
					mysqli_query($koneksi, "update pendaftar set 
								nama='$nama', 
								tempat_lahir='$tempat', 
								tanggal_lahir='$tanggal',
								alamat='$alamat',
								agama='$agama',
								jabatan='$jabatan'
								where id ='$id'") or die(mysqli_error($koneksi));

					//redirect ke halaman index.php
					echo "<script>alert('data berhasil diupdate.');window.location='index.php';</script>";
				}



				?>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="assets/js/jquery-3.6.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>