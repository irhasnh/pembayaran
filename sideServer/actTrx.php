<?php
include'class.php';

$act=@$_POST['act'];
$id=@$_POST['id'];
$invoice=@$_POST['invoice'];
$idPembayaran=@$_POST['idPembayaran'];
$nirm=@$_POST['nirm'];
$nama=@$_POST['nama'];
$idPetugas=@$_POST['idPetugas'];
$biaya=@$_POST['biaya'];
$denda=@$_POST['denda'];
$kategori=@$_POST['kategori'];
$tanggal=date('Y-m-d');
$waktu=date('H:i:s');
$trx=new trx();
$pembayaran=new pembayaran();
$jenisPembayaran=$pembayaran->tampilField('jenisPembayaran',$idPembayaran);
$user=new user();
$namaPetugas=$user->tampilPerUser('nama', $idPetugas);

if($act=='ambil'){
	$ambil=$trx->tampilPerId('nirm',$id);
	$hitung=count($ambil);
	?>
    <button name="<?php echo $id;?>" type="button" class="btn btn-danger btn-md" id="cetakDetailTrxMhs" style="margin-bottom:10px;"><span class="glyphicon glyphicon-print"></span> Cetak </button>
    <table class="table table-bordered table-hover table-striped" id="tabelUser">
                    	<thead>
      						<tr>
        						<th>No.</th>
        						<th>Jenis Pembayaran</th>
        						<th>Biaya</th>
                                <th>Denda</th>
      						</tr>
    					</thead>
   						<tbody>
    <?php
	if($hitung>0){
		$no=1;
	foreach($ambil as $data){
		?>
        
                          <tr>
                                	<td align="center"><?php echo $no++;?>.</td>
                                    <td><?php echo $data['jenisPembayaran'];?></td>
                                    <td><?php echo $data['biaya'];?></td>
                                    <td >      
                                    <?php echo $data['denda'];?>                           
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
                                <th>Denda</th>
      					</tfoot>
  					</table>
				</div>
    <?php
	
}

if($act=='simpan'){
	if($nama=='' || empty($nama)){
		echo'<div class="alert alert-danger">Nama harus diisi !</div>';
	}
	elseif($kategori=='-- pilih --' || empty($kategori)){
		echo'<div class="alert alert-danger">Kategori belum dipilih !</div>';
	}
	elseif($idPembayaran=='-- pilih --' || empty($idPembayaran)){
		echo'<div class="alert alert-danger">Pembayaran belum dipilih !</div>';
	}
	elseif($biaya=='' || empty($biaya)){
		echo'<div class="alert alert-danger">Biaya harus diisi !</div>';
	}
	else{
		if($denda==''){
			$denda=0;
		}
		$simpan=$trx->simpan($invoice, $idPembayaran, $jenisPembayaran, $nirm, $nama, $idPetugas, $namaPetugas, $biaya, $denda, $kategori, $tanggal, $waktu);
		if(!$simpan){
			echo'<div class="alert alert-danger">Gagal Menyimpan !</div>';
		}
		else{
			echo 1;
		}
	}
}

if($act=='hapus'){
	$hapus=$trx->hapusPerId($id);
	if(!$hapus){
		echo'<div class="alert alert-danger">Gagal Menghapus !</div>';
	}
	else{
		echo 1;
	}
}

?>