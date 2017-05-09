<?php
include 'class.php';

$soal=new soal();
$idSoal=@$_POST['idIsiSoal'];
$waktu=@$_POST['alokasiWaktuIsi'];
$ketSoalIsi=@$_POST['ketSoalIsi'];
$jumSoalIsi=@$_POST['jumSoalIsi'];


$jumlahInput=count($_POST['soal']);

if($jumlahInput==0){
	echo 'Soal Kosong';
}
else{
	for($i=0; $i < $jumlahInput; $i++) {
	$no=$i+1;
	$nos=$no++;
	$soali= $_POST['soal'][$i];
	$jawaban=$_POST['jawaban'][$i];
	
	$simpan=$soal->simpanSoal($idSoal, $nos, $soali, $jawaban);
	
	
		
		
	}
	if ($simpan){
		$simpani=$soal->simpanWaktuSoal($idSoal, $waktu, $ketSoalIsi);
			if($simpani){
	 			echo '<script language="javascript">document.location="?page=buatSoal"; </script>';
			}
			else{
				echo '<div class="alert alert-danger">gagal</div>';
			}

	 }

    else{  
	echo '<div class="alert alert-danger">gagal</div>';
	}
}

?>