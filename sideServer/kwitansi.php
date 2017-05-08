<?php
include'class.php';


$act=@$_GET['act'];
$invoice=@$_GET['invoice'];
$nirm=@$_GET['nirm'];
$nama=@$_GET['nama'];
$idPetugas=@$_GET['idPetugas'];
$uangBayar=@$_GET['uangBayar'];
$kembali=@$_GET['kembali'];
$trx=new trx();
$user=new user();

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
	include'../html2pdf-master/html2pdf.class.php';
	$html2pdf=new HTML2PDF('L', 'A5');
	$html2pdf->setDefaultFont('Arial');  
    $html2pdf->writeHTML($content);  
    $html2pdf->Output('kwitansi.pdf');  

	
}
?>