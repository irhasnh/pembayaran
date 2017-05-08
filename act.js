$(document).ready(function() {
	
    //login
	$(document).on('click', '#login', function(){
		$('#notifLogin').html('Loading...');
		var username=$('#username').val();
		var password=$('#password').val();
		
		$.ajax({
			url:'sideServer/actLogin.php',
			data:'act=login&username='+username+'&password='+password,
			type:'POST',
			success: function(msg){
				$('#notifLogin').html(msg);
			}
			
		});
	});
	//akhir login
	
	//logout
	$(document).on('click', '#logout', function(){
		$.ajax({
			url:'sideServer/actLogin.php',
			data:'act=logout',
			type:'POST',
			success: function(){
			}
		});
	});
	//end logout
	
	//user
		
		function clear(){
			$('#usernameTambah').val('');
			$('#namaTambah').val('');
			$('#passwordTambah').val('');
			$('#notifTambahUser').html('');
		}
		
		function read(){
			$('#usernameTambah').attr('readonly','true');
			$('#namaTambah').attr('readonly','true');
			$('#passwordTambah').attr('readonly','true');
			$('#level').attr('readonly','true');
		}
		
		
		
		$(document).on('click','#tambah', function(){
			clear();
			
			$(this).attr('name','tambah');
			$('#ide').html('Tambah');
		});
		
		
		//tambah user
		$(document).on('click', '#tomTambahUser', function(){
			var name=$(this).attr('name');
			
			$('#notifTambahUser').html('Loading...');
			var username=$('#usernameTambah').val();
			var nama=$('#namaTambah').val();
			var password=$('#passwordTambah').val();
			var level=$('#level').val();
			var id=$('#idTambahUser').val();
			
			if(name=='tambah'){
			$.ajax({
				url:'sideServer/actUser.php',
				data:'act=tambah&username='+username+'&nama='+nama+'&password='+password+'&level='+level,
				type:'POST',
				success: function(msg){
					$('#notifTambahUser').html(msg);
				}
			});
			}
			else if(name=='hapus'){
				
			}
			else{
				$.ajax({
				url:'sideServer/actUser.php',
				data:'act=edit&id='+id+'&username='+username+'&nama='+nama+'&password='+password+'&level='+level,
				type:'POST',
				success: function(msg){
					$('#notifTambahUser').html(msg);
				}
			});
			}
		});
		//end tambah user
		
	//end user
	$('#tabelUser').DataTable();
	
   	$(document).on('click','#editUser', function(){
		
		$('#ide').html('Edit');
		$('#tomTambahUser').removeAttr('name');
		$('#notifTambahUser').html('');
		var username= $(this).attr('name');
		$.ajax({
			url:'sideServer/actUser.php',
			data:{act:"ambil",username:username},
			dataType:'json',
			type:'POST',
			success: function(msg){
				$('#usernameTambah').val(msg.username);
				$('#namaTambah').val(msg.nama);
				$('#passwordTambah').val(msg.password);
				$('#level').val(msg.level);
				$('#idTambahUser').val(msg.username);
			}
		});
	});
   
   	$(document).on('click','#hapusUser', function(){
			$('#ide').html('Hapus');
			$('#notifTambahUser').html('');
			
			var id= $(this).attr('name');
			$(document).on('click', '#tomYaHapusUser', function(){
			$.ajax({
				url:'sideServer/actUser.php',
				data:'act=hapus&id='+id,
				type:'POST',
				success: function(msg){
					$('#notifTambahUser').html(msg);
				}
			});
			});
		});
 
	//end dt user
	
	//pembayaran
	$(document).on('click', '#tambahPembayaran', function(){
		$('#idePembayaran').html('Tambah');
		$('#jenisPembayaran').val('');
		$('#biaya').val('');
		$('#notifTambahPembayaran').html('');		
	});
	
	$(document).on('click','#tomTambahPembayaran', function(){
		var name=$(this).attr('name');
		$('#notifTambahPembayaran').html('Loading...');
		
		var id=$('#idTambahPembayaran').val();
		var jenisPembayaran=$('#jenisPembayaran').val();
		var biaya=$('#biaya').val();
		
		if(name=='tambah'){
			$.ajax({
				url:'sideServer/actPembayaran.php',
				data:'act=simpan&jenisPembayaran='+jenisPembayaran+'&biaya='+biaya,
				type:'POST',
				success: function(msg){
					$('#notifTambahPembayaran').html(msg);
				}
			});
		}
		else{
			$.ajax({
				url:'sideServer/actPembayaran.php',
				data:'act=edit&id='+id+'&jenisPembayaran='+jenisPembayaran+'&biaya='+biaya,
				type:'POST',
				success: function(msg){
					$('#notifTambahPembayaran').html(msg);
				}
			});
		}
	});
	
	$(document).on('click', '#editBiaya', function(){
		$('#idePembayaran').html('Edit');
		$('#tomTambahPembayaran').removeAttr('name');
		$('#notifTambahPembayaran').html('');
		var id= $(this).attr('name');
		$.ajax({
			url:'sideServer/actPembayaran.php',
			data:{act:"ambil",id:id},
			dataType:'json',
			type:'POST',
			success: function(msg){
				$('#idTambahPembayaran').val(msg.id);
				$('#jenisPembayaran').val(msg.jenisPembayaran);
				$('#biaya').val(msg.biaya);
			}
		});
		
	});
	
	$(document).on('click', '#hapusBiaya', function(){
		var id = $(this).attr('name');
		$(document).on('click', '#tomYaHapusPembayaran', function(){
			$.ajax({
				url:'sideServer/actPembayaran.php',
				data:'act=hapus&id='+id,
				type:'POST',
				success: function(msg){
					$('#notifTambahPembayaran').html(msg);
				}
			});
		
		});
	});
	//end pembayaran
	
	//mahasiswa
	$(document).on('click', '#tambahMahasiswa', function(){
		$('#ideMahasiswa').html('Tambah');
		$('#NIRM').val('');
		$('#namaMhs').val('');
		$('#tempatLahir').val('');
		$('#tanggalLahir').val('');
		$('#jk').val('');
		$('#agama').val('');
		$('#alamat').val('');
		$('#passwordMhs').val('');
		$('#notifTambahMhs').html('');		
	});
	
	$(document).on('click', '#tomTambahMhs', function(){
		var name=$(this).attr('name');
		$('#notifTambahMhs').html('Loading...');
		
		var id= $('#idTambahMhs').val();
		var nirm= $('#NIRM').val();
		var nama= $('#namaMhs').val();
		var tempatLahir=$('#tempatLahir').val();
		var tanggalLahir=$('#tanggalLahir').val();
		var jk= $('#jk').val();
		var agama= $('#agama').val();
		var alamat= $('#alamat').val();
		var password= $('#password').val();
		
		if(name=='tambah'){
			$.ajax({
				url:'sideServer/actMhs.php',
				data:'act=simpan&nirm='+nirm+'&nama='+nama+'&tempatLahir='+tempatLahir+'&tanggalLahir='+tanggalLahir+'&jk='+jk+'&agama='+agama+'&alamat='+alamat+'&password='+password,
				type:'POST',
				success: function(msg){
					$('#notifTambahMhs').html(msg);
				}
				
			});
		}
		else{
			$.ajax({
				url:'sideServer/actMhs.php',
				data:'act=edit&id='+id+'&nirm='+nirm+'&nama='+nama+'&tempatLahir='+tempatLahir+'&tanggalLahir='+tanggalLahir+'&jk='+jk+'&agama='+agama+'&alamat='+alamat+'&password='+password,
				type:'POST',
				success: function(msg){
					$('#notifTambahMhs').html(msg);
				}
				
			});
		}
		
	});
	
	$(document).on('click', '#editMhs', function(){
		$('#ideMahasiswa').html('Edit');
		$('#tomTambahMhs').removeAttr('name');
		$('#notifTambahMhs').html('');
		var id= $(this).attr('name');
		$.ajax({
			url:'sideServer/actMhs.php',
			data:{act:"ambil",id:id},
			dataType:'json',
			type:'POST',
			success: function(msg){
				$('#idTambahMhs').val(msg.nirm);
				$('#NIRM').val(msg.nirm);
				$('#namaMhs').val(msg.nama);
				$('#tempatLahir').val(msg.tempatLahir);
				$('#tanggalLahir').val(msg.tanggalLahir);
				$('#jk').val(msg.jk);
				$('#agama').val(msg.agama);
				$('#alamat').val(msg.alamat);
				$('#password').val(msg.password);
			}
		});
		
	});
	
	$(document).on('click', '#hapusMhs', function(){
		var id= $(this).attr('name');
		$(document).on('click', '#tomYaHapusMhs', function(){
		$.ajax({
			url:'sideServer/actMhs.php',
			data:'act=hapus&id='+id,
			type:'POST',
			success: function(msg){
				$('#notifTambahMhs').html(msg);
			}
			});
		});
	});
	
	$(document).on('click', '#detailMhs', function(){
		$('#listDetailMhs').html('Loading...');
		var id= $(this).attr('name');
		$.ajax({
			url:'sideServer/actTrx.php',
			data:'act=ambil&id='+id,
			type:'POST',
			success: function(msg){
				$('#listDetailMhs').html(msg);
			}
		});
	});
	//end mahasiswa
	
	//trx
	$(document).on('change', '#jenisPembayaranTrx', function(){
		var id=$(this).val();
		$.ajax({
			url:'sideServer/actPembayaran.php',
			data:'act=ambilbiaya&id='+id,
			type:'POST',
			success: function(msg){
				$('#biayaTrx').val(msg);
			}
		});
	});
	
	
		var nirm=$('#nirmTrx').val();
		if(nirm==''){
			$('#namaTrx').attr('readonly', false);
		}
		else{
			$('#namaTrx').attr('readonly', true);
		}
		
		$(document).on('change', '#kategoriTrx', function(){
			var kat=$(this).val();
			if(kat=='cicilan'){
				$('#biayaTrx').attr('readonly', false);
			}
			else{
				$('#biayaTrx').attr('readonly', true);
			}
		});
	
		$(document).on('click', '#tomTambahTrx', function(){
			$('#notifTambahTrx').html('Loading..');
			var invoice=$('#invoice').val();
			var nirm=$('#nirmTrx').val();
			var nama=$('#namaTrx').val();
			var idPetugas=$('#idPetugasTrx').val();
			var kategori=$('#kategoriTrx').val();
			var idPembayaran=$('#jenisPembayaranTrx').val();
			var biaya=$('#biayaTrx').val();
			var denda=$('#dendaTrx').val();
			
			$.ajax({
				url:'sideServer/actTrx.php',
				data:'act=simpan&invoice='+invoice+'&nirm='+nirm+'&nama='+nama+'&idPetugas='+idPetugas+'&kategori='+kategori+'&biaya='+biaya+'&denda='+denda+'&idPembayaran='+idPembayaran,
				type:'POST',
				success: function(msg){
					$('#notifTambahTrx').html(msg);
					if(msg==1){
						$('#notifTambahTrx').html('');
						$("#tabelDetailTrx").load(location.href + " #tabelDetailTrx");
					}
				}
			});
		});
		
		$(document).on('click', '#tomHapusTrx', function(){
			$('#notifTambahTrx').html('Loading...');
			var id=$(this).attr('name');
			
			$.ajax({
				url:'sideServer/actTrx.php',
				data:'act=hapus&id='+id,
				type:'POST',
				success: function(msg){
					$('#notifTambahTrx').html(msg);
					if(msg==1){
						$('#notifTambahTrx').html('');
						$("#tabelDetailTrx").load(location.href + " #tabelDetailTrx");
					}
				}
			});
			
		});
		
		$(document).on('keyup', '#uangYangDibayar', function(){
			var uang=$(this).val();
			var totalBayar=$('#totalBayar').val();
			$('#kembali').html(uang-totalBayar);		
		});
		
		$(document).on('click', '#tomCetakTrx', function(){
			var invoice=$('#invoice').val();
			var nirm=$('#nirmTrx').val();
			var nama=$('#namaTrx').val();
			var idPetugas=$('#idPetugasTrx').val();
			var uangBayar=$('#uangYangDibayar').val();
			var kembali=$('#kembali').html();
			 window.open('sideServer/kwitansi.php?act=kwitansi&invoice='+invoice+'&nirm='+nirm+'&nama='+nama+'&idPetugas='+idPetugas+'&uangBayar='+uangBayar+'&kembali='+kembali)
			
		});
	//end trx
	
});