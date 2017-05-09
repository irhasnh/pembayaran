<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	header('location:index.php');
}

$page=@addslashes($_GET['page']);
include'sideServer/class.php';
$user=new user();
$pembayaran=new pembayaran();
$mhs=new mahasiswa();
$trx=new trx();
$mk=new mk();
$kelas=new kelas();
$dosen= new dosen();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Stekomindo</title>
<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css"/>
<link rel="stylesheet" href="style.css"/>
<link rel="shortcut icon" href="images/logo-01.png"/>
<link rel="stylesheet" href="dataTables/media/css/dataTables.bootstrap.min.css"/>

<link rel="stylesheet" href="dataTables/media/css/jquery.dataTables.min.css"/>
 <!-- Script js -->
<script src="jquery/jquery.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="dataTables/media/js/jquery.dataTables.min.js"></script>
<!-- <script src="act.js"></script> -->
<script type="text/javascript">
  <?php 
    include "act.php";
  ?>
</script>
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<!-- End Script -->
<style type="text/css">
  .btn {
    border-radius: 0px;
  }
</style>
</head>
<body>
<!-- menu -->
<nav class="navbar navbar-inverse" style="border-radius:0px; background:#1BBC9B; border-left:none; border-right:none; border-top:none; border-bottom:solid 12px #019875;" >
  <div class="container" >
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#fff;">Stekomindo</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="<?=$page == "" || $page == null || $page == "home" ? 'active' : ''?>"><a href="admin.php?page=home" style="color:#fff;">Home</a></li>
        <li class="dropdown <?=$page == 'user' || $page == 'pembayaran' || $page == 'mahasiswa' || $page == 'trx' ? 'active' : ''?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#fff;">Manejemen Data
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li <?=$page == 'user' ? 'class="active"' : ''?>><a href="admin.php?page=user">User</a></li>
            <!-- <li><a href="admin.php?page=matakuliah">Matakuliah</a></li>
            <li><a href="admin.php?page=kelas">Kelas</a></li>
            <li><a href="admin.php?page=dosen">Dosen</a></li> -->
            <li <?=$page == 'pembayaran' ? 'class="active"' : ''?>><a href="admin.php?page=pembayaran">Pembayaran</a></li>
            <li <?=$page == 'mahasiswa' ? 'class="active"' : ''?>><a href="admin.php?page=mahasiswa">Mahasiswa</a></li>
            <li <?=$page == 'trx' ? 'class="active"' : ''?>><a href="admin.php?page=trx">Transaksi</a></li> 
            <!-- <li><a href="admin.php?page=ujian">Ujian</a></li>  -->
          </ul>
         </li>
        <li  class="dropdown <?=$page == "transaksi" ? 'active' : ''?>">
        <a href="#" style="color:#fff;" class="dropdown-toggle" data-toggle="dropdown" >Transaksi <span class="caret"></span></a>
        	<ul class="dropdown-menu">
            						<?php
									$rand='0123456789';
									$rand=str_shuffle($rand);
									$rand=str_shuffle($rand);
									$rand=substr($rand,0,10);
									?>
            	<li <?=$page == 'transaksi' ? 'class="active"' : ''?>><a href="admin.php?page=transaksi&invoice=<?php echo $rand;?>&nirm=&idPetugas=<?php echo $_SESSION['username'];?>" target="_blank">Transaksi mahasiswa baru</a></li>
          	</ul>
        </li> 
        <li class="dropdown <?=$page == "lapPerHari" || $page == "lapPerTahun" || $page == "lapPerBulan" ? 'active' : ''?>"><a href="#" style="color:#fff;" class="dropdown-toggle" data-toggle="dropdown" >Laporan <span class="caret"></span></a>
        	<ul class="dropdown-menu">
            <li <?=$page == 'lapPerHari' ? 'class="active"' : ''?>><a href="admin.php?page=lapPerHari">Laporan harian</a></li>
            <li <?=$page == 'lapPerBulan' ? 'class="active"' : ''?>><a href="admin.php?page=lapPerBulan">Laporan bulanan</a></li>
            <li <?=$page == 'lapPerTahun' ? 'class="active"' : ''?>><a href="admin.php?page=lapPerTahun">Laporan Tahunan</a></li> 
          </ul>
        </li> 
        
       <!--  <li class="dropdown"><a href="#" style="color:#fff;" class="dropdown-toggle" data-toggle="dropdown" >Ujian Online <span class="caret"></span></a>
        	<ul class="dropdown-menu">
            <li><a href="admin.php?page=buatSoal">Buat Soal</a></li>
            <li><a href="admin.php?page=buatPeserta">Peserta</a></li>
            <li><a href="admin.php?page=nilai">Nilai</a></li> 
          </ul>
        </li>  -->
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" style="color:#fff;"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nama'];?></a></li>
        <li><a href="sideServer/actLogin.php?aksi=logout" style="color:#fff;"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- end menu -->

<!-- container -->
<div class="container">
	<div class="row">
    	<!-- petunjuk -->
  		<div class="col-sm-3">
        	<!-- <h3>Petunjuk !</h3> -->
            <ul class="list-group">
          <li class="list-group-item list-group-item-success">Petunjuk !!</li>
  				<li class="list-group-item">1. Rahasiakan Password Anda !</li>
  				<li class="list-group-item">2. Telitilah Dalam Menginput Data !</li>
  				<li class="list-group-item">3. Periksa Kembali, Sebelum Menyimpan Data !</li>
  				<li class="list-group-item">4. Jangan Lupa Untuk Menekan Tombol logout !</li>
          <li class="list-group-item ">5. Hubungi Developer, Jika Ada Masalah !</li>
			     </ul>
        </div>
        <!-- end petunjuk -->
        	
        <!-- isi -->
        <div class="col-md-9" style="border:solid thin #f1f1f1; min-height: 400px">
        	<?php 
				if($page=='home' || empty($page) || $page=='' || !isset($page)){
					echo '<h3>Hello, anda memasuki halaman admin</h3><hr/>';
				}
			?>
            
            <?php
			if($page=='user'){
      ?>
        <h3>Data User</h3><hr/>
				<button id="tambah" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambahUser"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
				
                <!-- Modal -->
					<div id="modalTambahUser" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title"><span id="ide"></span> Data User</h4>
      								</div>
      								<div class="modal-body">
        							<p id="notifTambahUser"></p>
                                    	<form>
                							<div class="form-group">
                                            	<input id="idTambahUser" type="text" class="form-control" name="username" placeholder="Username" style="display:none;"/>
                    							<label for="">Username</label>
                    							<input id="usernameTambah" type="text" class="form-control" name="username" placeholder="Username"/>
                							</div>
                							<div class="form-group">
                    						<label for="">Nama</label>
                    						<input id="namaTambah" type="text" class="form-control" name="password" placeholder="Nama" />
                							</div>
                                            <div class="form-group">
                    						<label for="">Password</label>
                    						<input id="passwordTambah" type="password" class="form-control" name="password" placeholder="Password" />
                							</div>
                                            <div class="form-group">
                    						<label for="">Level</label>
                    						<select id="level" class="form-control">
                                            	<option selected>-- pilih --</option>
                                                <option value="admin">admin</option>
                                                <option value="master">master</option>
                                            </select>
                							</div>
                							<div >
                    						<button name="tambah" type="button" class="btn btn-warning" id="tomTambahUser" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                							</div>
            							</form>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
            <!-- Modal hapus -->
					<div id="modalHapusUser" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title"><span id="ide"></span> Data User</h4>
      								</div>
      								<div class="modal-body">
        							<p id="notifTambahUser"></p>
                                    	Apakah Anda Yakin Akan Menghapus Data Ini ?
                                        <div >
                    						<button name="tambah" type="button" class="btn btn-danger" id="tomYaHapusUser">Ya</button>
                						</div>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
			
                
                <div class="table-responsive" style="margin-top:10px;">
  					<table class="table table-bordered table-hover table-striped" id="tabelUser">
                    	<thead>
      						<tr>
        						<th>No.</th>
        						<th>Username</th>
        						<th>Nama</th>
                                <th>Level</th>
                                <th>Aksi</th>
      						</tr>
    					</thead>
   						<tbody>
                        <?php
						$tampil=$user->tampilData();
						$hitung=count($tampil);
						if($hitung!=0){
							$no=1;
							foreach ($tampil as $data){
								?>
                                <tr>
                                	<td align="center"><?php echo $no++;?>.</td>
                                    <td><?php echo $data['username'];?></td>
                                    <td><?php echo $data['nama'];?></td>
                                    <td><?php echo $data['level'];?></td>
                                    <td align="center">
                                    <button name="<?php echo $data['username'];?>" type="button" class="btn btn-success btn-sm" id="editUser" data-toggle="modal" data-target="#modalTambahUser"><span class="glyphicon glyphicon-pencil"></span> </button>
                                    <button name="<?php echo $data['username'];?>" type="button" class="btn btn-danger btn-sm" id="hapusUser" data-toggle="modal" data-target="#modalHapusUser"><span class="glyphicon glyphicon-trash"></span> </button>
                                    
                                    </td>
                                </tr>
                                <?php
							}
						}
						
						?>
    					</tbody>
                        <tfoot>
       							<th>No.</th>
        						<th>Username</th>
        						<th>Nama</th>
                                <th>Level</th>
                                <th>Aksi</th>
      					</tfoot>
  					</table>
				</div>
                <?php
			}
			?>
            <!--end user -->
            
            <!-- pembayaran -->
            <?php
			if($page=='pembayaran'){
				?>
              <h3>Data Pembayaran</h3><hr/>
                <button id="tambahPembayaran" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambahPembayaran"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
                <div class="table-responsive" style="margin-top:10px;">
  					<table class="table table-bordered table-hover table-striped" id="tabelUser">
                    	<thead>
      						<tr>
        						<th>No.</th>
        						<th>Jenis Pembayaran</th>
        						<th>Biaya</th>
                                <th>Aksi</th>
      						</tr>
    					</thead>
   						<tbody>
                        <?php
						$tampil=$pembayaran->tampil();
						$hitung=count($tampil);
						if($hitung>0){
							$no=1;
							foreach ($tampil as $data){
								?>
                                <tr>
                                	<td align="center"><?php echo $no++;?>.</td>
                                    <td><?php echo $data['jenisPembayaran'];?></td>
                                    <td><?php echo 'Rp. '.number_format($data['biaya']);?></td>
                                    <td align="center">
                                    <button name="<?php echo $data['id'];?>" type="button" class="btn btn-success btn-sm" id="editBiaya" data-toggle="modal" data-target="#modalTambahPembayaran"><span class="glyphicon glyphicon-pencil"></span> </button>
                                    <button name="<?php echo $data['id'];?>" type="button" class="btn btn-danger btn-sm" id="hapusBiaya" data-toggle="modal" data-target="#modalHapusPembayaran"><span class="glyphicon glyphicon-trash"></span> </button>
                                    
                                    </td>
                                </tr>
                                <?php
							}
						}
						
						?>
    					</tbody>
                        <tfoot>
       							<th>No.</th>
        						<th>Jenis Pembayaran</th>
        						<th>Biaya</th>
                                <th>Aksi</th>
      					</tfoot>
  					</table>
				</div>
                <!-- Modal -->
					<div id="modalTambahPembayaran" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title"><span id="idePembayaran"></span> Data Pembayaran</h4>
      								</div>
      								<div class="modal-body">
        							<p id="notifTambahPembayaran"></p>
                                    	<form>
                							<div class="form-group">
                                            	<input id="idTambahPembayaran" type="text" class="form-control" name="username" placeholder="Username" style="display:none;"/>
                    							<label for="">Jenis Pembayaran</label>
                    							<input id="jenisPembayaran" type="text" class="form-control" name="username" placeholder="Jenis Pembayaran"/>
                							</div>
                							<div class="form-group">
                    						<label for="">Biaya</label>
                    						<input id="biaya" type="number" class="form-control" name="password" placeholder="Biaya" />
                							</div>
                                            
                							<div >
                    						<button name="tambah" type="button" class="btn btn-warning" id="tomTambahPembayaran" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                							</div>
            							</form>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
            
            <!-- Modal hapus -->
					<div id="modalHapusPembayaran" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title">Hapus Data Pembayaran</h4>
      								</div>
      								<div class="modal-body">
        							<p id="notifTambahUser"></p>
                                    	Apakah Anda Yakin Akan Menghapus Data Ini ?
                                        <div >
                    						<button name="tambah" type="button" class="btn btn-danger" id="tomYaHapusPembayaran">Ya</button>
                						</div>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
                <?php
			}
            ?>
            <!-- end pembayaran -->
            
            <!--mahasiswa -->
            <?php
			if($page=='mahasiswa'){
				?>
                <!-- <button id="tambahMahasiswa" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambahMahasiswa"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button> -->
                <h3>Data Mahasiswa</h3><hr/>
                <div class="table-responsive" style="margin-top:10px;">
  					<table class="table table-bordered table-hover table-striped" id="tabelUser">
                    	<thead>
      						<tr>
        						<th>No.</th>
        						<th>NIRM</th>
        						<th>Nama</th>
                                <th>Aksi</th>
      						</tr>
    					</thead>
   						<tbody>
                        <?php
						$tampil=$mhs->tampil();
						$hitung=count($tampil);
						if($hitung>0){
							$no=1;
							foreach ($tampil as $data){
								?>
                                <tr>
                                	<td align="center"><?php echo $no++;?>.</td>
                                    <td><?php echo $data['nirm'];?></td>
                                    <td><?php echo $data['nama'];?></td>
                                    <td align="center">
                                    <!-- <button name="<?php echo $data['nirm'];?>" type="button" class="btn btn-success btn-sm" id="editMhs" data-toggle="modal" data-target="#modalTambahMahasiswa"><span class="glyphicon glyphicon-pencil"></span> </button>
                                    <button name="<?php echo $data['nirm'];?>" type="button" class="btn btn-danger btn-sm" id="hapusMhs" data-toggle="modal" data-target="#modalHapusMahasiswa"><span class="glyphicon glyphicon-trash"></span> </button> -->
                                    <button name="<?php echo $data['nirm'];?>" type="button" class="btn btn-primary btn-sm" id="detailMhs" data-toggle="modal" data-target="#modaldetailMahasiswa"><span class="glyphicon glyphicon-eye-open"></span> </button>
                                    <?php
									$rand='0123456789';
									$rand=str_shuffle($rand);
									$rand=str_shuffle($rand);
									$rand=substr($rand,0,10);
									?>
                                    <a href="admin.php?page=transaksi&invoice=<?php echo $rand;?>&nirm=<?php echo $data['nirm'];?>&idPetugas=<?php echo $_SESSION['username'];?>" name="<?php echo $data['nirm'];?>"  class="btn btn-warning btn-sm" id="trxMhs" target="_blank"><span class="glyphicon glyphicon-log-in"></span> </a>
                                    </td>
                                </tr>
                                <?php
							}
						}
						
						?>
    					</tbody>
                        <tfoot>
       							<th>No.</th>
        						<th>NIRM</th>
        						<th>Nama</th>
                                <th>Aksi</th>
      					</tfoot>
  					</table>
				</div>
                <!-- Modal -->
					<div id="modalTambahMahasiswa" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title"><span id="ideMahasiswa"></span> Data Mahasiswa</h4>
      								</div>
      								<div class="modal-body">
        							
                                    	<form>
                							<div class="form-group">
                                            	<input id="idTambahMhs" type="text" class="form-control" name="username" placeholder="Username" style="display:none;"/>
                    							<label for="">NIRM</label>
                    							<input id="NIRM" type="number" class="form-control" name="username" placeholder="NIRM"/>
                							</div>
                							<div class="form-group">
                    						<label for="">Nama</label>
                    						<input id="namaMhs" type="text" class="form-control" name="password" placeholder="Nama" />
                							</div>
                                            <div class="form-group">
                                            <label>Kelas</label>
                                            <select id="kelasMhs" class="form-control">
                                            <option selected>-- pilih --</option>
                                            <?php
											$tampil=$kelas->tampilSemua();
											$hitung=count($tampil);
											if($hitung>0){
												foreach($tampil as $data){
													?>
                                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                                                    <?php
												}
											}
											?>
                                            </select>
                                            </div>
                                            <div class="form-group">
                    						<label for="">Tempat Lahir</label>
                    						<input id="tempatLahir" type="text" class="form-control" name="password" placeholder="Tempat Lahir" />
                							</div>
                                            <div class="form-group">
                    						<label for="">Tanggal Lahir</label>
                    						<input id="tanggalLahir" type="date" class="form-control" name="password" placeholder="Password" />
                							</div>
                                            <div class="form-group">
                    						<label for="">Jenis Kelamin</label>
                    						<select id="jk" class="form-control">
                                            	<option selected>-- pilih --</option>
                                                <option value="pria">pria</option>
                                                <option value="wanita">wanita</option>
                                            </select>
                							</div>
                                            <div class="form-group">
                    						<label for="">Agama</label>
                    						<select id="agama" class="form-control">
                                            	<option selected>-- pilih --</option>
                                                <option value="islam">islam</option>
                                                <option value="kristen">kristen</option>
                                                <option value="katolik">katolik</option>
                                                <option value="hindu">hindu</option>
                                                <option value="budah">budha</option>
                                                <option value="kongucu">kongucu</option>
                                            </select>
                							</div>
                                            <div class="form-group">
                    						<label for="">Alamat</label>
                    						<textarea id="alamat" type="date" class="form-control" name="password" placeholder="Alamat" ></textarea>
                							</div>
                                            <div class="form-group">
                    						<label for="">Password</label>
                    						<input id="password" type="password" class="form-control" name="password" placeholder="Password" />
                							</div>
                							<div >
                    						<button name="tambah" type="button" class="btn btn-warning" id="tomTambahMhs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
                                            
                							</div>
                                            <p id="notifTambahMhs"></p>
            							</form>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
            
            <!-- Modal hapus -->
					<div id="modalHapusMahasiswa" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title">Hapus Data Mahasiswa</h4>
      								</div>
      								<div class="modal-body">
        							<p id="notifTambahUser"></p>
                                    	Apakah Anda Yakin Akan Menghapus Data Ini ?
                                        <div >
                    						<button name="tambah" type="button" class="btn btn-danger" id="tomYaHapusMhs">Ya</button>
                						</div>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
            
             <!-- Modal hapus -->
					<div id="modaldetailMahasiswa" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title">Data Transaksi Mahasiswa</h4>
      								</div>
      								<div class="modal-body">
        							<p id="listDetailMhs"></p>
                                    	
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
                <?php
			}
			
			?>
            <!--end mahasiswa -->
        	
            <!-- trx -->
            <?php 
			if($page=='transaksi'){
				?>
        <h3>Transaksi</h3><hr/>
                <form>
                	
               			<input id="invoice" type="hidden" class="form-control" name="username" placeholder="invoice" value="<?php echo $_GET['invoice'];?>" readonly/>
                    <div class="form-group">
               			<label for="">NIRM</label><br/>
               			<input id="nirmTrx" type="text" class="form-control" name="username" placeholder="NIRM" value="<?php echo @$_GET['nirm'];?>" readonly/>
                	</div>
                    <div class="form-group">
               			<label for="">Nama</label><br/>
               			<input id="namaTrx" type="text" class="form-control" name="username" placeholder="Nama" value="<?php echo $mhs->tampilPerNIRM('nama', @$_GET['nirm']);?>" readonly/>
                	</div>
                    
               			<input id="idPetugasTrx" type="hidden" class="form-control" name="username" placeholder="Nama" value="<?php echo $_SESSION['username'];?>" readonly/>
                    <div class="form-group">
               			<label for="">Kategori</label><br/>
               			<select class="form-control" id="kategoriTrx">
                        	<option selected>-- pilih --</option>
                            <option value="pelunasan">pelunasan</option>
                            <option value="cicilan">cicilan</option>
                        </select>
                	</div>
                    <div class="form-group">
               			<label for="">Pembayaran</label><br/>
               			<select class="form-control" id="jenisPembayaranTrx">
                        	<option selected>-- pilih --</option>
                            <?php
							$tampil=$pembayaran->tampil();
							$hitung=count($tampil);
							if($hitung<>0){
								foreach($tampil as $data){
									?>
                                    <option value="<?php echo $data['id'];?>"><?php echo $data['jenisPembayaran'];?></option>
                                    <?php
								}
							}
							?>
                            
                            
                        </select>
                	</div>
                    <div class="form-group">
               			<label for="">Biaya</label><br/>
               			<input id="biayaTrx" type="number" class="form-control" name="username" placeholder="Rp.0" readonly/>
                	</div>
                    <div class="form-group">
               			<label for="">Denda</label><br/>
               			<input id="dendaTrx" type="number" class="form-control" name="username" placeholder="Rp.0" />
                	</div>
                 </form>
                 <br/>
                 <form class="form-inline" >
                 	<div class="form-group">
                 	<button name="tambah" type="button" class="btn btn-success" id="tomTambahTrx" ><span class="glyphicon glyphicon-plus"></span> Tambah</button>
                    </div>
                    <div class="form-group">
                 	<button name="tambah" type="button" class="btn btn-danger" id="tomCetakTrx" ><span class="glyphicon glyphicon-print"></span> Cetak</button>
                    </div>
                 </form>
                 <div id="notifTambahTrx"></div>
                 <div class="table-responsive" style="margin-top:10px;">
  					<table class="table table-bordered table-hover table-striped" id="tabelDetailTrx">
                    	<thead>
      						<tr>
        						<th>No.</th>
        						<th>Jenis Pembayaran</th>
        						<th>Biaya</th>
                                <th>Denda</th>
                                <th>Jumlah</th>
      						</tr>
    					</thead>
   						<tbody>
                        <?php
						$tampil=$trx->tampilPerId('invoice', $_GET['invoice']);
						$hitung=count($tampil);
						if($hitung>0){
							$no=1;
							foreach($tampil as $data){
								$jumlah=$data['biaya']+$data['denda'];
								@$total+=$jumlah;
								?>
                                <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['jenisPembayaran'];?></td>
                                <td><?php echo 'Rp. '.number_format($data['biaya']);?></td>
                                <td><?php echo 'Rp. '.number_format($data['denda']);?></td>
                                <td><?php echo 'Rp. '.number_format($jumlah);?>
                                <button name="<?php echo $data['id'];?>" type="button" class="btn btn-danger btn-sm text-right" id="tomHapusTrx" style="float:right;" >&times;</button>
                                </td>
                                </tr>
                                <?php
							}
						}
						?>
                        <tr>
                        <td colspan="4" align="right">Total Bayar</td>
                        <td><input id="totalBayar" type="number" class="form-control" name="username" placeholder="Rp.0" value="<?php echo @$total;?>" style="display:none;" /><?php echo 'Rp. '.number_format(@$total);?></td>
                        </tr>
                        <tr>
                        <td colspan="4" align="right">Uang Yang Dibayar</td>
                        <td><input id="uangYangDibayar" type="number" class="form-control" name="username" placeholder="Rp.0" /></td>
                        </tr>
                        <tr>
                        <td colspan="4" align="right">Kembali</td>
                        <td><span id="kembali"></span></td>
                        </tr>
    					</tbody>
                        
  					</table>
				</div>
                <?php
			}
			?>
            <!--end trx -->
            
            <!-- lap Per Hari -->
            <?php
			if($page=='lapPerHari'){
				?>
                <h3>Laporan Per Hari</h3><hr/>
                <form class="form-inline">
                	<div class="form-group">
               			<label for="">Tanggal</label><br/>
               			<input id="tanggal" type="date" class="form-control" name="username" placeholder="invoice" />
                	</div>
                    <div class="form-group">
                    <label for="">Aksi</label><br/>
                 	<button name="tambah" type="button" class="btn btn-danger" id="tomCetakLapPerHari" ><span class="glyphicon glyphicon-print"></span> Cetak</button>
                 </form>
                <?php
			}			
			?>
            <!-- end Lap Per Hari -->
            
            <!-- lap per Bulan -->
            <?php
			if($page=='lapPerBulan'){
				?>
                <h3>Laporan Per Bulan</h3><hr/>
                <form class="form-inline">
                	<div class="form-group">
               			<label for="">Bulan</label><br/>
               			<select class="form-control" id="bulan">
                        <option selected>-- pilih --</option>
                        <?php 
						$tampil=$trx->ambilPerBulan();
						$hitung=count($tampil);
						if($hitung>0){
							foreach($tampil as $data){
								$tanggal=$data['tanggal'];
								$pecah=explode('-',$tanggal);
								$bulan=$pecah[1];
								$tahun=$pecah[0];
								switch($bulan)
								{
								case"01";
								$bulan="Januari";
								break;
								case"02";
								$bulan="Februari";
								break;
								case"03";
								$bulan="Maret";
								break;
								case"04";
								$bulan="April";
								break;
								case"05";
								$bulan="Mei";
								break;
								case"06";
								$bulan="Juni";
								break;
								case"07";
								$bulan="Juli";
								break;
								case"08";
								$bulan="Agustus";
								break;
								case"09";
								$bulan="September";
								break;
								case"10";
								$bulan="Oktober";
								break;
								case"11";
								$bulan="November";
								break;
								case"12";
								$bulan="Desember";
								break;
								}
								?>
                                <option value="<?php echo $pecah[1];?>"> <?php echo $bulan;?></option>
                                <?php
							}
						}
						?>
                        </select>
                	</div>
                    <div class="form-group">
               			<label for="">Tahun</label><br/>
               			<select class="form-control" id="tahun">
                        <option selected>-- pilih --</option>
                        <?php
						$tampil=$trx->ambilpertahun();
						$hitung=count($tampil);
						if($hitung>0){
							foreach($tampil as $data){
								$tanggal=$data['tanggal'];
								$pecah=explode('-',$tanggal);
								$bulan=$pecah[1];
								$tahun=$pecah[0];
								?>
                                <option value="<?php echo $tahun;?>"> <?php echo $tahun;?></option>
                                <?php
							}
						}
						?>
                        </select>
                	</div>
                    <div class="form-group">
                    <label for="">Aksi</label><br/>
                 	<button name="tambah" type="button" class="btn btn-danger" id="tomCetakLapPerBulan" ><span class="glyphicon glyphicon-print"></span> Cetak</button>
                 </form>
                <?php
			}
			?>
            <!-- end lap per Bulan -->
            
            <!-- buat soal -->
            <?php
			if($page=='buatSoal'){
				$rand='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
				$rand=str_shuffle($rand);
				$rand=str_shuffle($rand);
				$rand=substr($rand,0,10);
				?>
                <form class="form-inline" id="formSoal">
                	<div class="form-group">
               			<label for="">Id Soal</label><br/>
               			<input id="idSoal" type="text" class="form-control" name="idSoal" placeholder="invoice" value="<?php echo $rand;?>" readonly/>
                	</div>
                    <div class="form-group">
               			<label for="">Alokasi Waktu</label><br/>
               			<input id="alokasiWaktu" type="text" class="form-control" name="alokasiWaktu" placeholder="ex. 60 minute" />
                	</div>
                <div class="form-group">
               			<label for="">Keterangan</label><br/>
               			<input id="ketsoal" type="text" class="form-control" name="ketSoal" placeholder="Keterangan" />
                	</div>
                    <div class="form-group">
               			<label for="">Jumlah Soal</label><br/>
               			<input id="jumsoal" type="number" class="form-control" name="jumSoal" placeholder="Jumlah Soal" />
                	</div>
                <div class="form-group">
                	<label for="">Tambah</label><br/>
                	<button name="tambahSoal" type="button" class="btn btn-danger" id="tambahSoal"  data-spy="affix" data-offset-top="10"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
                </div>
                
                
                
                <?php
			}
			?>
            <!-- end buat soal -->
            
            <!-- Mata Kuliah -->
            <?php
			if($page=='matakuliah'){
				?>
                <button id="tambahMk" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambahMK"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
                
                <!-- Modal hapus -->
					<div id="modalTambahMK" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
                                	
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title"><span id="ideMk"></span> Data Mata Kuliah</h4>
      								</div>
      								<div class="modal-body">
        							
                                    <form>
                                    <div id="notifTambahMk"></div>
                                    <div class="form-group">
                                    	<label>Matakuliah</label>
                                        <input id="idMk" type="text" class="form-control" style="display:none;" placeholder="Matakuliah"/>
                                    	<input id="matakuliah" type="text" class="form-control" placeholder="Matakuliah"/>
                                    </div>
                                    <div class="form-group">
                                    	<label>Keterangan</label>
                                        <input id="ketMk" type="text" class="form-control" placeholder="Keterangan"/>
                                    </div>
                                    <input id="tomTambahMk" name="tambah" type="button" class="btn btn-primary btn-md" value="Simpan"/>
                                    </form>
      								</div>
      								<div class="modal-footer">
       									<button type="button"   class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
            <div class="table-responsive" style="margin-top:10px;">
            <table class="table table-bordered table-hover table-striped display" id="tabelUser" >
                    	<thead>
      						<tr>
        						<th>No.</th>
        						<th>Matakuliah</th>
        						<th>Keterangan</th>
                                <th>Aksi</th>
      						</tr>
    					</thead>
   						<tbody>
                        <?php
						$tampil=$mk->tampilSemua();
						$hitung=count($tampil);
						if($hitung>0){
							$no=1;
							foreach($tampil as $data){
								?>
                                <tr>
                                	<td><?php echo $no++;?>.</td>
                                    <td><?php echo $data['namaMk'];?></td>
                                    <td><?php echo $data['keterangan'];?></td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapusMk" id="hapusMk" name="<?php echo $data['idMk'];?>"><span class="glyphicon glyphicon-trash"></span></button>
                                    <button id="editMk" type="button" class="btn btn-sm btn-success" name="<?php echo $data['idMk'];?>" data-toggle="modal" data-target="#modalTambahMK"><span class="glyphicon glyphicon-pencil"></span></button>
                                    </td>
                                </tr>
                                <?php
							}
						}
						?>
                        </tbody>
            </table>
            </div>
            <!-- Modal hapus -->
					<div id="modalHapusMk" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title">Hapus Data Matakuliah</h4>
      								</div>
      								<div class="modal-body">
        							<p>Yakin akan menghapus data ini ?</p>
                                    <button id="tomYaHapusMk" class="btn btn-danger">Ya</button>
                                    <div id="notifHapusMk"></div>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
                <?php
			}
			?>
            <!--end Mata Kuliah -->
            <?php
			if($page=='isiSoal'){
				$id=@$_GET['id'];
				$waktu=@$_GET['waktu'];
				$keterangan=@$_GET['keterangan'];
				$jumlahSoal=@$_GET['jumlahSoal'];
				?>
                <form class="form-inline" id="formIsiSoal">
                	<div class="form-group">
               			<label for="">Id Soal</label><br/>
               			<input id="idIsiSoal" type="text" class="form-control" name="idIsiSoal" placeholder="invoice" value="<?php echo $id;?>" readonly/>
                	</div>
                    <div class="form-group">
               			<label for="">Alokasi Waktu</label><br/>
               			<input id="alokasiWaktuIsi" type="text" class="form-control" name="alokasiWaktuIsi" placeholder="ex. 60 minute" readonly value="<?php echo $waktu;?>" />
                	</div>
                <div class="form-group">
               			<label for="">Keterangan</label><br/>
               			<input id="ketsoalIsi" type="text" class="form-control" name="ketSoalIsi" placeholder="Keterangan" readonly value="<?php echo $keterangan;?>"/>
                	</div>
                    <div class="form-group">
               			<label for="">Jumlah Soal</label><br/>
               			<input id="jumsoalIsi" type="number" class="form-control" name="jumSoalIsi" placeholder="Jumlah Soal" readonly value="<?php echo $jumlahSoal;?>" />
                	</div>
                <div class="form-group">
                	<label for="">Simpan</label><br/>
                	<button name="SimpanSoal" type="button" class="btn btn-danger" id="simpanSoal"  ><span class="glyphicon glyphicon-plus"></span> Tambah</button>
                </div>
                <div id="notifSoal"></div>
                <div class="table-responsive" style="margin-top:10px;">
                <table class="table table-bordered">
                	<thead>
                    	<tr>
                        	<th>No Soal</th>
                            <th>Isi Soal</th>
                            <th>Kunci Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					for($i=1; $i<=$jumlahSoal; $i++){
						?>
                        <tr>
                        	<td><?php echo $i; ?></td>
                            <td>
                     <textarea name="soal[]" cols="70" rows="15" class="ckeditor" placeholder="Tulis Soal Disini..."></textarea>
                     </td>
                            <td>
                            <select name="jawaban[]" id="select" class="form-control" >
                                  <option selected="selected">--pilih--</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                             </select>
                            </td>
                        </tr>
                        
                        <?php
					}
					?>
                    </tbody>
                </table>
                </div>
                </form>
                <?php
				
			}
			?>
            <!-- lap per tahun -->
            <?php
			if($page=='lapPerTahun'){
				?>
                <h3>Laporan Per Tahun</h3><hr/>
                <form class="form-inline">
                <div class="form-group">
               			<label for="">Tahun</label><br/>
               			<select class="form-control" id="tahunt">
                        <option selected>-- pilih --</option>
                        <?php
						$tampil=$trx->ambilpertahun();
						$hitung=count($tampil);
						if($hitung>0){
							foreach($tampil as $data){
								$tanggal=$data['tanggal'];
								$pecah=explode('-',$tanggal);
								$bulan=$pecah[1];
								$tahun=$pecah[0];
								?>
                                <option value="<?php echo $tahun;?>"> <?php echo $tahun;?></option>
                                <?php
							}
						}
						?>
                        </select>
                	</div>
                    <div class="form-group">
                    <label for="">Aksi</label><br/>
                 	<button name="tambah" type="button" class="btn btn-danger" id="tomCetakLapPerTahun" ><span class="glyphicon glyphicon-print"></span> Cetak</button>
                </form>
                <?php
			}
			?>
            <!-- lap Per Tahun -->
            <!-- kelas -->
            <?php
			if($page=='kelas'){
				?>
                <button id="tambahKelas" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambahKelas"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
                <!-- Modal hapus -->
					<div id="modalTambahKelas" class="modal fade " role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
                                	
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title"><span id="ideMk"></span> Data Kelas</h4>
      								</div>
      								<div class="modal-body">
        							
                                    <form>
                                    <div id="notifTambahKelas"></div>
                                    <div class="form-group">
                                    	<label>Kelas</label>
                                        <input id="idKelas" type="text" class="form-control" style="display:none;" placeholder="Matakuliah"/>
                                    	<input id="kelas" type="text" class="form-control" placeholder="Kelas"/>
                                    </div>
                                    
                                    <div class="form-group">
                                    	<label>Keterangan</label>
                                        <input id="ketKelas" type="text" class="form-control" placeholder="Keterangan"/>
                                    </div>
                                    <input id="tomTambahKelas" name="tambah" type="button" class="btn btn-primary btn-md" value="Simpan"/>
                                    </form>
      								</div>
      								<div class="modal-footer">
       									<button type="button"   class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
            
            <!-- Modal hapus -->
					<div id="modalHapusKelas" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title">Hapus Data Kelas</h4>
      								</div>
      								<div class="modal-body">
        							<p>Yakin akan menghapus data ini ?</p>
                                    <button id="tomYaHapusKelas" class="btn btn-danger">Ya</button>
                                    <div id="notifHapusMk"></div>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
            
            <div class="table-responsive" style="margin-top:10px;">
            <table class="table table-bordered table-hover table-striped display" id="tabelUser" >
                    	<thead>
      						<tr>
        						<th>No.</th>
        						<th>Kelas</th>
        						<th>Keterangan</th>
                                <th>Aksi</th>
      						</tr>
    					</thead>
   						<tbody>
                        <?php
						$tampil=$kelas->tampilSemua();
						$hitung=count($tampil);
						if($hitung>0){
							$no=1;
							foreach($tampil as $data){
								?>
                                <tr>
                                	<td><?php echo $no++;?>.</td>
                                    <td><?php echo $data['nama'];?></td>
                                    <td><?php echo $data['keterangan'];?></td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapusKelas" id="hapusKelas" name="<?php echo $data['id'];?>"><span class="glyphicon glyphicon-trash"></span></button>
                                    <button id="editKelas" type="button" class="btn btn-sm btn-success" name="<?php echo $data['id'];?>" data-toggle="modal" data-target="#modalTambahKelas"><span class="glyphicon glyphicon-pencil"></span></button>
                                    </td>
                                </tr>
                                <?php
							}
						}
						?>
                        </tbody>
            </table>
            </div>
                <?php
			}
			?>
            <!--end kelas-->
            
            <!-- dosen -->
            <?php 
			if($page=='dosen'){
				?>
                <button id="tambahDosen" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambahDosen"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
                <!-- Modal hapus -->
					<div id="modalTambahDosen" class="modal fade " role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
                                	
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title"><span id="ideDosen"></span> Data Dosen</h4>
      								</div>
      								<div class="modal-body">
        							
                                    <form>
                                    
                                    <div class="form-group">
                                    	<label>Nama</label>
                                        <input id="idDosen" type="text" class="form-control" style="display:none;" placeholder="Matakuliah"/>
                                    	<input id="namaDosen" type="text" class="form-control" placeholder="Nama Dosen"/>
                                    </div>
                                    <div class="form-group">
                                    <label>Password</label>
                                    <input id="passwordDosen" type="text" class="form-control" placeholder="Password"/>
                                    </div>
                                    <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" id="jkDosen">
                                    <option selected>-- pilih --</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                    						<label for="">Agama</label>
                    						<select id="agamaDosen" class="form-control">
                                            	<option selected>-- pilih --</option>
                                                <option value="islam">islam</option>
                                                <option value="kristen">kristen</option>
                                                <option value="katolik">katolik</option>
                                                <option value="hindu">hindu</option>
                                                <option value="budah">budha</option>
                                                <option value="kongucu">kongucu</option>
                                            </select>
                					</div>
                                    <div class="form-group">
                    						<label for="">Tempat Lahir</label>
                    						<input id="tempatLahirDosen" type="text" class="form-control" name="password" placeholder="Tempat Lahir" />
                					</div>
                                    <div class="form-group">
                    						<label for="">Tanggal Lahir</label>
                    						<input id="tanggalLahirDosen" type="date" class="form-control" name="password" placeholder="Password" />
                					</div>
                                    <div class="form-group">
                    						<label for="">Alamat</label>
                    						<textarea id="alamatDosen" type="date" class="form-control" name="password" placeholder="Alamat" ></textarea>
                							</div>
                                    <input id="tomTambahDosen" name="tambah" type="button" class="btn btn-primary btn-md" value="Simpan"/>
                                    <div id="notifTambahDosen"></div>
                                    </form>
      								</div>
      								<div class="modal-footer">
       									<button type="button"   class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
            
            <!-- Modal hapus -->
					<div id="modalHapusDosen" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title"><span id="ide"></span> Data Dosen</h4>
      								</div>
      								<div class="modal-body">
        							<p id="notifTambahDosen"></p>
                                    	Apakah Anda Yakin Akan Menghapus Data Ini ?
                                        <div >
                    						<button name="tambah" type="button" class="btn btn-danger" id="tomYaHapusDosen">Ya</button>
                						</div>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
            
            <div class="table-responsive" style="margin-top:10px;">
            <table class="table table-bordered table-hover table-striped display" id="tabelUser" >
                    	<thead>
      						<tr>
        						<th>No.</th>
        						<th>Id Dosen</th>
        						<th>Nama Dosen</th>
                                <th>Aksi</th>
      						</tr>
    					</thead>
   						<tbody>
                        <?php
						$tampil=$dosen->tampil();
						$hitung=count($tampil);
						if($hitung>0){
							$no=1;
							foreach($tampil as $data){
								?>
                                <tr>
                                	<td><?php echo $no++;?>.</td>
                                    <td><?php echo $data['id'];?></td>
                                    <td><?php echo $data['nama'];?></td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapusDosen" id="hapusDosen" name="<?php echo $data['id'];?>"><span class="glyphicon glyphicon-trash"></span></button>
                                    <button id="editDosen" type="button" class="btn btn-sm btn-success" name="<?php echo $data['id'];?>" data-toggle="modal" data-target="#modalTambahDosen"><span class="glyphicon glyphicon-pencil"></span></button>
                                    </td>
                                </tr>
                                <?php
							}
						}
						?>
                        </tbody>
            </table>
            </div>
                <?php
			}
			?>
            <!-- end dosen -->
            <?php
			if($page=='trx'){
				?>
                <h3>Pencarian Transaksi</h3><hr/>
                <form class="form-inline">
                	<div class="form-group">
               			<label for="">Keyword</label><br/>
               			<input id="keyword" type="text" class="form-control" name="username" placeholder="invoice/nirm/nama" />
                        <button type="button" class="form-control btn btn-danger" id="search"><span class="glyphicon glyphicon-search"></span></button>
                	</div>
                </form>
                <br/>
                <div id="list"></div>
                <?php
			}
			?>
        </div>
        <!-- end isi -->
        <!-- Modal hapus -->
					<div id="modallistNewTrx" class="modal fade" role="dialog">
  						<div class="modal-dialog">

    						<!-- Modal content-->
    							<div class="modal-content">
      								<div class="modal-header">
        								<button type="button" class="close" data-dismiss="modal">&times;</button>
        								<h4 class="modal-title"><span id="ide"></span> Data Transaksi</h4>
      								</div>
      								<div class="modal-body">
        							<div id="listAja"></div>
      								</div>
      								<div class="modal-footer">
       									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      								</div>
    							</div>

  						</div>
					</div>
			<!-- end modal -->
	</div>
    
    
</div>
<!-- end container -->
<div class="container" style="margin-top:10px;">
	<!-- footer -->
    <div class="row">
    	<div class="col-sm-12" style="color:#ccc;">
        	&copy; 2015 stekomindo created by okta pilopa
        </div>
    </div>
    <!-- end footer -->
</div>
</body>
</html>