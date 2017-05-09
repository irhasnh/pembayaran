<?php
include 'class.php';

$kelas=new kelas();

$id=@$_POST['id'];
$nama=@$_POST['nama'];
$keterangan=@$_POST['keterangan'];
$act=@$_POST['act'];

if($act=='simpan'){
	if($nama=='' || empty($nama)){
		echo'<div class="alert alert-danger">Kelas Harus Diisi ! </div>';
	}
	else{
		$simpan=$kelas->simpan($nama, $keterangan);
		if($simpan){
			echo'<div class="alert alert-success">Berhasil Menyimpan!</div>';
			echo'<meta http-equiv="refresh" content="1">';
		}
		else{
			echo'<div class="alert alert-danger">Gagal !</div>';
		}
	}
}

if($act=='hapus'){
	$hapus=$kelas->hapusPerId($id);
	if($hapus){
		echo'<div class="alert alert-success">Berhasil Menghapus!</div>';
		echo'<meta http-equiv="refresh" content="1">';
	}
	else{
		echo'<div class="alert alert-danger">Gagal !</div>';
	}
}

if($act=='ambil'){
	$ambil=$kelas->tampilPerId($id);
	echo json_encode($ambil);
}

if($act=='edit'){
	if($nama=='' || empty($nama)){
		echo'<div class="alert alert-danger">Kelas Harus Diisi ! </div>';
	}
	else{
		$edit=$kelas->edit($id, $nama, $keterangan);
		if($edit){
			echo'<div class="alert alert-success">Berhasil Mengedit!</div>';
		echo'<meta http-equiv="refresh" content="1">';
		}
		else{
			echo'<div class="alert alert-danger">Gagal ! </div>';
		}
	}
}
?>