
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Data <?=$title.' - '.$sub_menu_grup?> </h5> <i class="text-danger"><?=$this->session->flashdata('message');?></i>
                        <div class="ibox-tools">
							<button class="btn btn-primary btn-outline " data-toggle="modal" data-target="#modal-default" >+ Add New Data</button>
                        </div>
												
								<!-- MODAL ADD -->
								<form action="<?=site_url().'masterMenu/proses_input_data_submenu'?>" method='post' >
												<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="exampleModalLabel">Add New Data <?=$title.' - '.$sub_menu_grup?> </h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class='row'>
																	<div class='col-lg-12' >
                                                                        <input value="<?=$id_submenu?>" name='id_submenu' hidden type='text' >
																		<input value="<?=$sub_menu_grup?>" name='name_grup' hidden type='text' >
																	<label>Sub Menu</label>
																		<div class="input-group m-b ">
																			<div class="input-group-prepend">
																				<span class="input-group-addon"><i class="fa fa-university"></i></span>
																			</div>
																			<select name='id' id='get_link' class='form-control ' placehoder='Css Class' required>
																				<option selected disabled value=''>Select sub_menu</option>
                                                                                <?php
                                                                                foreach ($datasubselect as $ro){
                                                                                ?>
                                                                                    <option value='<?=$ro->id_submenu?>'><?=$ro->nama_submenu?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
																			</select>
																		</div>
																		
																	</div>
                                                                            <div id='link_result'>
																				
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
													ssd
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
									<th>No</th>
									<th>Sub Menu</th>
                                    <th>Page</th>
                                    
								</tr>
							</thead>
							<tbody>
						
							<?php
                            $no=1;
							foreach ($datasubmenu as $row ){
							?>
								<tr>
                                    <td><?=$no++?></td>
									<td><?=$row->sub_menu;?></td>
									<td><?=$row->link;?></td>
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

$("#get_link").change(function(){
   
   // variabel dari nilai combo box provinsi
   var get_link = $("#get_link").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'c_combobox/getLinkBySubmenu'?>",
	   data: "get_link="+get_link,
	   success: function(msg){
		  
			   $("#link_result").html(msg);                                                     
	   }
   });    
});

</script>