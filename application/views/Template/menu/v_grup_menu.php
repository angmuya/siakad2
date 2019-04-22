
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Data <?=$title?></h5>  <i class="text-danger"><?=$this->session->flashdata('message');?></i>
                        <div class="ibox-tools">
							<button class="btn btn-primary btn-outline " data-toggle="modal" data-target="#modal-default" >+ Add New Data</button>
                        </div>
												
								<!-- MODAL ADD -->
								<form action="<?=site_url().'masterMenu/proses_input_data_se_grupmenu'?>" method='post' >
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
																	<div class='col-lg-12' >
                                                                       
																	<label>Grup Menu</label>
																		<div class="input-group m-b ">
																			<input name='nm_grup_menu' class='form-control' required >
																		</div>
																		
																	<label>Css Class</label>
																		<div class="input-group m-b ">
																			<input name='css_class' class='form-control' required >
																		</div>
																		
																	</div>																		
                                                                            <div id='css_class_o'>
																				
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

									  </div>
                    <div class="ibox-content">

                    <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example" >
							<thead>
								<tr>
									<th>No</th>
									<th>Grup</th>
                                    <th>Css Class</th>
                                    <th>Urutan</th>
                                    
								</tr>
							</thead>
							<tbody>
						
							<?php
                            $no=1;
							foreach ($datagrup as $row ){
							?>

								<!-- MODAL EDIT -->
										
								<div class="modal fade" id="ModalEdit<?=$row->id_grup?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit Data Fakultas</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													dasdsd
													</div>
													<div class="modal-footer">
														
														<button type="button" class="btn btn-secondary  btn-outline" data-dismiss="modal">Close</button>
														<button class="btn  btn-primary  btn-outline ">Update</button>
														</form>

														<form action='<?=site_url().'masterMenu/delete_grupm'?>' method="post" >
																<input name='id_menu'  value='<?=$row->id_grup?>'>
																<button class="btn btn-danger btn-outline">Hapus</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									
								<!--END MODAL EDIT-->

								<tr style="cursor:pointer;cursor:hand;" data-toggle="modal" data-target="#ModalEdit<?=$row->id_grup?>" >
                                    <td><?=$no++?></td>
									<td><?=$row->nm_grup_menu;?></td>
									<td><span class='fa <?=$row->css_class_grup;?>'></span></td>
                                    <td><?=$row->urut;?></td>
                                   
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

$("#oo").change(function(){
   
   // variabel dari nilai combo box provinsi
   var grup_menu = $("#oo").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().''?>",
	   data: "grup="+grup_menu,
	   success: function(msg){
		  
			   $("#00").html(msg);                                                     
	   }
   });    
});

</script>