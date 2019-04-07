
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
								<form action="<?=site_url().'masterMenu/proses_input_grupmenu'?>" method='get' >
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
																<div class='row'>
																	<div class='col-lg-6' >
																	<label>Grup Menu</label>
																		<div class="input-group m-b ">
																			<div class="input-group-prepend">
																				<span class="input-group-addon"><i class="fa fa-university"></i></span>
																			</div>
																			<select name='grup_menu' class='form-control ' placehoder='Css Class' required>
																				<option value=''>Select Grup Menu</option>
																			</select>
																		</div>
																		
																	</div>
																	<div class='col-lg-6' >
																	<label>Css Class</label>
																		<div class="input-group m-b ">
																			<div class="input-group-prepend">
																				<span class="input-group-addon"><i class="fa fa-university"></i></span>
																			</div>
																				<input name='css_class' type="text" placeholder="Css Class" class="form-control" required='required'>
																		</div>
																	</div>
																</div>
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
													<form action='<?=site_url().'adminController/edit_data_matkul'?>' methode='get' >
													<input name='id_fakultas' type='hidden' >
													<?php $this->load->view('v_tambah_data_matkul');?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary  btn-outline" data-dismiss="modal">Close</button>
														<button class="btn  btn-primary  btn-outline ">Update</button>
														</form>

														<form action='<?=site_url().'adminController/delete_matkul'?>' method="post" >
																<input name='kd_mk'  >
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
									<th>Kode Role</th>
									<th>Nama Role</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>
						
							<?php
							foreach ($datares as $row ){
							?>
								<tr>

									<td><?=$row->id_role;?></td>
									<td><?=$row->nama_role;?></td>
                                    <td> <a href='<?=site_url().'masterMenu/setting_role/'.strtolower($row->id_role);?>' class='btn btn-primary btn-outline' > Setting Role Menu </a> </td>
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
							var kd_mk = $(this).attr('data-kd_mk');
							var semester = $(this).attr('data-semester');


                $("#ModalEdit").modal('show');
								$('[name="kd_mk"]').val(kd_mk);

            });
        });

</script>