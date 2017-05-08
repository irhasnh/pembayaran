<?php

define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DB_NAME','pembayaran');

class koneksi{
	var $mysqli;
	
	function __construct(){
		$this->mysqli=new MySQLi(HOST,USER,PASSWORD,DB_NAME);
		if ($this->mysqli->connect_error){
			echo "Gagal terkoneksi ke database : (".$this->mysqli->connect_error.")";
		}

		
	}
}

class login extends koneksi{
	
	public function loginUser($username,$password){
		$username=$this->mysqli->real_escape_string($username);
		$password=$this->mysqli->real_escape_string($password);
		$password=md5($password);
		$cek=$this->mysqli->query("select * from user where username='$username' and password='$password'");
		$hitung=$cek->num_rows;
		$data=$cek->fetch_array();
		if($hitung>0){
			session_start();
			$_SESSION['username']=$data['username'];
			$_SESSION['nama']=$data['nama'];
			$_SESSION['password']=$data['password'];
			$_SESSION['level']=$data['level'];
			return true;
		}
	}
	
	public function logout(){
		session_start();
		session_destroy();
		session_unset();
		return true;
	}
	
}
//end login

class user extends koneksi{
	public function insertData($username, $nama, $password, $level){
		$username=$this->mysqli->real_escape_string($username);
		$nama=$this->mysqli->real_escape_string($nama);
		$password=$this->mysqli->real_escape_string(md5($password));
		$insert=$this->mysqli->query("insert into user (username, nama, password, level) values ('$username', '$nama', '$password', '$level')");
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tampilData(){
		
		$tampil=$this->mysqli->query("select * from user");
		$hitung=$tampil->num_rows;
		
		while ($row=$tampil->fetch_array())
            $data[] = $row;
        return $data;
		
	}
	
	public function tampilPerUser($field, $id){
		$tampil=$this->mysqli->query("select * from user where username='$id'");
		$data=$tampil->fetch_array();
		if($field=='nama'){
			return $data['nama'];
		}
		elseif($field=='password'){
			return $data['password'];
		}
	}
	
	public function cekData($username){
		$username=$this->mysqli->real_escape_string($username);
		$cek=$this->mysqli->query("select * from user where username='$username'");
		$hitun=$cek->num_rows;
		if($hitun==0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tampilPerUsername($username){
		$tampil=$this->mysqli->query("select * from user where username='$username'");
		$data=$tampil->fetch_array();
        return $data;
	}
	
	public function editData($id, $username, $nama, $password, $level){
		$username=$this->mysqli->real_escape_string($username);
		$nama=$this->mysqli->real_escape_string($nama);
		$password=$this->mysqli->real_escape_string(md5($password));
		$edit=$this->mysqli->query("update user set username='$username', nama='$nama', password='$password', level='$level' where username='$id'");
		if($edit){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function hapusData($id){
		$hapus=$this->mysqli->query("delete from user where username='$id'");
		if($hapus){
			return true;
		}
		else{
			return false;
		}
	}
}

//end user

//class pembayaran
class pembayaran extends koneksi{
	public function simpan($jenisPembayaran, $biaya){
		$simpan=$this->mysqli->query("insert into pembayaran (jenisPembayaran, biaya) values ('$jenisPembayaran', '$biaya')");
		if($simpan){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tampilField($field, $id){
		$tampil=$this->mysqli->query("select * from pembayaran where id='$id'");
		$data=$tampil->fetch_array();
		if($field=='jenisPembayaran'){
			return $data['jenisPembayaran'];
		}
		elseif($field=='biaya'){
			return $data['biaya'];
		}
	}
	
	public function tampil(){
		$tampil=$this->mysqli->query("select * from pembayaran");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function tampilPerId($id){
		$tampil=$this->mysqli->query("select * from pembayaran where id='$id'");
		$data=$tampil->fetch_array();
		return $data;
	}
	
	public function edit($id, $jenisPembayaran, $biaya){
		$jenisPembayaran=$this->mysqli->real_escape_string($jenisPembayaran);
		$biaya=$this->mysqli->real_escape_string($biaya);
		$edit=$this->mysqli->query("update pembayaran set jenisPembayaran='$jenisPembayaran', biaya='$biaya' where id='$id'");
		if($edit){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function hapusPerId($id){
		$hapus=$this->mysqli->query("delete from pembayaran where id='$id'");
		if($hapus){
			return true;
		}
		else{
			return false;
		}
	}
}
//end pembayaran

//class mahasiswa
class mahasiswa extends koneksi{
	public function simpan($nirm, $nama, $tempatLahir, $tanggalLahir, $jk, $agama, $alamat, $password ){
		$password=md5($password);
		$simpan=$this->mysqli->query("insert into mahasiswa (nirm, nama, tempatLahir, tanggalLahir, jk, agama, alamat, password) values ('$nirm', '$nama', '$tempatLahir', '$tanggalLahir', '$jk', '$agama', '$alamat', '$password')");
		if($simpan){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tampil(){
		$tampil=$this->mysqli->query("select * from mahasiswa");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function tampilPerId($id){
		$tampil=$this->mysqli->query("select * from mahasiswa where nirm='$id'");
		$data=$tampil->fetch_array();
		return $data;
	}
	
	public function edit($id, $nirm, $nama, $tempatLahir, $tanggalLahir, $jk, $agama, $alamat, $password){
		$password=md5($password);
		$edit=$this->mysqli->query("update mahasiswa set nirm='$nirm', nama='$nama', tempatLahir='$tempatLahir', tanggalLahir='$tanggalLahir', jk='$jk', agama='$agama', alamat='$alamat', password='$password' where nirm='$id'");
		if($edit){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function hapusPerId($id){
		$hapus=$this->mysqli->query("delete from mahasiswa where nirm='$id'");
		if($hapus){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function cekData($nirm){
		$username=$this->mysqli->real_escape_string($nirm);
		$cek=$this->mysqli->query("select * from mahasiswa where nirm='$nirm'");
		$hitun=$cek->num_rows;
		if($hitun==0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tampilPerNIRM($field, $nirm){
		$tampil=$this->mysqli->query("select * from mahasiswa where nirm='$nirm'");
		$data=$tampil->fetch_array();
		if($field=='nama'){
			return $data['nama'];
		}
	}
}

//end class mahasiswa

//trx
class trx extends koneksi{
	public function simpan($invoice, $idPembayaran, $jenisPembayaran, $nirm, $nama, $idPetugas, $namaPetugas, $biaya, $denda, $kategori, $tanggal, $waktu){
		$simpan=$this->mysqli->query("insert into trx (invoice, idPembayaran, jenisPembayaran, nirm, nama, idPetugas, namaPetugas, biaya, denda, kategori, tanggal, waktu) values ('$invoice', '$idPembayaran', '$jenisPembayaran', '$nirm', '$nama', '$idPetugas', '$namaPetugas', '$biaya', '$denda', '$kategori', '$tanggal', '$waktu')");
		if($simpan){
			return true;
		}
		else{
			return false;
		}
		
	}
	
	public function tampil(){
		$tampil=$this->mysqli->query("select * from trx");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function tampilPerId($field, $id){
		$tampil=$this->mysqli->query("select * from trx where $field='$id'");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function hapusPerId($id){
		$hapus=$this->mysqli->query("delete from trx where id='$id'");
		if($hapus){
			return true;
		}
		else{
			return false;
		}
	}
	
	
}
//end mhs
?>