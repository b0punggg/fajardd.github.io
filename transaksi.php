<?php include('koneksi.php'); ?>

		<center><font size="6">Transaksi</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$status			= $_POST['status'];
			$tgl			= $_POST['tgl'];
			$berat			= $_POST['berat'];
			$total			= $_POST['total'];

			$cek = mysqli_query($koneksi, "SELECT * FROM transaksi2 WHERE id='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO transaksi2 (nama, status, tgl, berat, total) VALUES('$nama', '$status', '$tgl', '$berat', '$total')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan antrian."); document.location="index.php?page=tampil_transaksi";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah antrian.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, nama sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=transaksi" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
				<div class="col-md-6 col-sm-6">
					<select name="status" class="form-control" required>
						<option value="">Pilih Status</option>
						<option value="Masuk">Masuk</option>
						<option value="Masuk">Keluar</option>
					</select>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tgl" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Berat/kg</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="berat" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Total</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="total" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
