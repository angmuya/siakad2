
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Data <?=$title?> <i class="text-danger"><?=$this->session->flashdata('message');?></i> </h5>
                        <div class="ibox-tools">
							<button class="btn btn-primary btn-outline " data-toggle="modal" data-target="#modal-default" >+ Add New Data</button>
                        </div>
												
								<!-- MODAL ADD -->
								<form action="<?=site_url().'adminController/proses_input_data_prodi'?>" method='POST' >
												<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="exampleModalLabel">Add New Data <?=$title?></h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<?php $this->load->view('v_tambah_data_prodi');?>
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
									<th>Nama Prodi</th>
									<th>Ketua Prodi</th>
									<th>Sekeretaris Prodi</th>	
									<th>FAKULTAS</th>	

								</tr>
							</thead>
							<tbody>
						
							<?php
							$no=1;
							foreach ($dataprodi as $row ){
							?>


								<!-- MODAL EDIT -->
										
								<div class="modal fade" id="ModalEdit<?=$row->kd_prodi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit Data <?=$title?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<form action='<?=site_url().'adminController/edit_data_prodi'?>' method='post' >
													<input name='kd_prodi' value='<?=$row->kd_prodi?>'  type='hidden' >
													
														<div class='row' >
															<div class="col-lg-6">
																<label>Nama Prodi *</label>
																	<div class="input-group m-b ">
																		<div class="input-group-prepend">
																			<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
																		</div>
																			<input name='nm_prodi' value='<?=$row->nm_prodi?>' type="text" placeholder="Nama Prodi" class="form-control" required='required'>
																	</div>
																<label>Nama Ketua Prodi *</label>
																	<div class="input-group m-b">
																		<div class="input-group-prepend">
																			<span class="input-group-addon"><i class="fa fa-user"></i></span>
																		</div>
																			<input name='ketua_prodi' type="text" placeholder="Nama Ketua Prodi" value='<?=$row->ketua_prodi?>' class="form-control " required='required' >
																	</div>
																<label>Nama Sekretaris *</label>
																	<div class="input-group m-b">
																		<div class="input-group-prepend">
																			<span class="input-group-addon"><i class="fa fa-users"></i></span>
																		</div>
																			<input name='sekretaris_prodi' type="text" placeholder="Nama Sekretaris prodi" value='<?=$row->sekretaris_prodi?>' class="form-control" required='required' >
																	</div>
															</div>
															<div class="col-lg-6">

															<div class="input-group m-b">
																	 <label>Nama Fakultas *</label>
																		<select name='kd_fakultas' data-placeholder="Fakultas a ..." class="chosen-select form-control"  required='required'>
																			<option selected disabled value='' > Select Fakultas </option>
																			<?php
																				$getdata = $this->m_admin->getDataTable('tb_fakultas');
																				foreach ($getdata as $rows){
																			?>
																			<option <?php if($row->kd_fakultas == $rows->kd_fakultas){echo "selected";}; ?> value='<?=$rows->kd_fakultas?>' ><?=$rows->nm_fakultas?></option>
																			<?php
																				};
																			?>
																		</select>
																	</div>

																	<label>Program Studi *</label>
																	<div class="input-group m-b">
																		<div class="input-group-prepend">
																			<span class="input-group-addon"><i class="fa fa-users"></i></span>
																		</div>
																		   <select name='p_studi' class='form-control' riquired='riquired' >
																				<option value='' selected disabled >Program Studi</option>
																				<option <?php if($row->p_studi == "D3"){echo "selected";}; ?>  value='D3' > D3 </option>
																				<option <?php if($row->p_studi == "S1"){echo "selected";}; ?> value='S1' > S1 </option>
																		   </select>
																	</div>

															</div>
														</div>

													<div class="modal-footer">
														<button type="button" class="btn btn-secondary  btn-outline " data-dismiss="modal">Close</button>
														<button class="btn  btn-primary  btn-outline ">Update</button>
														</form>

														<form action='<?=site_url().'adminController/delete_prodi'?>' method="post" >
																<input name="kd_prodi" hidden value='<?=$row->kd_prodi?>' >
																<button class="btn btn-danger btn-outline">Hapus</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									
								<!--END MODAL EDIT-->

								<tr style="cursor:pointer;cursor:hand;" data-toggle="modal" data-target="#ModalEdit<?=$row->kd_prodi?>" >
									<td><?=$no++?></td>
									<td><?=$row->nm_prodi.' ( '.$row->p_studi.' )';?></td>
									<td><?=$row->ketua_prodi;?></td>
									<td><?=$row->sekretaris_prodi;?></td>
									<td><?=$row->nm_fakultas;?></td>
						
								
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