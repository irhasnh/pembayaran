<?php
include'class.php';

$act=@$_POST['act'];
$id=@$_POST['id'];
$nirm=@$_POST['nirm'];
$nama=@$_POST['nama'];
$kelas=@$_POST['kelas'];
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
	elseif($kelas=='' || empty($kelas) || $kelas=='-- pilih --'){
		echo'<div class="alert alert-danger">Kelas Harus Diisi !</div>';
	}
	else{
		$cek=$mhs->cekData($nirm);
		if(!$cek){
			echo'<div class="alert alert-danger">NIRM sudah digunakan !</div>';
		}
		else{
			$simpan=$mhs->simpan($nirm, $nama, $kelas, $tempatLahir, $tanggalLahir, $jk, $agama, $alamat, $password);
			if(!$simpan){
				echo'<div class="alert alert-danger">Gagal menyimpan !</div>';
			}
			else{
				$user=new user();
				$cek=$user->cekData($nirm);
				if($cek){
				$sUser=$user->insertData($nirm,$nama,$password, 'mahasiswa');
				if($sUser){
				echo'<div class="alert alert-success">Berhasil menyimpan!</div>';
				echo'<meta http-equiv="refresh" content="1">';
				}
				else{
					echo'<div class="alert alert-danger">Gagal menyimpan !</div>';
				}
				}
				else{
					echo'<div class="alert alert-danger">Gagal menyimpan !</div>';
				}
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
	elseif($kelas=='' || empty($kelas) || $kelas=='-- pilih --'){
		echo'<div class="alert alert-danger">Kelas Harus Diisi !</div>';
	}
	else{
		$cek=$mhs->cekData($nirm);
		if(!$cek){
			echo'<div class="alert alert-danger">NIRM sudah digunakan !</div>';
		}
		else{
			$edit=$mhs->edit($id, $nirm, $nama, $kelas, $tempatLahir, $tanggalLahir, $jk, $agama, $alamat, $password);
			if(!$edit){
				echo'<div class="alert alert-danger">Gagal mengupdate !</div>';
			}
			else{
				$user=new user();
				$cek=$user->cekData($nirm);
				if($cek){
				$edit=$user->editData($id, $nirm, $nama, $password, 'mahasiswa');
				if($edit){
				echo'<div class="alert alert-success">Berhasil mengupdate!</div>';
				echo'<meta http-equiv="refresh" content="1">';
				}
				else{
					echo'<div class="alert alert-danger">Gagal mengupdate !</div>';
				}
				}
				else{
					echo'<div class="alert alert-danger">Gagal mengupdate !</div>';
				}
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
		$user=new user();
		$hapusU=$user->hapusData($id);
		if($hapusU){
		echo'<div class="alert alert-success">Berhasil menghapus!</div>';
		echo'<meta http-equiv="refresh" content="1">';
		}
		else{
			echo'<div class="alert alert-danger">Gagal menghapus !</div>';
		}
	}
}
?>