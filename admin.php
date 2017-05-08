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
</head>
<body>
<!-- menu -->
<nav class="navbar navbar-inverse" style="border-radius:0px; background:#1BBC9B; border-left:none; border-right:none; border-top:none; border-bottom:solid 12px #019875;" >
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#fff;">Stekomindo</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="admin.php?page=home" style="color:#fff;">Home</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#fff;">Manejemen Data
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="admin.php?page=user">User</a></li>
            <li><a href="admin.php?page=pembayaran">Pembayaran</a></li>
            <li><a href="admin.php?page=mahasiswa">Mahasiswa</a></li>
            <li><a href="admin.php?page=trx">Transaksi</a></li> 
          </ul>
         </li>
        <li  class="dropdown">
        <a href="#" style="color:#fff;" class="dropdown-toggle" data-toggle="dropdown" >Transaksi <span class="caret"></span></a>
        	<ul class="dropdown-menu">
            						<?php
									$rand='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
									$rand=str_shuffle($rand);
									$rand=str_shuffle($rand);
									$rand=substr($rand,0,10);
									?>
            	<li><a href="admin.php?page=transaksi&invoice=<?php echo $rand;?>&nirm=&idPetugas=<?php echo $_SESSION['username'];?>" target="_blank">Transaksi mahasiswa baru</a></li>
          	</ul>
        </li> 
        <li class="dropdown"><a href="#" style="color:#fff;" class="dropdown-toggle" data-toggle="dropdown" >Laporan <span class="caret"></span></a>
        	<ul class="dropdown-menu">
            <li><a href="#">Laporan harian</a></li>
            <li><a href="#">Laporan bulanan</a></li>
            <li><a href="#">Laporan Tahunan</a></li> 
          </ul>
        </li> 
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
  		<div class="col-sm-3" style="border:solid thin #f1f1f1;">
        	<h3>Petunjuk !</h3>
            <ul class="list-group">
  				<li class="list-group-item ">1. Rahasiakan Password Anda !</li>
  				<li class="list-group-item list-group-item-success">2. Telitilah Dalam Menginput Data !</li>
  				<li class="list-group-item ">3. Periksa Kembali, Sebelum Menyimpan Data !</li>
  				<li class="list-group-item list-group-item-success">4. Jangan Lupa Untuk Menekan Tombol logout !</li>
                <li class="list-group-item ">5. Hubungi Developer, Jika Ada Masalah !</li>
			</ul>
        </div>
        <!-- end petunjuk -->
        	
        <!-- isi -->
        <div class="col-md-9">
        	<?php 
				if($page=='home' || empty($page) || $page=='' || !isset($page)){
					echo '<h3>Hello, anda memasuki halaman admin</h3>';
				}
			?>
            
            <?php
			if($page=='user'){
				echo'<button id="tambah" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambahUser"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>';
				?>
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
                <button id="tambahMahasiswa" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTambahMahasiswa"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
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
                                    <button name="<?php echo $data['nirm'];?>" type="button" class="btn btn-success btn-sm" id="editMhs" data-toggle="modal" data-target="#modalTambahMahasiswa"><span class="glyphicon glyphicon-pencil"></span> </button>
                                    <button name="<?php echo $data['nirm'];?>" type="button" class="btn btn-danger btn-sm" id="hapusMhs" data-toggle="modal" data-target="#modalHapusMahasiswa"><span class="glyphicon glyphicon-trash"></span> </button>
                                    <button name="<?php echo $data['nirm'];?>" type="button" class="btn btn-primary btn-sm" id="detailMhs" data-toggle="modal" data-target="#modaldetailMahasiswa"><span class="glyphicon glyphicon-eye-open"></span> </button>
                                    <?php
									$rand='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
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
                <form class="form-inline">
                	<div class="form-group">
               			<label for="">Invoice</label><br/>
               			<input id="invoice" type="text" class="form-control" name="username" placeholder="invoice" value="<?php echo $_GET['invoice'];?>" readonly/>
                	</div>
                    <div class="form-group">
               			<label for="">NIRM</label><br/>
               			<input id="nirmTrx" type="text" class="form-control" name="username" placeholder="NIRM" value="<?php echo @$_GET['nirm'];?>" readonly/>
                	</div>
                    <div class="form-group">
               			<label for="">Nama</label><br/>
               			<input id="namaTrx" type="text" class="form-control" name="username" placeholder="Nama" value="<?php echo $mhs->tampilPerNIRM('nama', @$_GET['nirm']);?>" readonly/>
                	</div>
                    <div class="form-group">
               			<label for="">Petugas</label><br/>
               			<input id="idPetugasTrx" type="text" class="form-control" name="username" placeholder="Nama" value="<?php echo $_SESSION['username'];?>" readonly/>
                	</div>
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
        </div>
        <!-- end isi -->
	</div>
</div>
<!-- end container -->

    <!-- Script js -->
    <script src="jquery/jquery.js"></script>
    <script src="dataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="act.js"></script>
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <!-- End Script -->
</body>
</html>