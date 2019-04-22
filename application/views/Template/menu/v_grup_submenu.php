
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
								<form action="<?=site_url().'masterMenu/proses_input_data_se_submenu'?>" method='post' >
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
																			<select name='grup_menu' data-placeholder="Select Grup Master" id='send_id_gru' class='form-control ' placehoder='Css Class' required>
																				<option selected disabled value=''>Select Grup Menu</option>
																				<?php
																				$datagrupme = $this->db->get('tb_se_grup_menu')->result();
																					foreach ($datagrupme as $r ){
																				?>
																				
																				<option  value='<?=$r->id_grup?>'><?=$r->nm_grup_menu?></option>
																				<?php
																					}
																				?>
                                                                            
																			</select>
																		</div>

																		<label>Nama Sub Menu *</label>
																		<div class="input-group m-b ">
																			<input class='form-control' name='sub_menu' type='text' placeholder='Enter Sub Menu' required  >
																		</div>
																		
																	</div>																		
																

																<div class='col-lg-6' >
																		<label>Link URL *</label>
																		<div class="input-group m-b ">
																			<input class='form-control' name='link_url' type='text' placeholder='Enter link url' required  >
																		</div>
																		<div id='res_no_urut' > </div>
																		
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
									<th>Sub Menu</th>
                                    <th>Link Url</th>
                                    <th>Urutan</th>
									<th>Grup Menu</th>
									<th>Urutan Grup Menu</th>
                                    
								</tr>
							</thead>
							<tbody>
						
							<?php
                            $no=1;
							foreach ($datasubmenu as $row ){
							?>

								<!-- MODAL EDIT -->
										
								<div class="modal fade" id="ModalEdit<?=$row->nama_submenu?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
														<a href='<?=site_url().'masterMenu/sub_menu/'.$row->id_menu.'/'.$row->grup_name;?>' class='btn btn-warning btn-outline' >Setting Grup Menu</a>
														<button class="btn  btn-primary  btn-outline ">Update</button>
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
								data-toggle="modal" data-target="#ModalEdit<?=$row->nama_submenu?>" >
                                    <td><?=$no++?></td>
									<td><?=$row->nama_submenu;?></td>
									<td><a href='<?=base_url().$row->link_url?>'><?=$row->link_url;?></a></td>
                                    <td><?=$row->urutan_menu;?></td>
									<td><?=$row->nm_grup_menu;?></td>
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

$("#send_id_gru").change(function(){
   
   // variabel dari nilai combo box provinsi
   var grup_menu = $("#send_id_gru").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'comboboxController/getIdNoUrut'?>",
	   data: "grup_id_res="+grup_menu,
	   success: function(msg){
		  
			   $("#res_no_urut").html(msg);                                                     
	   }
   });    
});

</script>