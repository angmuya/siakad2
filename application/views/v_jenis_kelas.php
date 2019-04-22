
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><?=$title?> <i class="text-danger"><?=$this->session->flashdata('message');?></i> </h5>
                        <div class="ibox-tools">
							<button class="btn btn-primary btn-outline " data-toggle="modal" data-target="#modal-default" ><i class='fa fa-plus' ></i> Add New Data</button>
                        </div>
												
								<!-- MODAL ADD -->
											<form action='<?=site_url().'adm/proses_tahun_akademik'?>' method='post' >
												<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="exampleModalLabel">Add New Data</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<?php $this->load->view('v_tambah_data_tahun_akademik');?>
																<div id='rest_error' ></div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary btn-outline " data-dismiss="modal">Close</button>
																<button  class="tambahkan btn btn-primary btn-outline ">Tambahkan</button>
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
									<th>Jenis Kelas</th>
									<th>Fakultas</th>
								</tr>
							</thead>
							<tbody>
						
							<?php
							$no=1;
							foreach ($data_jenis_kelas as $row ){
							?>

							<!-- MODAL EDIT -->
										
							<div class="modal fade" id="ModalEdit<?=$row->kode_kelas_jenis;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Form Konfirmasi</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<form action='<?=site_url().'adm/aktivkan_ta'?>' method='post' >
													<input name='id_ta'  value='<?=$row->kode_kelas_jenis;?>' >
													
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary  btn-outline " data-dismiss="modal">Close</button>
														<button class="btn  btn-primary  btn-outline ">Aktivkan</button>
														</form>

														<form action='<?=site_url().'adm/hapus_jenis_kelas'?>' method="post" >
																<input name='id_jenis_kelas' value='<?=$row->kode_kelas_jenis;?>'>
																
																<button  class="btn btn-danger btn-outline">Hapus</button>
														</form>
													</div> 
												</div>
											</div>
										</div>
									
								<!--END MODAL EDIT-->

								<tr style="cursor:pointer;cursor:hand;" class='edit-record' data-toggle="modal" data-target="#ModalEdit<?=$row->kode_kelas_jenis;?>" >
									<td><?=$no++?></td>
									<td><?=$row->nama_kelas_jenis;?></td>
									<td><?=$row->kd_prodi;?></td>		
								</tr>
							<?php
							}
							?>
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

$("#get_semester").change(function(){
   
   // variabel dari nilai combo box provinsi
   var get_semester = $("#get_semester").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'c_combobox/getIdTaBySemester'?>",
	   data: "semester="+get_semester,
	   success: function(msg){
		  
			   $("#res_id_ta").html(msg);                                                     
	   }
   });    
});

$(document).ready(function(){
	$("#tambahkan").click(function(){
		var data = $('#form-data').serialize();
		$.ajax({
			type: 'POST',
			url: "<?=site_url().'adm/proses_tahun_akademik'?>",
			data: data,
			success: function() {
				$('#rest_error').html();
			}
		});
	});
});

</script>