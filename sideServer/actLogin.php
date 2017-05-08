<?php
include'class.php';
$aksi=@$_GET['aksi'];
$act=@$_POST['act'];
$username=@$_POST['username'];
$password=@$_POST['password'];
$user=new login();

if($act=='login'){
	if($username=='' || empty($username)){
		echo'<div class="alert alert-danger">Username Harus Diisi !</div>';
	}
	elseif($password=='' || empty($password)){
		echo'<div class="alert alert-danger">Password Harus Diisi !</div>';
	}
	else{
		$login=$user->loginUser($username,$password);
		if(!$login){
			echo'<div class="alert alert-danger">Gagal login !</div>';
		}
		else{
			echo'<script>window.location.href="admin.php";</script>';
			echo'<div class="alert alert-success">Berhasil login !</div>';
		}
	}
}

if($aksi=='logout'){
	$logout=$user->logout();
	if($logout){
	echo'<script>window.location.href="http://localhost/pembayaran/index.php";</script>';
	}
}

?>