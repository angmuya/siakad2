
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><?=$title?></h5>
                        <div class="ibox-tools">
							<button class="btn btn-primary btn-outline " data-toggle="modal" data-target="#modal-default" ><i class='fa fa-plus' ></i> Add New Data</button>
                        </div>
												
								<!-- MODAL ADD -->
								<form action="<?=site_url().'adminMasterController/proses'?>" method='get' >
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

										<!-- MODAL EDIT -->
										
										<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit Data Fakultas</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<form action='<?=site_url().'adminController/edit_data_fakultas'?>' method='post' >
													<input name='id_fakultas' hidden >
													<?php $this->load->view('v_tambah_data_fakultas');?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary  btn-outline " data-dismiss="modal">Close</button>
														<button class="btn  btn-primary  btn-outline ">Update</button>
														</form>

														<form action='<?=site_url().'adminController/delete_fakultas'?>' method="post" >
																<input name='id_fakultas' hidden >
																<input name='nama_fakultas' hidden>
																<button class="btn btn-danger btn-outline">Hapus</button>
														</form>
													</div> 
												</div>
											</div>
										</div>
									
								<!--END MODAL EDIT-->
                  
									
									  </div>
                    <div class="ibox-content">

                    <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example" >
							<thead>
								<tr>
									<th>No</th>
									<th>Tahun Akademik</th>
									<th>Semester</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
						
							<?php
							$no=1;
							foreach ($datatahun as $row ){
							?>
								<tr style="cursor:pointer;cursor:hand;" class='edit-record' data-toggle="modal" data-target="#ModalEdit" >
									<td><?=$no++?></td>
									<td><?=$row->nama_ta;?></td>
									<td><?=$row->jen_semester;?></td>
									<td>
										<?php if ($row->status_ta == "1"){?>
										<span class="label label-info"><i class='fa fa-check' ></i></span>
										<?php
										}else{
										?>
										<span class="label label-danger"><i class='fa fa-times' ></i></span>
										<?php
										}
										?>
									</td>		
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

</script>