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
	public function simpan($nirm, $nama, $kelas, $tempatLahir, $tanggalLahir, $jk, $agama, $alamat, $password ){
		$password=md5($password);
		$simpan=$this->mysqli->query("insert into mahasiswa (nirm, nama, kelas, tempatLahir, tanggalLahir, jk, agama, alamat, password) values ('$nirm', '$nama', '$kelas', '$tempatLahir', '$tanggalLahir', '$jk', '$agama', '$alamat', '$password')");
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
	
	public function edit($id, $nirm, $nama, $kelas, $tempatLahir, $tanggalLahir, $jk, $agama, $alamat, $password){
		$password=md5($password);
		$edit=$this->mysqli->query("update mahasiswa set nirm='$nirm', nama='$nama', kelas='$kelas', tempatLahir='$tempatLahir', tanggalLahir='$tanggalLahir', jk='$jk', agama='$agama', alamat='$alamat', password='$password' where nirm='$id'");
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
	
	public function lapPerBulan($bulan, $tahun){
		$tampil=$this->mysqli->query("select * from trx where month(tanggal)='$bulan' and year(tanggal)='$tahun'");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function lapPerTahun($tahun){
		$tampil=$this->mysqli->query("select * from trx where year(tanggal)='$tahun'");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function ambilpertahun(){
		$tampil=$this->mysqli->query("select * from trx group by year(tanggal)");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function ambilPerBulan(){
		$tampil=$this->mysqli->query("select * from trx group by month(tanggal)");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function cari($keyword){
		$tampil=$this->mysqli->query("select * from trx where invoice like '%$keyword%' or nirm like '%$keyword%' or nama like '%$keyword%' or namaPetugas like '%$keyword%'");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
}
//end mhs

//soal
class soal extends koneksi{
	public function simpanSoal($id, $noSoal, $isiSoal, $kunciJawaban){
		$isiSoal=$this->mysqli->real_escape_string($isiSoal);
		$simpan=$this->mysqli->query("insert into soal (idSoal, noSoal, detailSoal, jawaban) values ('$id', '$noSoal', '$isiSoal', '$kunciJawaban')");
		if($simpan){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function simpanWaktuSoal($idSoal, $waktu, $keterangan){
		$simpan=$this->mysqli->query("insert into waktu (idSoal, waktu, keterangan) values ('$idSoal', '$waktu', '$keterangan')");
		if($simpan){
			return true;
		}
		else{
			return false;
		}
	}
}
//end soal

//mk
class mk extends koneksi{
	public function simpan($namaMk, $keterangan){
		$simpan=$this->mysqli->query("insert into matakuliah (namaMk, keterangan) values ('$namaMk', '$keterangan')");
		if($simpan){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tampilSemua(){
		$tampil=$this->mysqli->query("select * from matakuliah");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function tampilPerId($id){
		$tampil=$this->mysqli->query("select * from matakuliah where idMk='$id'");
		$row=$tampil->fetch_array();
		return $row;
	}
	
	public function hapusPerId($id){
		$hapus=$this->mysqli->query("delete from matakuliah where idMk='$id'");
		if($hapus){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function edit($idMk, $namaMk, $keterangan){
		$edit=$this->mysqli->query("update matakuliah set namaMk='$namaMk' , keterangan='$keterangan' where idMk='$idMk'");
		if($edit){
			return true;
		}
		else{
			return false;
		}
	}
}
//end mk

//kelas
class kelas extends koneksi{
	public function simpan($kelas, $keterangan){
		$kelas=$this->mysqli->real_escape_string($kelas);
		$simpan=$this->mysqli->query("insert into kelas (nama, keterangan) values ('$kelas', '$keterangan')");
		if($simpan){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tampilSemua(){
		$tampil=$this->mysqli->query("select * from kelas");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function tampilPerId($id){
		$tampil=$this->mysqli->query("select * from kelas where id='$id'");
		$row=$tampil->fetch_array();
		return $row;
	}
	
	public function hapusPerId($id){
		$hapus=$this->mysqli->query("delete from kelas where id='$id'");
		if($hapus){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function edit($id, $kelas, $keterangan){
		$kelas=$this->mysqli->real_escape_string($kelas);
		$keterangan=$this->mysqli->real_escape_string($keterangan);
		$edit=$this->mysqli->query("update kelas set nama='$kelas' , keterangan='$keterangan' where id='$id'");
		if($edit){
			return true;
		}
		else{
			return false;
		}
	}
}
//end kelas

//dosen 
class dosen extends koneksi{
	public function simpan($id, $nama, $password, $jk,  $agama, $tempatLahir, $tanggalLahir, $alamat ){
		$password=md5($password);
		$simpan=$this->mysqli->query("insert into dosen (id, nama, password,  jk, agama, tempatLahir, tanggalLahir, alamat ) values ('$id', '$nama', '$password', '$jk', '$agama', '$tempatLahir', '$tanggalLahir', '$alamat' )");
		if($simpan){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tampil(){
		$tampil=$this->mysqli->query("select * from dosen");
		while($row=$tampil->fetch_array())
		$data[]=$row;
		return @$data;
	}
	
	public function tampilPerId($id){
		$tampil=$this->mysqli->query("select * from dosen where id='$id'");
		$data=$tampil->fetch_array();
		return $data;
	}
	
	public function edit($id, $nama, $password, $jk,  $agama, $tempatLahir, $tanggalLahir, $alamat ){
		$password=md5($password);
		$edit=$this->mysqli->query("update dosen set nama='$nama', password='$password', jk='$jk', agama='$agama',  tempatLahir='$tempatLahir', tanggalLahir='$tanggalLahir', alamat='$alamat' where id='$id'");
		if($edit){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function hapusPerId($id){
		$hapus=$this->mysqli->query("delete from dosen where id='$id'");
		if($hapus){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function cekData($nirm){
		$username=$this->mysqli->real_escape_string($nirm);
		$cek=$this->mysqli->query("select * from dosen where id='$nirm'");
		$hitun=$cek->num_rows;
		if($hitun==0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tampilPerNIRM($field, $nirm){
		$tampil=$this->mysqli->query("select * from dosen where id='$nirm'");
		$data=$tampil->fetch_array();
		if($field=='nama'){
			return $data['nama'];
		}
	}

}
//end dosen
?>