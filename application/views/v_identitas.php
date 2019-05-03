<div class="wrapper wrapper-content animated fadeInDown">	
<div class="row">
                <div class="col-lg-12">
                <div class="panel panel-info ">
                    <div class="panel-heading">
                        <h5><?=$title?></h5>
						
					</div>

                    <div class="panel-body">
						<div class='float-right' >
							<button id='EditBtn' class='btn btn-default btn-circle '><span class='fa fa-edit' ></span></button>
							 <button id='batal' class='btn btn-default  btn-circle '><span class='fa fa-times' ></span></button>
						
						</div>
						<div id='res' >
								</div>
					</br>
					<br>
						<div class='row' id='form_data' >
						
						<div class="col-lg-6">
							<label>Nama Pendek (Alias) *</label>
								<div class="input-group m-b">
									<div class="input-group-prepend">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>
										<input name='nama_pendek' type="text" onkeyup='this.value = this.value.toUpperCase();'  class="form-control" value='<?=strtoupper($res->nama_singkat)?>' required='required' >
								</div>
								
								<label>Nama Panjang</label>
								<div class="input-group m-b">
									<div class="input-group-prepend">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>
										<input name='nama_lengkap' onkeyup='this.value = this.value.toUpperCase();'  type="text" class="form-control" value='<?=strtoupper($res->nama_panjang)?>' required='required' >
								</div>
								
							
						</div>
						<div class="col-lg-6">
								<label>Tahun Berdiri *</label>
									<div class="input-group m-b">
										<div class="input-group-prepend">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
											<input name='thn_berdiri' type="text"  class="form-control" value='<?=strtoupper($res->thn_berdiri)?>' placeholder='Tahun Berdiri' required='required' >
									</div>
						</div>
						
						
							<div class='col-lg-12'>	
								<label>Alamat *</label>
								<div class="input-group m-b">
									<div class="input-group-prepend">
										<span class="input-group-addon"><i class="fa fa-map"></i></span>
									</div>
										<input name='a_jalan' type="text" onkeyup='this.value = this.value.toUpperCase();'  class="form-control" value='<?=strtoupper($res->alamat)?>' placeholder='Nama Jalan' required='required' > &nbsp; &nbsp;
										<input name='a_kel' type="text" onkeyup='this.value = this.value.toUpperCase();'  class="form-control col-lg-4" value='<?=strtoupper($res->kel)?>' placeholder='Kelurahan' required='required' > &nbsp; 
								</div>
								<div class="input-group m-b">
										<input name='a_kec' type="text" onkeyup='this.value = this.value.toUpperCase();'  class="form-control" value='<?=strtoupper($res->kec)?>' placeholder='Kecamatan' required='required' > &nbsp; &nbsp;
										<input name='a_kota' type="text" onkeyup='this.value = this.value.toUpperCase();'  class="form-control" value='<?=strtoupper($res->kota)?>' placeholder='Kab / Kota' required='required' > &nbsp; &nbsp;
								</div>
								<div class="input-group m-b">
										<input name='a_prov' type="text" onkeyup='this.value = this.value.toUpperCase();'  class="form-control" value='<?=strtoupper($res->prov)?>' placeholder='Provinsi' required='required' > &nbsp; &nbsp;
									<div class="input-group-prepend">
										<span class="input-group-addon"><i>+62</i></span>
									</div>
										<input name='no_hp' type="text"  class="form-control col-lg-6" value='<?=strtoupper($res->no_tlp)?>' placeholder='No Tlp / Hp' required='required' >
								</div>
								
							  <button id='uptdBtn' class='btn btn-success float-right '>Update</button>
						</div>
						
						</div>

                    </div>
                </div>
            </div>
            </div>
</div>


<script>

$('#EditBtn').click(function(){
	$('.form-control').prop('disabled',false);
	$('#uptdBtn').show();
	$('#EditBtn').hide();
	$('#batal').show();
});

$('#batal').click(function(){
	$('.form-control').prop('disabled',true);
	$('#uptdBtn').hide();
	$('#EditBtn').show();
	$('#batal').hide();
});

$('.form-control').prop('disabled',true);
$('#uptdBtn').hide();
$('#batal').hide();
 $(function(){
    
    var loginBtn = document.querySelector('#uptdBtn');
    
    loginBtn.addEventListener("click", function() {
        loginBtn.innerHTML = "<span class='fa fa-spinner fa-spin' ></span> Loading ...";
        loginBtn.classList.add('spinning');
        
      setTimeout( 
            function  (){  
                loginBtn.classList.remove('spinning');
                loginBtn.innerHTML = "Update";
                
            }, 600);
    }, false);
    
});

	$("#uptdBtn").click(function(){
   
   // variabel dari nilai combo box provinsi
   var nama_pendek = $('[name="nama_pendek"]').val();
   var nama_lengkap = $('[name="nama_lengkap"]').val();
   var thn_berdiri = $('[name="thn_berdiri"]').val();
   var a_jalan = $('[name="a_jalan"]').val();
   var a_kel = $('[name="a_kel"]').val();
   var a_kec = $('[name="a_kec"]').val();
   var a_kota = $('[name="a_kota"]').val();
   var a_prov = $('[name="a_prov"]').val();
   var no_hp = $('[name="no_hp"]').val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'admin/UpdateDataIdentitas'?>",
	   data: {
		   nama_pendek:nama_pendek,
		   nama_lengkap:nama_lengkap,
		   thn_berdiri:thn_berdiri,
		   a_jalan:a_jalan,
		   a_kel:a_kel,
		   a_kec:a_kec,
		   a_kota:a_kota,
		   a_prov:a_prov,
		   no_hp:no_hp,
		   
		   },
	   success: function(msg){
				
				$('.form-control').prop('disabled',true);			   
			   	$('#EditBtn').show(); 
			   	$('#batal').hide(); 
				$('#uptdBtn').hide();
				$("#res").html(msg);				
	   }
   });    
});
</script>