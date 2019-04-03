<div class="col-sm-12">
    <div class="input-group m-b ">
        <div class="input-group-prepend">
            <span class="input-group-addon"><i class="fa fa-university"></i></span>
        </div>
			<input name='nm_prodi' type="text" placeholder="Nama Prodi" class="form-control" required='required'>
    </div>
	
	<div class="input-group m-b">
        <div class="input-group-prepend">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
        </div>
			<input name='ketua_prodi' type="text" placeholder="Nama Ketua Prodi" class="form-control " required='required' >
    </div>
	
	<div class="input-group m-b">
        <div class="input-group-prepend">
            <span class="input-group-addon"><i class="fa fa-users"></i></span>
        </div>
			<input name='sekretaris_prodi' type="text" placeholder="Nama Sekretaris prodi" class="form-control" required='required' >
    </div>
    <div class="input-group m-b">
        <div class="input-group-prepend">
            <span class="input-group-addon"><i class="fa fa-users"></i></span>
        </div>
	<select name='kd_fakultas' class="select2 form-control" required='required'>
        <option value=''>---Silahkan Pilih Fakultas---</option>
        <?php
            $getdata = $this->m_admin->getDataFakultas('tb_fakultas');
            foreach ($getdata as $row){
        ?>
                <option value='<?=$row->kd_fakultas?>' ><?=$row->nm_fakultas?></option>
        <?php
            };
        ?>
        </select> 
    </div>

</div>

