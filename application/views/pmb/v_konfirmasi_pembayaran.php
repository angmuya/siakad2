<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h5>Konfirmasi Pembayaran </h5>
            </div>
                <div class="panel-body">
				<?=$this->session->flashdata('pesan')?>
				<fieldset>
			<div class='row' >
						<div class='col-md-12' >
							<label>Enter Kode Pembayaran *</label>
							<label id='kesalahan'></label>
								<form method='post' id='formKode'  >
									<div class="input-group m-b">
										<div class="input-group-prepend">
											<span class="input-group-addon"><i class="fa fa-key"></i></span>
										</div>
										
											<input id='no_pay' name='no_pay' type="text"  class="form-control" value='' required='required' >
											<button id='prosesKode' name='cari_kode_pembayaran' class='btn btn-primary' >Proses</button>
										
									</div>
								</form>
						
						</div>
						
						<div class='col-md-12' >
							<div id='result_code' >
								
							</div>						
						</div>

				</div>
			</div>
		</fieldset>
                </div>
				
        </div>
    </div>
</div>

<script>

$(function(){
    
    var prosesCode = document.querySelector('#prosesKode');
    
    prosesCode.addEventListener("click", function() {
        prosesCode.innerHTML = "Loading <span class='fa fa-spinner fa-spin' ></span>";
        prosesCode.classList.add('spinning');
        
      setTimeout( 
            function  (){  
                prosesCode.classList.remove('spinning');
                prosesCode.innerHTML = "Proses";
                
            }, 600);
    }, false);
    
});

   $(document).ready(function(){
		var loginForm = $('#formKode');
		var submitButton = $('#prosesKode');
		
		$("#formKode").on('submit',(e) => {
			e.preventDefault();
			var data = loginForm.serialize();	
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "<?=site_url().'admpmb/proses_konfirmasi'?>",
				data: data,
				success: function(msg){
						$("#result_code").html(msg);                                                     
				}
			}); 			
		});
   });

</script>
