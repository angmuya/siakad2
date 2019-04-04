
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
													<?php $this->load->view('v_tambah_data_prodi');?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary  btn-outline " data-dismiss="modal">Close</button>
														<button class="btn  btn-primary  btn-outline ">Update</button>
														</form>

														<form action='<?=site_url().'adminController/delete_prodi'?>' method="post" >
																<input name="kd_prodi" hidden >
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

									<th>Nama Mahasiswa</th>
									<th>Jenis Kelamin</th>
									<th>Sekeretaris Prodi</th>	
									<th>FAKULTAS</th>	

								</tr>
							</thead>
							<tbody>
						
							<?php
							$no=1;
							foreach ($dataprodi as $row ){
							?>
								<tr style="cursor:pointer;cursor:hand;" class='edit-record' 
									data-kd_prodi='<?=$row->kd_prodi?>' 
									data-nm_prodi='<?=$row->nm_prodi?>' 
									data-ketua_prodi='<?=$row->ketua_prodi?>'
									data-sekretaris_prodi='<?=$row->sekretaris_prodi?>' 
									data-kd_fakultas='<?=$row->kd_fakultas?>'  

								data-toggle="modal" data-target="#ModalEdit" >
									<td><?=$no++?></td>
									<td><?=$row->nm_prodi;?></td>
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

<script>

$(function(){
            $(document).on('click','.edit-record',function(){
							var kdprodi = $(this).attr('data-kd_prodi');
							var nmprodi = $(this).attr('data-nm_prodi');
							var ketuaprodi = $(this).attr('data-ketua_prodi');
							var sekretarisprodi = $(this).attr('data-sekretaris_prodi');
							


                $("#ModalEdit").modal('show');
								$('[name="kd_prodi"]').val(kdprodi);
								$('[name="nm_prodi"]').val(nmprodi);
								$('[name="ketua_prodi"]').val(ketuaprodi);
								$('[name="sekretaris_prodi"]').val(sekretarisprodi);
								 
								$.post('<?=base_url('admin/latihan')?>',
                    			{id:$(this).attr('data-kd_fakultas')},
                   				 function(html){
                       			 $(".kd_fakultas").html(html);
                   				 }   
                );   
            });
		});
		
			
</script>

