<?php
//memasukkan file config.php
include('koneksi.php');
?>


	<div class="container" style="margin-top:20px">
		<section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>  
      </ol>
    </section>
		<center><font size="6">DATA TRANSAKSI</font></center>
		<hr>
		<a href="index.php?page=transaksi"><button class="btn btn-dark right"><i class="fa fa-plus"> Tambah</i></button></a>
		<a target="_blank" href="printtrans.php"><button class="btn btn-primary"><i class="fa fa-print"></i></button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th class="text-center">NO</th>
					<th class="text-center">NAMA</th>
					<th class="text-center">STATUS</th>
					<th class="text-center">TANGGAL</th>
					<th class="text-center">BERAT/kg</th>
					<th class="text-center">TOTAL</th>
					<th class="text-center">AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM transaksi2 ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr class="text-center">
							<td>'.$no.'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['status'].'</td>
							<td>'.$data['tgl'].'</td>
							<td>'.$data['berat'].'</td>
							<td>'.$data['total'].'</td>
							<td>
								<a href="index.php?page=edit_transaksi&id='.$data['id'].'" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
								<a href="deltrans.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						';
						$no++;
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
	</div>
	</div>
