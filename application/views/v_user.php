
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
								<form action="<?=site_url().'adminController/proses_input_data_user'?>" method='POST' >
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
																<?php $this->load->view('v_tambah_data_user');?>
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
														<h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													Data Ini Tidak Bisa Di Ubah, Hanya Bisa Di Hapus, Apakah Anda Akan menghapus?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary  btn-outline " data-dismiss="modal">TIDAK</button>
														</form>

														<form action='<?=site_url().'adminController/delete_fakultas'?>' method="post" >
																<input name='id_fakultas' hidden >
																<input name='nama_fakultas' hidden>
																<button class="btn btn-danger btn-outline">YA, TENTU</button>
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
									<th>Username</th>
									<th>Nama User</th>
									<th>Surel</th>
									<th>Phone</th>
									<th>Role</th>									
								</tr>
							</thead>
							<tbody>
						
							<?php
							$no=1;
							foreach ($resuser as $row ){
							?>
								<tr style="cursor:pointer;cursor:hand;" class='edit-record' 
								data-toggle="modal" data-target="#ModalEdit" >
									<td><?=$no++?></td>
									<td><?=$row->user_name;?></td>
									<td><?=$row->nama_user;?></td>
									<td><?=$row->email;?></td>	
									<td><?=$row->phone;?></td>
									<td><?=$row->nama_role;?></td>										
								
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
							var id_fakultas = $(this).attr('data-id');
							var nm_fakultas = $(this).attr('data-fak');
							var dekan = $(this).attr('data-dekan');
							var pd1 = $(this).attr('data-pd1');
							var pd2 = $(this).attr('data-pd2');
							var pd3 = $(this).attr('data-pd3');
							var pd4 = $(this).attr('data-pd4');
							var bag_kul = $(this).attr('data-bag_perkuliahan');
							var bag_ak = $(this).attr('data-bag_akademik');

                $("#ModalEdit").modal('show');
								$('[name="id_fakultas"]').val(id_fakultas);
								$('[name="nama_fakultas"]').val(nm_fakultas);
								$('[name="nama_dekan"]').val(dekan);
								$('[name="pd1"]').val(pd1);
								$('[name="pd2"]').val(pd2);
								$('[name="pd3"]').val(pd3);
								$('[name="pd4"]').val(pd4);
								$('[name="kasubag_perkuliahan"]').val(bag_kul);
								$('[name="kasubag_akademik"]').val(bag_ak);
            });
        });

</script>