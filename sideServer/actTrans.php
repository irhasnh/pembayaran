<?php
include'class.php';

$act=@$_POST['act'];
$keyword=@$_POST['keyword'];
$trx=new trx();

if($act=='ambil'){
	if($keyword=='' || empty($keyword)){
		echo'<div class="alert alert-danger">Anda belum memasukkan katakunci apapun !</div>';
	}
	else{
		$tampil=$trx->cari($keyword);
		$hitung=count($tampil);
		if($hitung>0){
			$no=1;
			?>
            <form class="form-inline" id="tbEdit">
            <div class="form-group">
                    
                 	<button name="tambah" type="button" class="btn btn-danger" id="edit" ><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                    <button name="tambah" type="button" class="btn btn-info" id="hapus" ><span class="glyphicon glyphicon-trash"></span> hapus</button>
            </div>
            <div class="table-responsive" style="margin-top:10px;">
            <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
            <th>No.</th>
            <th>check</th>
            <th>Invoice</th>
            <th>Niirm</th>
            <th>Nama</th>
            </tr>
            </thead>
            <tbody>
            <?php
			foreach($tampil as $data){
				?>
                <tr>
                <td><?php echo $no++;?></td>
                <td><input type="checkbox" name="cek[]" value="<?php echo $data['id'];?>"/></td>
                <td><?php echo $data['invoice'];?></td>
                <td><?php echo $data['nirm'];?></td>
                <td><?php echo $data['nama'];?></td>
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
	}
}
?>