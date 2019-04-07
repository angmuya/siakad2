<div class='row' >
<div class="col-lg-6">
    <label>Nama Prodi *</label>
        <div class="input-group m-b ">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
            </div>
                <input name='nm_prodi' type="text" placeholder="Nama Prodi" class="form-control" required='required'>
        </div>
	<label>Nama Ketua Prodi *</label>
        <div class="input-group m-b">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            </div>
                <input name='ketua_prodi' type="text" placeholder="Nama Ketua Prodi" class="form-control " required='required' >
        </div>
	<label>Nama Sekretaris *</label>
        <div class="input-group m-b">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
            </div>
                <input name='sekretaris_prodi' type="text" placeholder="Nama Sekretaris prodi" class="form-control" required='required' >
        </div>
</div>
<div class="col-lg-6">

<div class="input-group m-b">
         <label>Nama Fakultas *</label>
            <select name='kd_fakultas' data-placeholder="Fakultas a ..." class="chosen-select form-control"  required='required'>
                <option selected disabled value='' > Select Fakultas </option>
                <?php
                    $getdata = $this->m_admin->getDataTable('tb_fakultas');
                    foreach ($getdata as $row){
                ?>
                <option value='<?=$row->kd_fakultas?>' ><?=$row->nm_fakultas?></option>
                <?php
                    };
                ?>
            </select>
        </div>

        <label>Program Studi *</label>
        <div class="input-group m-b">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
            </div>
               <select name='p_studi' class='form-control' riquired='riquired' >
                    <option value='' selected disabled >Program Studi</option>
                    <option value='D3' > D3 </option>
                    <option value='S1' > S1 </option>
               </select>
        </div>

</div>
</div>