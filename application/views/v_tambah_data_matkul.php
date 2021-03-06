<div class="row">
    <div class="col-lg-6">
      <label>Nama Matkul *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-book"></i></span>
           </div>
                <input name='nm_matkul' type="text" placeholder="Nama Mata Kuliah" value='' class="form-control" required='required' >
        </div>
        <label>Semester *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
           </div>
               <select name='semester' id='semester' class="select2 form-control" required='required'>
                    <option disabled selected  value='' >Select Semester...</option>
                    <option value='Ganjil' >Ganjil</option>
                    <option value='Genap' >Genap</option>
               </select>

               <select name='smt' id="r" class="select2 form-control col-lg-3" required='required'>
                     <option disabled selected value='' >Ke...</option>
               </select>
        </div>
        <label>Nama Fakultas *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-industry"></i></span>
           </div>
                 <select name='kd_fakultas' id='get_fakultas' class="select2 form-control" required='required'>
            <option selected disabled  value=''>---Select Fakultas---</option>
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
     </div>
     <div class='col-lg-6' >
        <label>Nama Program Studi *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
           </div>
           <select name='kd_prodi' id='kd_prodi' class="select2 form-control" required='required'>
            <option selected disabled  value=''>---Select Prodi---</option>
           
        </select>
        </div>
        <label>Nama Dosen *</label>
        <div class="input-group m-b">
           
           <select name='nip' data-placeholder="Select Dosen" class="chosen-select form-control" style="width:350px;" tabindex="13" required='required'>
                    <option selected disabled value=''>   </option>
            <?php
                $getdata = $this->m_admin->getDataTable('tb_mahasiswa');
                foreach ($getdata as $row){
            ?>
             <option  value='<?=$row->nim?>' ><?=$row->nim.':: '.$row->nama_mhs?></option>
            <?php
                };
            ?>
        </select>
        </div>
</div>
</div>
