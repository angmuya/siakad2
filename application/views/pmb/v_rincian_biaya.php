
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><?=$title?></h5>
                        <div class="ibox-tools">
							<button class="btn btn-primary btn-outline " data-toggle="modal" data-target="#modal-default" >+ Add New Data</button>
                        </div>
												
								<!-- MODAL ADD -->
								<form action="" method='POST' >
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
																<div class='row' >
																	<div class="col-md-12">
																	<label>Jenis Biaya *</label>
																		<div class="input-group m-b ">
																		<label></label>
																			<div class="input-group-prepend">
																				<span class="input-group-addon"><i class="fa fa-university"></i></span>
																			</div>
																				<input name='jenis_biaya' type="text" placeholder="Jenis Biaya" class="form-control" required='required'>
																		</div>

																		<label>Jumlah Biaya *</label>
																		<div class="input-group m-b">
																			<div class="input-group-prepend">
																				<span class="input-group-addon"><i class="fa fa-user"></i></span>
																			</div>
																				<input name='jumlah_biaya' type="text" placeholder="Jumlah Biaya" class="form-control " required='required' >
																		</div>
																		
																		<label>Kelas Jenis *</label>
																		<div class="input-group m-b">
																			<div class="input-group-prepend">
																				<span class="input-group-addon"><i class="fa fa-user"></i></span>
																			</div>
																			<select name='jenis_kelas' class='form-control' required>
																				<option value='' selected disabled >Select Jenis Kelas</option>
																				<?php
																			
																				foreach ($datakelas as $roow){
																				?>
																				 <option  value='<?=$roow->kode_kelas_jenis?>' ><?=$roow->nama_kelas_jenis?></option>
																				<?php
																					};
																				?>
																			</select>
																		</div>
																	</div>

																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary btn-outline " data-dismiss="modal">Close</button>
																<button name='tambahkan_rincian' class="btn btn-primary btn-outline ">Tambahkan</button>
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
														<h5 class="modal-title" id="exampleModalLabel">Rincian Biaya</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<form action='<?=site_url().'adminController/edit_data_fakultas'?>' method='post' >
													<input name='id_fakultas' hidden >
													<div id='res_edit' ></div>
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
									<th>Jenis Kelas</th>									
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($datakelas as $view){
								?>
								<tr style="cursor:pointer;cursor:hand;" class='edit-record' id-kelas='<?=$view->kode_kelas_jenis?>'  data-toggle="modal" data-target="#ModalEdit" >
								
									<td><?=$no++?></td>
									<td><?=$view->nama_kelas_jenis?></td>
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

        $(function(){
            $(document).on('click','.edit-record',function(){
				var id_kelas = $(this).attr('id-kelas');
				
				$.ajax({
					type: "POST",
					dataType: "html",
					url : "<?=base_url().'admpmb/getRincianBiayaById'?>",
					data: {id_kelas:id_kelas},
					success: function(msg){
						
						 $("#ModalEdit").modal('show');
							$('#res_edit').html(msg);
						
					}
					
				});
				
               
            });
        });

</script>