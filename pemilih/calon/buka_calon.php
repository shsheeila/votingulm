<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		
		$kode=$_GET['kode'];
    }
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kandidat</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=PsSQAdT" class="btn btn-secondary btn-sm">
					< Kembali</a>
			</div>
			<br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>
							<center>Kandidat Pilihan Anda</center>
						</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$sql = $koneksi->query("select * from tb_calon where id_calon=$kode");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td align="center">
							<h1>
								<?php echo $data['id_calon']; ?>
							</h1>
							<br>
							<img src="foto/<?php echo $data['foto_calon']; ?>" width="400px" />
							<br>
							<h2>
								<?php echo $data['nama_calon']; ?>
							</h2>
							<form action="bukti.php" method="post">
							<div class="col-sm-6">
							<p class="help-block">
							<font color="red">"HARAP UPLOAD FOTO ANDA,Format file Jpg"</font>
							</p>
							<input type="file" id="foto_bukti" name="foto_bukti">
							<br>
							<br>
							</div>
							<input type="submit" name="Upload" value="Upload Gambar anda"><br>
							<br>
							</form>
							<a href="?page=PsSQBpL&kode=<?php echo $data['id_calon']; ?>" class="btn btn-primary">

								<i class="fa fa-edit"></i> Tetapkan Pilihan
							</a>
						</td>
					</tr>
					
					<?php
			  }
			  
	/*
    $sumber = @$_FILES['foto_bukti']['tmp_name'];
    $target = 'foto_bukti/';
    $nama_file = @$_FILES['foto_bukti']['name'];
    $pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Upload'])){
		
		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO tb_vote (id_pengguna,foto_bukti) VALUES (
		='".['id_pengguna']."',	
        '".$nama_file."')";
      
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Upload sukses',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-calon';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-calon';
          }
      })</script>";
	}
}elseif(empty($sumber)){
	echo "<script>
	Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?page=add-calon';
		}
	})</script>";
  }
}*/ 
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->