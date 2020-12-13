<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_timeline WHERE id='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Timeline</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
        <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Urut</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id" name="id" value="<?php echo $data_cek['id']; ?>"
					 readonly/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Timeline</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">Format file Jpg"</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ISI</label>
				<div class="col-sm-6">
                    <textarea id="isi" name="isi"rows="10" cols="50"><?php echo $data_cek['isi']; ?></textarea>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=timeline" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<?php

$sumber = @$_FILES['foto']['tmp_name'];
$target = 'foto_t/';
$nama_file = @$_FILES['foto']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto'];
            if (file_exists("foto_t/$foto")){
            unlink("foto_t/$foto");}

        $sql_ubah = "UPDATE tb_timeline SET
            foto='".$nama_file."',
            isi='".$_POST['isi']."'
            WHERE id='".$_POST['id']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
        $sql_ubah = "UPDATE tb_timeline SET
            isi='".$_POST['isi']."'
            WHERE id='".$_POST['id']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=timeline';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=timeline';
            }
        })</script>";
    }
}

