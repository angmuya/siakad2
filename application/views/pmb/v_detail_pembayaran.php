<label><strong>Detail Calon Mahasiswa :</strong></label>
	<div class='table-responsive' >
		<table class='table table-striped' >
			<tr>
				<th>#</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th>Email</th>
			</tr>
			<?php
				if($cek == 'a'){
			?>
			<tr>
				<td colspan='5' align='center'><h3>Data Tidak Ditemukan...</h3></td>
			</tr>
			
			<?php
				}else{
			?>
			<span>Status : </span>
				<?php
				if ($pad->status <= "3"){
				?>
					<label name='button' class='label label-danger'>Belum Di Bayar</label>
				<?php
					}else{
						echo "<label name='button' class='label label-success'>Sudah di bayar</label>";
					}
				?>
			<tr>
				<td>1</td>
				<td><?=$pad->nama_mhs?></td>
				<td><?=$pad->nama_kelas_jenis?></td>
				<td><?=$pad->nm_prodi .' ('.$pad->p_studi .')'?></td>
				<td><?=$pad->email_mhs?></td>
			</tr>
				</table>
			<br>
			<span>
			<?php
				if ($pad->status <= "3"){
				?>
					<button id='konfirmasi_pembayaran' data-status='<?=$pad->status?>' data-id='<?=$pad->no_pendaftaran?>' class='btn btn-success'>Konfirmasi Pembayaran</button>
				<?php
					}
				?>
			
			</span>
			
			<?php
				}
			?>

	</div>
	
<script>

$(function(){
    
    var konfirmasi_pembayaran = document.querySelector('#konfirmasi_pembayaran');
    
    konfirmasi_pembayaran.addEventListener("click", function() {
        konfirmasi_pembayaran.innerHTML = "Loading <span class='fa fa-spinner fa-spin' ></span>";
        konfirmasi_pembayaran.classList.add('spinning');
        
      setTimeout( 
            function  (){  
                konfirmasi_pembayaran.classList.remove('spinning');
                konfirmasi_pembayaran.innerHTML = "Konfirmasi Pembayaran";
                
            }, 1000);
    }, false);
    
});

   $(document).ready(function(){
		
		$("#konfirmasi_pembayaran").click(function(){
			
			var pay = $(this).attr('data-id');
			var status = $(this).attr('data-status');
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?=site_url().'admpmb/proses_konfirmasi_pembayaran'?>",
				data: {no_pay:pay,status:status},
				success: function(msg){
						$("#result_code").html(msg);                                                     
				}
			}); 			
		});
   });

</script>