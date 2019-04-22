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
								<form action="<?=site_url().'masterMenu/proses_input_data_grupmenu'?>" method='post' >
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
                                                                        <input value="<?=$id_rol?>" name='id_role' hidden type='text' >
																	<label>Grup Menu</label>
																		<div class="input-group m-b ">
																			<select name='grup_menu' data-placeholder="Select Grup Master" id='grup_menu' class='chosen-select form-control ' placehoder='Css Class' required>
																				<option selected disabled value=''>Select Grup Menu</option>
                                                                                <?php
            	                                                                    foreach ($datagrupselect as $ro){
                                                                                ?>
                                                                                    <option value='<?=$ro->nm_grup_menu?>'><?=$ro->nm_grup_menu?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
																			</select>
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
                                    
								</tr>
							</thead>
							<tbody>
						
							<?php
                            $no=1;
							foreach ($datagrup as $row ){
							?>

								<!-- MODAL EDIT -->
										
								<div class="modal fade" id="ModalEdit<?=$row->id_menu?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit Data Fakultas</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													
														<div class="modal-body">
														<form action='asas' method='get'>
															<div class='row' >
																<div class='col-sm-6' >
																	<label><h5>Grup Menu <?=$row->grup_name?></h5></label>
																	<?php
																	$wh['grup_id'] = $row->id_menu;
																	$menu = $this->db->get_where('tb_master_submenu',$wh);
																	foreach ($menu->result() as $rw){
																	?>
																	
																	<div class="i-checks"><label> <input type="checkbox" disabled="" checked=""> <i> </i> <?=$rw->sub_menu;?></div>
																	<?php
																	}
																	?>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															
															<button type="button" class="btn btn-secondary  btn-outline" data-dismiss="modal">Close</button>
															<a href='<?=site_url().'masterMenu/sub_menu/'.$row->id_menu.'/'.$row->grup_name.'/'.$row->urut_grup_master
															
															;?>' class='btn btn-warning btn-outline' >Setting Grup Menu <?=$row->grup_name?></a>
													</form>

															<form action='<?=site_url().'masterMenu/delete_grupmenu/'.$id_rol?>' method="post" >
																	<input name='id_menu' hidden value='<?=$row->id_menu?>'>
																	<button class="btn btn-danger btn-outline">Hapus</button>
															</form>
														</div>
												</div>
											</div>
										</div>
									
								<!--END MODAL EDIT-->

								<tr style="cursor:pointer;cursor:hand;" class='edit-record' 
								data-toggle="modal" data-target="#ModalEdit<?=$row->id_menu?>" >
                                    <td><?=$no++?></td>
									<td><?=$row->grup_name;?></td>
									<td><?=$row->css_class;?></td>
                                   
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
$("#grup_menu").change(function(){
   
   // variabel dari nilai 
   var grup_menu = $("#grup_menu").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'c_combobox/getCssClassByGrupName'?>",
	   data: "grup="+grup_menu,
	   success: function(msg){
		  
			   $("#css_class_o").html(msg);                                                     
	   }
   });    
});


</script>