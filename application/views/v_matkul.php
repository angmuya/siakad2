
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
								<form action="<?=site_url().'adminController/proses_input_data_matkul'?>" method='POST' >
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
																<?php $this->load->view('v_tambah_data_matkul');?>
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
										
										
                  
									
									  </div>
                    <div class="ibox-content">

                    <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example" >
							<thead>
								<tr>
									<th>No</th>
									<th>Kode MK</th>
									<th>Nama MK</th>
									<th>Semester</th>
									<th>Tahun</th>
									
								</tr>
							</thead>
							<tbody>
						
							<?php
							$no=1;
							foreach ($datamatkul as $row ){
							?>
								<!-- MODAL EDIT -->
																		
									<div class="modal fade" id="ModalEdit<?=$row->kd_mk;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit Data Fakultas</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<form action='<?=site_url().'adminController/edit_data_matkul'?>' method='post' >
														<input name='id_mk' hidden value='<?=$row->id_mk?>' type='text' >
															<div class="row">
																<div class="col-lg-6">
																  <label>Nama Matkul *</label>
																	<div class="input-group m-b">
																	   <div class="input-group-prepend">
																			<span class="input-group-addon"><i class="fa fa-book"></i></span>
																	   </div>
																			<input name='nm_matkul' type="text" placeholder="Nama Mata Kuliah" value='<?=$row->nm_mk?>' class="form-control" required='required' >
																	</div>
																	<label>Semester *</label>
																	<div class="input-group m-b">
																	   <div class="input-group-prepend">
																			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
																	   </div>
																		   <select name='semester' id='semester' class="select2 form-control" required='required'>
																				<option disabled selected  value='' >Select Semester...</option>
																				<option <?php if($row->semester == 'Ganjil'){echo "selected";};?> value='Ganjil' >Ganjil</option>
																				<option <?php if($row->semester == 'Genap'){echo "selected";};?> value='Genap' >Genap</option>
																		   </select>

																		   <select name='smt' class="select2 form-control col-lg-3" required='required'>
																				 <option disabled selected value='' >Ke...</option>
																			   <?php
																				for ($i=1;$i<=8;$i++){
																			   ?>
																				<option <?php if($row->smt == $i){echo "selected";}; ?> value='<?=$i?>' ><?=$i?></option>
																			   <?php
																					 };
																			   ?>
																		   </select>
																	</div>
																	<label>Nama Fakultas *</label>
																	<div class="input-group m-b">
																	   <div class="input-group-prepend">
																			<span class="input-group-addon"><i class="fa fa-industry"></i></span>
																	   </div>
																			 <select name='kd_fakultas' id="get_fakultas_edit" class="select2 form-control" required='required'>
																		<option selected disabled  value=''>---Select Fakultas---</option>
																		<?php
																			$getdata = $this->m_admin->getDataTable('tb_fakultas');
																			foreach ($getdata as $rows){
																		?>
																		 <option <?php if($row->kd_fakultas == $rows->kd_fakultas ){echo "selected";}; ?> value='<?=$rows->kd_fakultas?>' ><?=$rows->nm_fakultas?></option>
																		<?php
																			};
																		?>
																	</select>
																	</div>
																 </div>
																 <div class='col-lg-6' >
																	<label>Nama Program Studi *</label>
																	<div class="input-group m-b">
																	   <div class="input-group-prepend">
																			<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
																	   </div>
																	   <select name='kd_prodi' id="kd_prodi_edit" class="select2 form-control" required='required'>
																		<option selected disabled  value=''>---Select Prodi---</option>
																		<?php
																			$getdata = $this->m_admin->getDataTable('tb_prodi');
																			foreach ($getdata as $roow){
																		?>
																		 <option <?php if($row->kd_prodi == $roow->kd_prodi ){echo "selected";}; ?> value='<?=$roow->kd_prodi?>' ><?=$roow->nm_prodi?></option>
																		<?php
																			};
																		?>
																	</select>
																	</div>
																	<label>Nama Dosen *</label>
																	<div class="input-group m-b">
																	   
																	   <select name='nip' data-placeholder="Select" class="chosen-select form-control"  style="width:350px;" tabindex="13" required='required'>
																	   
																		<?php
																			$getdata = $this->m_admin->getDataTable('tb_mahasiswa');
																			foreach ($getdata as $ro){
																		?>
																		 <option <?php if($row->NIP == $ro->nim ){echo "selected";} ?> value='<?=$ro->nim?>' ><?=$ro->nim.':: '.$ro->nama_mhs?></option>
																		<?php
																			};
																		?>
																	</select>
																	</div>
																</div>
															</div>

													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary  btn-outline" data-dismiss="modal">Close</button>
														<button class="btn  btn-primary  btn-outline ">Update</button>
														</form>

														<form action='<?=site_url().'adminController/delete_matkul'?>' method="post" >
																<input name='kd_mk' hidden value='<?=$row->kd_mk;?>'  >
																<button class="btn btn-danger btn-outline">Hapus</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									
								<!--END MODAL EDIT-->

								<tr style="cursor:pointer;cursor:hand;" data-toggle="modal" data-target="#ModalEdit<?=$row->kd_mk;?>" >
									<td><?=$no++?></td>
									<td><?=$row->kd_mk;?></td>
									<td><?=$row->nm_mk;?></td>
									<td><?=$row->semester.' ( '.$row->smt.' )'?></td>
                                    <td><?=$row->tahun_k;?></td>
						
								
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
   
    $("#semester").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_semester = $("#semester").val();
              
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?=site_url().'c_combobox'?>",
            data: "dil="+id_semester,
            success: function(msg){
               
                    $("#r").html(msg);                                                     
            }
        });    
    });

	$("#get_fakultas").change(function(){
   
   // variabel dari nilai combo box provinsi
   var fakultas = $("#get_fakultas").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'c_combobox/getProdiByFakultas'?>",
	   data: "kd_fakultas="+fakultas,
	   success: function(msg){
		  
			   $("#kd_prodi").html(msg);                                                     
	   }
   });    
});

$("#get_fakultas_edit").change(function(){
   
   // variabel dari nilai combo box provinsi
   var fakultas = $("#get_fakultas_edit").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'c_combobox/getProdiByFakultas'?>",
	   data: "kd_fakultas="+fakultas,
	   success: function(msg){
		  
			   $("#kd_prodi_edit").html(msg);                                                     
	   }
   });    
});



</script>

