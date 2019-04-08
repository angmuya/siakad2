<br>
<form method='get' action='mahasiswa'>
	<div class="input-group">
		<input type="text" name='search' class="form-control-lg"> <span class="input-group-append"> 
		<button class="btn btn-primary">Go!</button>
	</span>
</div>
</form>

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
								<form action="<?=site_url().'adminController/proses_input_data_mhs'?>" method='get' >
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
																<?php $this->load->view('v_tambah_data_mahasiswa');?>
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
													<form action='<?=site_url().'adminController/edit_data_prodi'?>' method='post' >
													<input name='kd_prodi' type='hidden' >
													<?php $this->load->view('v_tambah_data_mahasiswa');?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary  btn-outline " data-dismiss="modal">Close</button>
														<button class="btn  btn-primary  btn-outline ">Update</button>
														</form>

														<form action='<?=site_url().'adminController/delete_mhs'?>' method="post" >
																<input name="id_nim" hidden >
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
									<th>nim</th>
									<th>Nama Mahasiswa</th>
									<th>TTL</th>
									<th>Jenis Kelamin</th>	
									<th>Region</th>	

								</tr>
							</thead>
							<tbody>
						
							<?php
							
							foreach ($datamhs as $row ){
							?>
								<tr style="cursor:pointer;cursor:hand;" class='edit-record' 
									data-id_mhs='<?=$row->nim?>'  

								data-toggle="modal" data-target="#ModalEdit" >
									<td><?=$row->nim;?></td>
									<td><?=$row->nama_mhs;?></td>
									<td><?=$row->tp_lahir.' , '.substr($row->tgl_lahir,8).substr($row->tgl_lahir,4,-2).substr($row->tgl_lahir,0,-6);?></td>
									<td><?=$row->jenis_kelamin;?></td>
									<td><?=$row->agama;?></td>
						
								
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


