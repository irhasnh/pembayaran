<?php
include 'class.php';

$mk=new mk();

$id=@$_POST['id'];
$namaMk=@$_POST['namaMk'];
$keterangan=@$_POST['keterangan'];
$act=@$_POST['act'];

if($act=='simpan'){
	if($namaMk=='' || empty($namaMk)){
		echo'<div class="alert alert-danger">Matakuliah Harus Diisi ! </div>';
	}
	else{
		$simpan=$mk->simpan($namaMk, $keterangan);
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
	$hapus=$mk->hapusPerId($id);
	if($hapus){
		echo'<div class="alert alert-success">Berhasil Menghapus!</div>';
		echo'<meta http-equiv="refresh" content="1">';
	}
	else{
		echo'<div class="alert alert-danger">Gagal !</div>';
	}
}

if($act=='ambil'){
	$ambil=$mk->tampilPerId($id);
	echo json_encode($ambil);
}

if($act=='edit'){
	if($namaMk=='' || empty($namaMk)){
		echo'<div class="alert alert-danger">Matakuliah Harus Diisi ! </div>';
	}
	else{
		$edit=$mk->edit($id, $namaMk, $keterangan);
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