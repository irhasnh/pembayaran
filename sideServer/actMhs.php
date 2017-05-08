<?php
include'class.php';

$act=@$_POST['act'];
$id=@$_POST['id'];
$nirm=@$_POST['nirm'];
$nama=@$_POST['nama'];
$tempatLahir=@$_POST['tempatLahir'];
$tanggalLahir=@$_POST['tanggalLahir'];
$jk=@$_POST['jk'];
$agama=@$_POST['agama'];
$alamat=@$_POST['alamat'];
$password=@$_POST['password'];
$mhs=new mahasiswa();

if($act=='simpan'){
	if($nirm=='' || empty($nirm)){
		echo'<div class="alert alert-danger">NIRM Harus Diisi !</div>';
	}
	elseif($nama=='' || empty($nama)){
		echo'<div class="alert alert-danger">Nama Harus Diisi !</div>';
	}
	elseif($password=='' || empty($password)){
		echo'<div class="alert alert-danger">Password Harus Diisi !</div>';
	}
	else{
		$cek=$mhs->cekData($nirm);
		if(!$cek){
			echo'<div class="alert alert-danger">NIRM sudah digunakan !</div>';
		}
		else{
			$simpan=$mhs->simpan($nirm, $nama, $tempatLahir, $tanggalLahir, $jk, $agama, $alamat, $password);
			if(!$simpan){
				echo'<div class="alert alert-danger">Gagal menyimpan !</div>';
			}
			else{
				echo'<div class="alert alert-success">Berhasil menyimpan!</div>';
				echo'<meta http-equiv="refresh" content="1">';
			}
		}
	}
}

if($act=='ambil'){
	$tampil=$mhs->tampilPerId($id);
	echo json_encode($tampil);
}

if($act=='edit'){
	if($nirm=='' || empty($nirm)){
		echo'<div class="alert alert-danger">NIRM Harus Diisi !</div>';
	}
	elseif($nama=='' || empty($nama)){
		echo'<div class="alert alert-danger">Nama Harus Diisi !</div>';
	}
	elseif($password=='' || empty($password)){
		echo'<div class="alert alert-danger">Password Harus Diisi !</div>';
	}
	else{
		$cek=$mhs->cekData($nirm);
		if(!$cek){
			echo'<div class="alert alert-danger">NIRM sudah digunakan !</div>';
		}
		else{
			$edit=$mhs->edit($id, $nirm, $nama, $tempatLahir, $tanggalLahir, $jk, $agama, $alamat, $password);
			if(!$edit){
				echo'<div class="alert alert-danger">Gagal mengupdate !</div>';
			}
			else{
				echo'<div class="alert alert-success">Berhasil mengupdate!</div>';
				echo'<meta http-equiv="refresh" content="1">';
			}
		}
	}
}

if($act=='hapus'){
	$hapus=$mhs->hapusPerId($id);
	if(!$hapus){
		echo'<div class="alert alert-danger">Gagal menghapus !</div>';
	}
	else{
		echo'<div class="alert alert-success">Berhasil menghapus!</div>';
		echo'<meta http-equiv="refresh" content="1">';
	}
}
?>