
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Data <?=$title?></h5>
                        <div class="ibox-tools">
							<button class="btn btn-primary btn-outline " data-toggle="modal" data-target="#modal-default" >+ Add New Data</button>
                        </div>
												
								<!-- MODAL ADD -->
								<form action="<?=site_url().'adminPmbController/proses_input_data_posting'?>" method='post' >
												<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-xl" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="exampleModalLabel">Add New Data</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<?php $this->load->view('pmb/v_tambah_data_posting');?>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary btn-outline " data-dismiss="modal">Close</button>
																<button class="btn btn-primary btn-outline ">Tambahkan</button>
															</div>
														</div>
													</div>
												</div>
												</form>
										<!--END MODAL ADD-->
										
									  </div>
                    <div class="ibox-content">

                    <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example" >
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Category</th>
								</tr>
							</thead>
							<tbody>
												<!-- MODAL ADD -->
												
												<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-xl" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<?php $this->load->view('pmb/v_edit_data_posting');?>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary btn-outline " data-dismiss="modal">Close</button>
																<button class="btn btn-primary btn-outline ">Tambahkan</button>
															</div>
														</div>
													</div>
												</div>
											
										<!--END MODAL ADD-->
								<tr style="cursor:pointer;cursor:hand;" data-toggle="modal" data-target="#ModalEdit" >								
									<td>No</td>
									<td>Kode MK</td>
									<td>Nama MK</td>

								</tr>

							</tbody>
							<tfoot>
							</tfoot>
						</table>
                    </div>

                    </div>
                </div>
            </div>
            </div>
        </div>


<script>
   
    $("#semester").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_semester = $("#semester").val();
              
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?=site_url().'c_combobox'?>",
            data: "dil="+id_semester,
            success: function(msg){
               
                    $("#r").html(msg);                                                     
            }
        });    
    });

	$("#get_fakultas").change(function(){
   
   // variabel dari nilai combo box provinsi
   var fakultas = $("#get_fakultas").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'c_combobox/getProdiByFakultas'?>",
	   data: "kd_fakultas="+fakultas,
	   success: function(msg){
		  
			   $("#kd_prodi").html(msg);                                                     
	   }
   });    
});

$("#get_fakultas_edit").change(function(){
   
   // variabel dari nilai combo box provinsi
   var fakultas = $("#get_fakultas_edit").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'c_combobox/getProdiByFakultas'?>",
	   data: "kd_fakultas="+fakultas,
	   success: function(msg){
		  
			   $("#kd_prodi_edit").html(msg);                                                     
	   }
   });    
});



</script>

