
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5><?=$title?> <i class="text-danger"><?=$this->session->flashdata('message');?></i> </h5>
                        <div class="ibox-tools">
							<button class="btn btn-primary btn-outline " data-toggle="modal" data-target="#modal-default" ><i class='fa fa-plus' ></i> Add New Data</button>
                        </div>
												
								<!-- MODAL ADD -->
											<form action='<?=site_url().'adm/proses_tahun_akademik'?>' method='post' >
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
																<?php $this->load->view('v_tambah_data_tahun_akademik');?>
																<div id='rest_error' ></div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary btn-outline " data-dismiss="modal">Close</button>
																<button  class="tambahkan btn btn-primary btn-outline ">Tambahkan</button>
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
									<th>Tahun Akademik</th>
									<th>Semester</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
						
							<?php
							$no=1;
							foreach ($datatahun as $row ){
							?>

							<!-- MODAL EDIT -->
										
							<div class="modal fade" id="ModalEdit<?=$row->id_thn?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Form Konfirmasi</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<form action='<?=site_url().'adm/aktivkan_ta'?>' method='post' >
													<input name='id_ta' hidden value='<?=$row->id_thn?>' >
													<?php if ($row->status_ta == "0"){?>
													<h3>Aktivkan Kembali</h3>
													<ul>
														<li>Apakah Anda ingin melakukan <b>pengaktivan</b> kembali pada tahun akademik ini?</li>
													</ul>
													<?php 
													}else{
													?>
													<h3>Non Aktivkan</h3>
													<ul>
														<li>Apakah anda Yakin akan <b>Menonaktivkan</b> Tahun Akademik ini</li>
													</ul>
													<?php
													}
													?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary  btn-outline " data-dismiss="modal">Close</button>
														<button <?php if ($row->status_ta == "1"){echo "hidden";};?> class="btn  btn-primary  btn-outline ">Aktivkan</button>
														</form>

														<form action='<?=site_url().'adm/nonaktivkan_ta'?>' method="post" >
																<input name='id_ta' hidden value='<?=$row->id_thn?>'  >
																
																<button <?php if ($row->status_ta == "0"){echo "hidden";};?> class="btn btn-danger btn-outline">Nonaktivkan</button>
														</form>
													</div> 
												</div>
											</div>
										</div>
									
								<!--END MODAL EDIT-->

								<tr style="cursor:pointer;cursor:hand;" class='edit-record' data-toggle="modal" data-target="#ModalEdit<?=$row->id_thn?>" >
									<td><?=$no++?></td>
									<td><?=$row->nama_ta;?></td>
									<td><?=$row->jen_semester;?></td>
									<td>
										<?php if ($row->status_ta == "1"){?>
										<span class="label label-info"><i class='fa fa-check' ></i></span>
										<?php
										}else{
										?>
										<span class="label label-danger"><i class='fa fa-times' ></i></span>
										<?php
										}
										?>
									</td>		
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

$("#get_semester").change(function(){
   
   // variabel dari nilai combo box provinsi
   var get_semester = $("#get_semester").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'c_combobox/getIdTaBySemester'?>",
	   data: "semester="+get_semester,
	   success: function(msg){
		  
			   $("#res_id_ta").html(msg);                                                     
	   }
   });    
});

$(document).ready(function(){
	$("#tambahkan").click(function(){
		var data = $('#form-data').serialize();
		$.ajax({
			type: 'POST',
			url: "<?=site_url().'adm/proses_tahun_akademik'?>",
			data: data,
			success: function() {
				$('#rest_error').html();
			}
		});
	});
});

</script>