<?php
include'class.php';

$act=@$_POST['act'];
$id=@$_POST['id'];
$username=@$_POST['username'];
$nama=@$_POST['nama'];
$password=@$_POST['password'];
$level=@$_POST['level'];
$user= new user();

if($act=='tambah'){
	if($username=='' || empty($username)){
		echo'<div class="alert alert-danger">Username Harus Diisi !</div>';
	}
	elseif($nama=='' || empty($nama)){
		echo'<div class="alert alert-danger">Nama Harus Diisi !</div>';
	}
	elseif($password=='' || empty($password)){
		echo'<div class="alert alert-danger">Password Harus Diisi !</div>';
	}
	elseif($level=='-- pilih --'){
		echo'<div class="alert alert-danger">Level Harus Diisi !</div>';
	}
	else{
		$cek=$user->cekData($username);
		if(!$cek){
		echo'<div class="alert alert-danger">Username sudah ada yang menggunakan</div>';
		}
		else{
		$simpan=$user->insertData($username,$nama, $password, $level);
		if(!$simpan){
			echo'<div class="alert alert-danger">Gagal !</div>';
		}
		else{
			echo'<div class="alert alert-success">Berhasil Menyimpan!</div>';
			echo'<meta http-equiv="refresh" content="1">';
		}
		}
	}
}
if($act=='ambil'){
	$tampil=$user->tampilPerUsername($username);
	echo json_encode($tampil);
}

if($act=='edit'){
	if($username=='' || empty($username)){
		echo'<div class="alert alert-danger">Username Harus Diisi !</div>';
	}
	elseif($nama=='' || empty($nama)){
		echo'<div class="alert alert-danger">Nama Harus Diisi !</div>';
	}
	elseif($password=='' || empty($password)){
		echo'<div class="alert alert-danger">Password Harus Diisi !</div>';
	}
	elseif($level=='-- pilih --'){
		echo'<div class="alert alert-danger">Level Harus Diisi !</div>';
	}
	else{
		$cek=$user->cekData($username);
		if(!$cek){
			echo'<div class="alert alert-danger">Username sudah ada yang menggunakan</div>';
		}
		else{
			$edit=$user->editData($id, $username, $nama, $password, $level);
			if(!$edit){
				echo'<div class="alert alert-danger">Gagal Mengedit !</div>';
			}
			else{
			echo'<div class="alert alert-success">Berhasil Mengedit!</div>';
			echo'<meta http-equiv="refresh" content="1">';
		}
		}
	}
}

if($act=='hapus'){
	$hapus=$user->hapusData($id);
	if($hapus){
		echo'<div class="alert alert-success">Berhasil Menghapus!</div>';
		echo'<meta http-equiv="refresh" content="1">';
	}
	else{
		echo'<div class="alert alert-danger">Gagal Menghapus !</div>';
	}
}
?>