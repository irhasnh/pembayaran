<?php
include'class.php';


$act=@$_GET['act'];
$invoice=@$_GET['invoice'];
$nirm=@$_GET['nirm'];
$nama=@$_GET['nama'];
$idPetugas=@$_GET['idPetugas'];
$uangBayar=@$_GET['uangBayar'];
$kembali=@$_GET['kembali'];
$tanggal=@$_GET['tanggal'];
$bulan=@$_GET['bulan'];
$tahun=@$_GET['tahun'];
$trx=new trx();
$user=new user();
$mahasiswa=new mahasiswa();

if($act=='kwitansi'){
	if($nirm==''){
		$nirm='';
	}
	if($uangBayar==''){
		$uangBayar=0;
	}
	if($kembali==''){
		$kembali=0;
	}
	ob_start();
	?>
    <img src="../images/logo-01.png" width="70" style="float:left;"  />
    <p style="float:left; margin-left:80px;"  >
    <b>STEKOMINDO</b><br/>
    Sains Teknologi Komunikasi Dan Komputer Indonesia<br/>
    Jl. Pagar Alam No. 102b 35152 Bandar Lampung <br/>
    Phone: +62822 8054 2915, +62721 7501300 E-mail: admin@stekomindo.or.id
    </p>
    <hr/>
    <p style="text-align:center; margin-top:0px;">
    <u><b>Kwitansi Pembayaran</b></u><br/>
    Invoice. <?php echo $invoice;?>
    </p>
    <p style="text-align:center; margin-top:0px;">
    NIRM: <?php echo $nirm;?> <?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?> Nama: <?php echo $nama;?>
    </p>
    <table border="1" bordercolor="#000000" cellspacing="0">
    <tr >
    <td ><b>No.<?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></b></td>
    <td><b>Jenis Pembayaran<?php for($i=1;$i<20;$i++){ echo '&nbsp;';}?></b></td>
    <td><b>Biaya<?php for($i=1;$i<30;$i++){ echo '&nbsp;';}?></b></td>
    <td><b>Denda<?php for($i=1;$i<30;$i++){ echo '&nbsp;';}?></b></td>
    <td><b>Jumlah<?php for($i=1;$i<35;$i++){ echo '&nbsp;';}?></b></td>
    </tr>
    <?php
	$tampil=$trx->tampilPerId('invoice', $invoice);
	$hitung=count($tampil);
	if($hitung>0){
		$no=1;
		foreach($tampil as $data){
			?>
            <tr>
            <td><?php echo $no++;?>.</td>
            <td><?php echo $data['jenisPembayaran'];?></td>
            <td><?php echo 'Rp. '.number_format(@$data['biaya']);?></td>
            <td><?php echo 'Rp. '.number_format(@$data['denda']);?></td>
            <?php $jumlah=$data['biaya']+$data['denda'];
			@$total+=$jumlah;
			?>
            <td><?php echo 'Rp. '.number_format(@$jumlah);?></td>
            </tr>
            <?php
		}
		?>
        <tr>
                        <td colspan="4" align="right"><b>Total Bayar</b></td>
                        <td><?php echo 'Rp. '.number_format(@$total);?></td>
                        </tr>
                        <tr>
                        <td colspan="4" align="right"><b>Uang Yang Dibayar</b></td>
                        <td><?php echo 'Rp. '.number_format($uangBayar);?></td>
                        </tr>
                        <tr>
                        <td colspan="4" align="right"><b>Kembali</b></td>
                        <td><?php echo 'Rp. '.number_format($kembali);?></td>
                        </tr>
        <?php
	}
	?>
    </table>
    <?php for($i=1;$i<135;$i++){ echo '&nbsp;';}?>Bandar Lampung, <?php echo date('d M Y');?><br/>
    <?php for($i=1;$i<135;$i++){ echo '&nbsp;';}?>Petugas<br/><br/><br/>
    <?php for($i=1;$i<135;$i++){ echo '&nbsp;';}?><?php echo $tampil=$user->tampilPerUser('nama', $idPetugas);?>
	<?php
	$content=ob_get_clean();  
	include'../html2pdf_v3.31/html2pdf.class.php';
	$html2pdf=new HTML2PDF('L', 'A5');
	$html2pdf->setDefaultFont('Arial');  
    $html2pdf->writeHTML($content);  
    $html2pdf->Output('kwitansi.pdf');  

	
}

if($act=='lapPerMhs'){
	ob_start();
	?>
    <img src="../images/logo-01.png" width="70" style="float:left;"  />
    <p style="float:left; margin-left:80px;"  >
    <b>STEKOMINDO</b><br/>
    Sains Teknologi Komunikasi Dan Komputer Indonesia<br/>
    Jl. Pagar Alam No. 102b 35152 Bandar Lampung <br/>
    Phone: +62822 8054 2915, +62721 7501300 E-mail: admin@stekomindo.or.id
    </p>
    <hr/>
    <p style="text-align:center; margin-top:0px;">
    <u><b>Laporan Per Mahasiswa</b></u><br/><br/>
    NIRM :<?php echo $nirm; ?> <?php for($i=1;$i<10;$i++){echo '&nbsp;';}?>Nama: <?php echo $mahasiswa->tampilPerNIRM('nama', $nirm);?>
    </p>
    <table border="1" bordercolor="#000000" cellspacing="0">
    <tr >
    <td ><b>No.<?php for($i=1;$i<5;$i++){ echo '&nbsp;';}?></b></td>
    <td><b>Jenis Pembayaran<?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></b></td>
    <td><b>Kategori<?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></b></td>
    <td><b>Biaya<?php for($i=1;$i<15;$i++){ echo '&nbsp;';}?></b></td>
	<td><b>Tanggal<?php for($i=1;$i<15;$i++){ echo '&nbsp;';}?></b></td>
    <td><b>Denda<?php for($i=1;$i<20;$i++){ echo '&nbsp;';}?></b></td>
    <td><b>Jumlah<?php for($i=1;$i<20;$i++){ echo '&nbsp;';}?></b></td>
    </tr>
    
    <?php
    $tampil=$trx->tampilPerId('nirm', $nirm);
	$hitung=count($tampil);
	if($hitung>0){
		$no=1;
		foreach($tampil as $data){
			?>
            <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $data['jenisPembayaran'];?></td>
            <td><?php echo $data['kategori'];?></td>
            <td><?php echo 'Rp. '.number_format(@$data['biaya']);?></td>
			<td><?php echo $data['tanggal'];?></td>
            <td><?php echo 'Rp. '.number_format(@$data['denda']);?></td>
            <?php $jumlah=$data['biaya']+$data['denda'];?>
            <td><?php echo 'Rp. '.number_format(@$jumlah);?></td>
            </tr>
            <?php
		}
	}
	?>
    </table>
    <br/>
    <?php for($i=1;$i<135;$i++){ echo '&nbsp;';}?>Bandar Lampung, <?php echo date('d M Y');?><br/>
    <?php
	$content=ob_get_clean();
	include'../html2pdf_v3.31/html2pdf.class.php';
	$html2pdf=new HTML2PDF('P', 'A4');
	$html2pdf->setDefaultFont('Arial');  
    $html2pdf->writeHTML($content);  
    $html2pdf->Output('Laporan Per Mahasiswa.pdf'); 
	
}

if($act=='lapPerHari'){
	ob_start();
	?>
    <img src="../images/logo-01.png" width="70" style="float:left;"  />
    <p style="float:left; margin-left:80px;"  >
    <b>STEKOMINDO</b><br/>
    Sains Teknologi Komunikasi Dan Komputer Indonesia<br/>
    Jl. Pagar Alam No. 102b 35152 Bandar Lampung <br/>
    Phone: +62822 8054 2915, +62721 7501300 E-mail: admin@stekomindo.or.id
    </p>
    <hr/>
    <p style="text-align:center; margin-top:0px;">
    <u><b>Laporan Per Hari</b></u><br/><br/>
    <?php 
	$tanggal=explode('-',$tanggal);
	$tahun=$tanggal[0];
	$bulan=$tanggal[1];
	$hari=$tanggal[2];
	if($bulan=='01'){
		$bulan='januari';
	}
	elseif($bulan=='02'){
		$bulan='februari';
	}
	elseif($bulan=='03'){
		$bulan='maret';
	}
	elseif($bulan=='04'){
		$bulan='april';
	}
	elseif($bulan=='05'){
		$bulan='Mei';
	}
	elseif($bulan=='06'){
		$bulan='Juni';
	}
	elseif($bulan=='07'){
		$bulan='Juli';
	}
	elseif($bulan=='08'){
		$bulan='Agustus';
	}
	elseif($bulan=='09'){
		$bulan='September';
	}
	elseif($bulan=='10'){
		$bulan='Oktober';
	}
	elseif($bulan=='11'){
		$bulan='November';
	}
	elseif($bulan=='12'){
		$bulan='Desember';
	}
	?>
    Tanggal: <?php echo $hari.' '.$bulan.' '.' '.$tahun; ?>
    </p>
    <table border="1" bordercolor="#000000" cellspacing="0">
    <tr >
    <td ><b>No.</b><?php for($i=1;$i<5;$i++){ echo '&nbsp;';}?></td>
    <td><b>Invoice</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Nirm</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Nama</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Petugas</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Kategori</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Jenis Pembayaran</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Biaya</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Denda</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    
    <td><b>Tanggal</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Jumlah</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    </tr>
    <?php
	$tanggal=@$_GET['tanggal'];
	$tampil=$trx->tampilPerId('tanggal', $tanggal);
	$hitung=count($tampil);
	if($hitung>0){
		$no=1;
		foreach($tampil as $data){
			?>
            <tr >
    			<td ><?php echo $no++;?>.</td>
    			<td><?php echo $data['invoice'];?></td>
    			<td><?php echo $data['nirm'];?></td>
    			<td><?php echo $data['nama'];?></td>
    			<td><?php echo $data['namaPetugas'];?></td>
    			<td><?php echo $data['kategori'];?></td>
    			<td><?php echo $data['jenisPembayaran'];?></td>
    			<td><?php echo 'Rp. '.number_format($data['biaya']);?></td>
    			<td><?php echo 'Rp. '.number_format($data['denda']);?></td>
                <?php $jumlah=$data['biaya']+$data['denda'];
				@$total+=$jumlah;
				?>
                <td><?php echo $data['tanggal'];?></td>
    			<td><?php echo 'Rp. '.number_format($jumlah);?></td>
    			
    		</tr>
            <?php
		}
		?>
        <tr>
        <td colspan="10" align="right"><b>Total</b></td>
        <td><?php echo 'Rp. '.number_format(@$total);?></td>
        </tr>
        <?php
	}
	?>
    </table>
    <br/>
    <?php for($i=1;$i<200;$i++){ echo '&nbsp;';}?>Bandar Lampung, <?php echo date('d M Y');?>
    <?php
	$content=ob_get_clean();
	include'../html2pdf_v3.31/html2pdf.class.php';
	$html2pdf=new HTML2PDF('l', 'FOLIO');
	$html2pdf->setDefaultFont('Arial');  
    $html2pdf->writeHTML($content);  
    $html2pdf->Output('Laporan Per Hari.pdf'); 
}

if($act=='lapPerBulan'){
	ob_start();
	?>
    <img src="../images/logo-01.png" width="70" style="float:left;"  />
    <p style="float:left; margin-left:80px;"  >
    <b>STEKOMINDO</b><br/>
    Sains Teknologi Komunikasi Dan Komputer Indonesia<br/>
    Jl. Pagar Alam No. 102b 35152 Bandar Lampung <br/>
    Phone: +62822 8054 2915, +62721 7501300 E-mail: admin@stekomindo.or.id
    </p>
    <hr/>
    <p style="text-align:center; margin-top:0px;">
    <u><b>Laporan Per Bulan</b></u><br/><br/>
    Bulan: <?php
	if($bulan=='01'){
		$bulan='januari';
	}
	elseif($bulan=='02'){
		$bulan='februari';
	}
	elseif($bulan=='03'){
		$bulan='maret';
	}
	elseif($bulan=='04'){
		$bulan='april';
	}
	elseif($bulan=='05'){
		$bulan='Mei';
	}
	elseif($bulan=='06'){
		$bulan='Juni';
	}
	elseif($bulan=='07'){
		$bulan='Juli';
	}
	elseif($bulan=='08'){
		$bulan='Agustus';
	}
	elseif($bulan=='09'){
		$bulan='September';
	}
	elseif($bulan=='10'){
		$bulan='Oktober';
	}
	elseif($bulan=='11'){
		$bulan='November';
	}
	elseif($bulan=='12'){
		$bulan='Desember';
	}
	echo $bulan;
	 ?>
     <?php for($i=1;$i<15;$i++){ echo '&nbsp;';}?>Tahun: <?php echo $tahun; ?>
    </p>
    <table border="1" bordercolor="#000000" cellspacing="0">
    <tr >
    <td ><b>No.</b><?php for($i=1;$i<5;$i++){ echo '&nbsp;';}?></td>
    <td><b>Invoice</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Nirm</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Nama</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Petugas</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Kategori</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Jenis Pembayaran</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Biaya</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Denda</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Tanggal</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Jumlah</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    
    </tr>
    <?php
	$bulan=@$_GET['bulan'];
	$tampil=$trx->lapPerBulan($bulan, $tahun);
	$hitung=count($tampil);
	if($hitung>0){
		$no=1;
		
		foreach($tampil as $data){
			?>
            <tr >
    			<td ><?php echo $no++;?>.</td>
    			<td><?php echo $data['invoice'];?></td>
    			<td><?php echo $data['nirm'];?></td>
    			<td><?php echo $data['nama'];?></td>
    			<td><?php echo $data['namaPetugas'];?></td>
    			<td><?php echo $data['kategori'];?></td>
    			<td><?php echo $data['jenisPembayaran'];?></td>
    			<td><?php echo 'Rp. '.number_format($data['biaya']);?></td>
    			<td><?php echo 'Rp. '.number_format($data['denda']);?></td>
                <?php $jumlah=$data['biaya']+$data['denda'];
				@$total+=$jumlah;
				?>
                <td><?php echo $data['tanggal'];?></td>
    			<td><?php echo 'Rp. '.number_format($jumlah);?></td>
    			
    		</tr>
            <?php
		}
		?>
        <tr>
        <td colspan="10" align="right"><b>Total</b></td>
        <td><?php echo 'Rp. '.number_format(@$total);?></td>
        </tr>
        
        <?php
	}
	?>
    </table>
    <br/>
    <?php for($i=1;$i<200;$i++){ echo '&nbsp;';}?>Bandar Lampung, <?php echo date('d M Y');?>
    <?php
	$content=ob_get_clean();
	include'../html2pdf_v3.31/html2pdf.class.php';
	$html2pdf=new HTML2PDF('l', 'FOLIO');
	$html2pdf->setDefaultFont('Arial');  
    $html2pdf->writeHTML($content);  
    $html2pdf->Output('Laporan Per Bulan.pdf'); 
}

if($act=='lapPerTahun'){
	ob_start();
	?>
    <img src="../images/logo-01.png" width="70" style="float:left;"  />
    <p style="float:left; margin-left:80px;"  >
    <b>STEKOMINDO</b><br/>
    Sains Teknologi Komunikasi Dan Komputer Indonesia<br/>
    Jl. Pagar Alam No. 102b 35152 Bandar Lampung <br/>
    Phone: +62822 8054 2915, +62721 7501300 E-mail: admin@stekomindo.or.id
    </p>
    <hr/>
    <p style="text-align:center; margin-top:0px;">
    <u><b>Laporan Per Tahun</b></u><br/><br/>
    Tahun: <?php echo $tahun;?>
    </p>
    
    <table border="1" bordercolor="#000000" cellspacing="0">
    <tr >
    <td ><b>No.</b><?php for($i=1;$i<5;$i++){ echo '&nbsp;';}?></td>
    <td><b>Invoice</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Nirm</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Nama</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Petugas</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Kategori</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Jenis Pembayaran</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Biaya</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Denda</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Tanggal</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    <td><b>Jumlah</b><?php for($i=1;$i<10;$i++){ echo '&nbsp;';}?></td>
    </tr>
    <?php
	$tampil=$trx->lapPerTahun($tahun);
	$hitung=count($tampil);
	
	if($hitung>0){
		$no=1;
		foreach($tampil as $data){
			?>
            <tr >
    			<td ><?php echo $no++;?>.</td>
    			<td><?php echo $data['invoice'];?></td>
    			<td><?php echo $data['nirm'];?></td>
    			<td><?php echo $data['nama'];?></td>
    			<td><?php echo $data['namaPetugas'];?></td>
    			<td><?php echo $data['kategori'];?></td>
    			<td><?php echo $data['jenisPembayaran'];?></td>
    			<td><?php echo 'Rp. '.number_format($data['biaya']);?></td>
    			<td><?php echo 'Rp. '.number_format($data['denda']);?></td>
                <?php $jumlah=$data['biaya']+$data['denda'];
				@$total+=$jumlah;
				?>
                <td><?php echo $data['tanggal'];?></td>
    			<td><?php echo 'Rp. '.number_format($jumlah);?></td>
    			
    		</tr>
            <?php
		}
		?>
        <tr>
        <td colspan="10" align="right"><b>Total</b></td>
        <td><?php echo 'Rp. '.number_format(@$total);?></td>
        </tr>
            <?php
		
	}
	?>
    </table><br/>
    <?php for($i=1;$i<200;$i++){ echo '&nbsp;';}?>Bandar Lampung, <?php echo date('d M Y');?>
    <?php
	$content=ob_get_clean();
	include'../html2pdf_v3.31/html2pdf.class.php';
	$html2pdf=new HTML2PDF('l', 'FOLIO');
	$html2pdf->setDefaultFont('Arial');  
    $html2pdf->writeHTML($content);  
    $html2pdf->Output('Laporan Per Tahun.pdf'); 
	
}
?>