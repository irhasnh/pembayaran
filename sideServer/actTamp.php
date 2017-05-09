<?php
include'class.php';
$trx=new trx();
$cek=$_POST['cek'];
$jum=count($cek);
for($i=0; $i<$jum; $i++){
	$tampil=$trx->tampilPerId('id', $cek[$i]);
	foreach($tampil as $data){
		?>
        
        <form >
        <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $data['id'];?>"/>
        <input class="form-control" type="text" value="<?php echo $data['invoice'];?>" readonly/>
        
        
        </div>
        <div class="form-group">
        <input class="form-control" type="text" value="" placeholder="Masukkan NIRM"/>
        </div>
        <div class="form-group">
        <input class="form-control" type="text" value="<?php echo $data['nama'];?>" readonly/>
        </div>
        </form>
        <br/>
        <?php
	}
	
}
?>