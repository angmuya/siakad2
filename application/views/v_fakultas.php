        <script>
			function select_data($kd_fakultas,$nm_fakultas){
				$("#kd_fakultas").val($kd_fakultas);
				$("#nm_fakultas").val($nm_fakultas);
			}
        </script>
		
		<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Data Fakultas</h5>
                        <div class="ibox-tools">
							<button class="btn btn-primary" data-toggle="modal" data-target="#modal-default" >+ Add New Data</button>
                        </div>
						
						<div class="modal fade" id="modal-default">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<h2>Add New Data Fakultas</h2>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
							  </div>
							  <div class="modal-body">
								<form action="<?=site_url().'adminController/proses_input_data_fakultas'?>" method='POST' >
									<?php $this->load->view('v_tambah_data_fakultas');?>
							  </div>
							  <div class="modal-footer">
								<button class="btn btn-primary">PROSES</button>
								</form>
							  </div>
							</div>
							<!-- /.modal-content -->
						  </div>
						  <!-- /.modal-dialog -->
						</div>
						
						<div class="modal fade" id="modal-default2">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<h2>Rusak</h2>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
							  </div>
							  <div class="modal-body">
								<form action="<?=site_url().'adminController/proses_edit_data_fakultas'?>" method='POST' >
									<input type='hidden' name='kd_fakultas' id='hidden' >
									<input type='text' name='nm_fakultas' id='nm_fakultas' value='' class='form-control' >
							  </div>
							  <div class="modal-footer">
								<button class="btn btn-primary">PROSES</button>
								</form>
							  </div>
							</div>
							<!-- /.modal-content -->
						  </div>
						  <!-- /.modal-dialog -->
						</div>
                    </div>
                    <div class="ibox-content">

                    <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example" >
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Fakultas</th>
									<th>Dekan</th>
									<th>PD1</th>
									<th>PD2</th>
									<th>PD3</th>
									<th>PD4</th>
									<th>Kasubag Perkuliahan</th>
									<th>Kasubag Akademik</th>
									
								</tr>
							</thead>
							<tbody>
						
							<?php
							$no=1;
							foreach ($datafakultas as $row ){
							?>
								<tr style="cursor:pointer;cursor:hand;" onclick='select_data(
									<?=$row->kd_fakultas?>
									<?=$row->nm_fakultas?>
								)' data-toggle="modal" data-target="#modal-default2" >
									<td><?=$no++?></td>
									<td><?=$row->nm_fakultas;?></td>
									<td><?=$row->dekan;?></td>
									<td><?=$row->pd1;?></td>
									<td><?=$row->pd2;?></td>
									<td><?=$row->pd3;?></td>
									<td><?=$row->pd4;?></td>
									<td><?=$row->kasubag_perkuliahan;?></td>
									<td><?=$row->kasubag_akademik?></td>
						
								
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
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#ModalEdit").modal('show');
                $.post('<?=base_url().'admin/edit_fakultas'?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".edit-form").html(html);
                    }   
                );
            });
        });
		
</script>