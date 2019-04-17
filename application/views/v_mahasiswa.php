<br>
<div class='container' >
<div class='row' >
	<div class='col-lg-12' >
	<div class='ibox' >
		<div class='ibox-content' >		
										<!-- MODAL ADD -->
											<form action='<?=site_url().'admin/proses_input_data_mhs'?>' method='post' >
												<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="exampleModalLabel">FORMULIR PENDAFTARAAN MAHASISWA</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<?php $this->load->view('v_tambah_data_mahasiswa',['no_pen' => $no_pen]);?>
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

			<form action='<?=site_url('admin/mahasiswa/search')?>' method='post'>
				 <div class="input-group m-b">
					<select name='ta' class="form-control mr-sm-2" required>
					<option disabled selected value='' >Pilih Tahun Angakatan</option>
					<?php
					$datatahun = $this->m_admin->getDataTable('tb_thn_masuk');
					foreach ($datatahun as $res){
					?>
					<option <?php if(!empty($_POST['ta'])){ if ($res->thn_masuk == $_POST['ta'] ){echo "selected";}}; ?> ><?=$res->thn_masuk?></option>
					<?php
					};
					?>
					</select>
					<button class='btn btn-primary mr-sm-2' data-loading-text="Loading...." ><i class='fa fa-eye' ></i>Tampilkan</button>
			</form>
				
		<a href='#' class="btn btn-info " data-toggle="modal" data-target="#modal-default" ><i class='fa fa-plus'></i> Add New Data</a>
		</div>
		</div>

	</div>
		  </div>
		  </div>
		  </div>
		  
		  
<div class="wrapper wrapper-content animated fadeInRight">	
<div class="row">
                <div class="col-lg-12">
                <div class="panel panel-info ">
                    <div class="panel-heading">
                        <h5><?=$title?></h5>
					</div>

                    <div class="panel-body">

                    <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example" >
							<thead>
								<tr>
									<th>NIM</th>
									<th>Nama Mahasiswa</th>
									<th>TTL</th>
									<th>Gender</th>
									<th>Religion</th>
									
								</tr>
							</thead>
							<?php	
							foreach ($datamhs->result() as $row ){
							?>
							<tr>
									<td><?=$row->nim;?></td>
									<td><?=$row->nama_mhs;?></td>
									<td><?=$row->tp_lahir.' , '.substr($row->tgl_lahir,8).substr($row->tgl_lahir,4,-2).substr($row->tgl_lahir,0,-6);?></td>
									<td><?=$row->jenis_kelamin;?></td>
									<td><?=$row->agama;?></td>		
							</tr>									
							<?php
							}
							?>
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
	$("#get_fakultas").change(function(){
   
   // variabel dari nilai combo box provinsi
   var fakultas = $("#get_fakultas").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'c_combobox/getJurusanByFakultas'?>",
	   data: "kd_fakultas="+fakultas,
	   success: function(msg){
		  
			   $("#kd_prodi").html(msg);                                                     
	   }
   });    
});
</script>
		