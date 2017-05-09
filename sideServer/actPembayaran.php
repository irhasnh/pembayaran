<?php
include'class.php';

$act=@$_POST['act'];
$id=@$_POST['id'];
$jenisPembayaran=@$_POST['jenisPembayaran'];
$biaya=@$_POST['biaya'];
$pembayaran=new pembayaran;

if($act=='simpan'){
	if($jenisPembayaran=='' || empty($jenisPembayaran)){
		echo'<div class="alert alert-danger">Jenis Pembayaran Harus Diisi !</div>';
	}
	elseif($biaya=='' || empty($biaya)){
		echo'<div class="alert alert-danger">Biaya Harus Diisi !</div>';
	}
	else{
		$simpan=$pembayaran->simpan($jenisPembayaran, $biaya);
		if(!$simpan){
			echo'<div class="alert alert-danger">Gagal menyimpan !</div>';
		}
		else{
			echo'<div class="alert alert-success">Berhasil menyimpan!</div>';
			echo'<meta http-equiv="refresh" content="1">';
		}
	}
}

if($act=='ambil'){
	$tampil=$pembayaran->tampilPerId($id);
	echo json_encode($tampil);
}

if($act=='edit'){
	if($jenisPembayaran=='' || empty($jenisPembayaran)){
		echo'<div class="alert alert-danger">Jenis Pembayaran Harus Diisi !</div>';
	}
	elseif($biaya=='' || empty($biaya)){
		echo'<div class="alert alert-danger">Biaya Harus Diisi !</div>';
	}
	else{
		$edit=$pembayaran->edit($id, $jenisPembayaran, $biaya);
		if(!$edit){
			echo'<div class="alert alert-danger">Gagal mengedit !</div>';
		}
		else{
			echo'<div class="alert alert-success">Berhasil mengedit!</div>';
			echo'<meta http-equiv="refresh" content="1">';
		}
	}
}

if($act=='hapus'){
	$hapus=$pembayaran->hapusPerId($id);
	if($hapus){
		echo'<div class="alert alert-success">Berhasil Menghapus!</div>';
		echo'<meta http-equiv="refresh" content="1">';
	}
	else{
		echo'<div class="alert alert-danger">Gagal Menghapus !</div>';
	}
}

if($act=='ambilbiaya'){
	$data=$pembayaran->tampilField('biaya', $id);
	echo $data;
}
?>