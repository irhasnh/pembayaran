<?php
include'class.php';

$act=@$_POST['act'];
$id=@$_POST['id'];
$nama=@$_POST['nama'];
$tempatLahir=@$_POST['tempatLahir'];
$tanggalLahir=@$_POST['tanggalLahir'];
$jk=@$_POST['jk'];
$agama=@$_POST['agama'];
$alamat=@$_POST['alamat'];
$password=@$_POST['password'];
$idd='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
$idd=str_shuffle($idd);
$idd=substr($idd,0,6);

$dosen=new dosen();
$user=new user();

if($act=='simpan'){
	if($nama=='' || empty($nama)){
		echo'<div class="alert alert-danger">Nama Harus Diisi !</div>';
	}
	elseif($password=='' || empty($password)){
		echo'<div class="alert alert-danger">Password Harus Diisi !</div>';
	}
	else{
		$cekUser=$user->cekData($idd);
		if(!$cekUser){
			echo'<div class="alert alert-danger">Id Dosen Sudah Ada Yang Menggunakan !</div>';
		}
		else{
			$simpanUser=$user->insertData($idd, $nama, $password, 'dosen');
			if(!$simpanUser){
				echo'<div class="alert alert-danger">Gagal Simpan User !</div>';
			}
			else{
				$simpanDosen=$dosen->simpan($idd, $nama, $password, $jk, $agama, $tempatLahir, $tanggalLahir, $alamat);
				if(!$simpanDosen){
					echo'<div class="alert alert-danger">Gagal Simpan Dosen !</div>';
				}
				else{
					echo'<div class="alert alert-success">Berhasil menyimpan!</div>';
					echo'<meta http-equiv="refresh" content="1">';
				}
			}
		}
	}
}

if($act=='hapus'){
	$hapus=$dosen->hapusPerId($id);
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

if($act=='ambil'){
	$tampil=$dosen->tampilPerId($id);
	echo json_encode($tampil);
}

if($act=='edit'){
	if($nama=='' || empty($nama)){
		echo'<div class="alert alert-danger">Nama Harus Diisi !</div>';
	}
	elseif($password=='' || empty($password)){
		echo'<div class="alert alert-danger">Password Harus Diisi !</div>';
	}
	else{
			$edit=$dosen->edit($id, $nama, $password, $jk, $agama, $tempatLahir, $tanggalLahir, $alamat);
			if(!$edit){
				echo'<div class="alert alert-danger">Gagal mengupdate !</div>';
			}
			else{
				
				$edit1=$user->editData($id, $id, $nama, $password, 'dosen');
				if($edit1){
				echo'<div class="alert alert-success">Berhasil mengupdate!</div>';
				echo'<meta http-equiv="refresh" content="1">';
				}
				else{
					echo'<div class="alert alert-danger">Gagal mengupdate !</div>';
				}
				}
		}
				
	
}

?>