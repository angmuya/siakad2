<div class="row">
    <div class="col-lg-6">
      <label>Nama Matkul *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-book"></i></span>
           </div>
                <input name='pd3' type="text" placeholder="Nama Mata Kuliah" class="form-control" required='required' >
        </div>
        <label>Semester *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
           </div>
               <select name='kd_fakultas' class="select2 form-control" required='required'>
                    <option disabled selected  value='' >--Select--</option>
                    <option value='Ganjil' >Ganjil</option>
                    <option value='Genap' >Genap</option>
               </select>

               <select name='kd_fakultas' class="select2 form-control" required='required'>
                     <option disabled selected value='' >--Select--</option>
                   <?php
                    for ($i=1;$i<=8;$i++){
                   ?>
                    <option value='<?=$i?>' ><?=$i?></option>
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
                 <select name='kd_fakultas' class="select2 form-control" required='required'>
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
           <select name='kd_fakultas' class="select2 form-control" required='required'>
            <option selected disabled  value=''>---Select Prodi---</option>
            <?php
                $getdata = $this->m_admin->getDataTable('tb_prodi');
                foreach ($getdata as $row){
            ?>
             <option value='<?=$row->kd_prodi?>' ><?=$row->nm_prodi?></option>
            <?php
                };
            ?>
        </select>
        </div>
        <label>Nama Dosen *</label>
        <div class="input-group m-b">
           
           <select name='kd_fakultas' data-placeholder="Select" class="chosen-select form-control" multiple style="width:350px;" tabindex="13" required='required'>
           
            <?php
                $getdata = $this->m_admin->getDataTable('tb_dosen');
                foreach ($getdata as $row){
            ?>
             <option value='<?=$row->NIP?>' ><?=$row->NIP.'::'.$row->Nama?></option>
            <?php
                };
            ?>
        </select>
        </div>
</div>
</div>
