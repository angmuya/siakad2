<div class="row">
    <div class="col-lg-12">
        <label>Tanggal Pendaftaraan *</label>
            <div class="input-group m-b">
                <div class="input-group-prepend">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
                    <input name='tgl_pen' type="text" readonly  class="form-control" value='<?=date('d-m-Y')?>' required='required' >
            </div>
			
			<label>No Pendaftaraan</label>
            <div class="input-group m-b">
                <div class="input-group-prepend">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
                    <input readonly name='no_pen' type="text" class="form-control" value='<?=$no_pen?>' required='required' >
            </div>
	</div>
	
	<div class='col-lg-12' >
	<h4>I. IDENTITAS CALON MAHASISWA</h4>
	</div>
	
	<div class="col-lg-6" >

		<label>Nama Lengkap *</label>
            <div class="input-group m-b">
                <div class="input-group-prepend">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
                    <input name='nm_mhs' type="text" placeholder="Nama Calon Mahasiswa" class="form-control" required='required' >
            </div>
    
        <div class="form-group" id="data_1">
            <label class="font-normal">Tempat Kelahiran*</label>
            <div class="input-group m-b">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input name='tmp_lahir_mhs' type="text" placeholder="Tempat Lahir" class="form-control" required='required' >
                    <input name='tgl_lahir_mhs' type="text" class="form-control input-group date" placeholder='<?=date('d-m-Y')?>' required='required' >
            </div>
        </div>

        <label>Jenis Kelamin *</label>
        <div class="form-group row">
            <div class='col-lg-12' >
                <div class="input-group m-b">
                    <div class="i-checks"><label> <input type="radio" required='required' value="L" name="jk"> Laki-Laki </label></div> &nbsp;&nbsp;&nbsp;
                    <div class="i-checks"><label> <input type="radio" required='required' value="P" name="jk"> Perempuan </label></div>
                </div>
            </div>
        </div>
	</div>
	<div class='col-lg-6' >
            <label>Agama *</label>
                <div class="input-group m-b">
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                        <select name='agama' class='form-control' required >
                            <option value='' selected disabled>--Select Agama--</option>
                            <option value='islam'>Islam</option>
                            <option value='Protestan'>Protestan</option>
                            <option value='Katholik'>Katholik</option>
                            <option value='Hindu'>Hindu</option>
                            <option value='Budha'>Budha</option>
                        </select>
                </div>
            
            <label>Pekerjaan *</label>
                <div class="input-group m-b">
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                         <select name='pekerjaan_mhs' class='form-control' required >
                            <option value='' selected disabled>--Select Pekerjaan--</option>
                            <option value='pns'>PNS</option>
                            <option value='swasta'>SWASTA</option>
                            <option value='tni/polri'>TNI/POLRI</option>
                            <option value='lainya'>LAINYA</option>
                        </select>
                </div>

           <label>Status *</label>
				<div class="form-group row">
					<div class='col-lg-12' >
						<div class="input-group m-b">
							<div class="i-checks"><label> <input type="radio" required='required' value="K" name="status_mhs"> Kawin </label></div> &nbsp;&nbsp;&nbsp;
							<div class="i-checks"><label> <input type="radio" required='required' value="BK" name="status_mhs"> Belum Kawin </label></div> &nbsp;&nbsp;&nbsp;
							<div class="i-checks"><label> <input type="radio" required='required' value="S" name="status_mhs"> Janda / duda </label></div>
						</div>
					</div>
				</div>
    </div>
	<div class='col-lg-12'>	
			<label>Alamat Tinggal *</label>
            <div class="input-group m-b">
                <div class="input-group-prepend">
                    <span class="input-group-addon"><i class="fa fa-map"></i></span>
                </div>
                    <input name='alamat_t_mhs' type="text" class="form-control" placeholder='Nama Jalan' required='required' > &nbsp; &nbsp;
                    <input name='alamat_no_mhs' type="text" class="form-control col-lg-1" placeholder='No' required='required' > &nbsp; &nbsp;
                    <input name='alamat_rt_mhs' type="text" class="form-control col-lg-1" placeholder='RT' required='required' > &nbsp; <h3>/</h3> &nbsp;
                    <input name='alamat_rw_mhs' type="text" class="form-control col-lg-1" placeholder='RW' required='required' >
            </div>
			<div class="input-group m-b">
                    <input name='alamat_kel_mhs' type="text" class="form-control" placeholder='Kelurahan' required='required' > &nbsp; &nbsp;
                    <input name='alamat_kec_mhs' type="text" class="form-control" placeholder='Kecamatan' required='required' > &nbsp; &nbsp;
            </div>
			<div class="input-group m-b">
                    <input name='alamat_kota_mhs' type="text" class="form-control" placeholder='Kabupaten / Kota' required='required' > &nbsp; &nbsp;
                <div class="input-group-prepend">
                    <span class="input-group-addon"><i>+62</i></span>
                </div>
                    <input name='no_hp_mhs' type="text" class="form-control col-lg-6" placeholder='No Tlp / Hp' required='required' >
            </div>
          
	</div>
	
	<div class='col-lg-12'>	
         <h4>Ii. IDENTITAS ORANG TUA AYAH / IBU</h4> 
	</div>
	
	<div class='col-lg-6'>	
	<label>Nama *</label>
            <div class="input-group m-b">
                <div class="input-group-prepend">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
                    <input name='nama_ortu' type="text" placeholder="Nama Siswa" class="form-control" required='required' >
            </div>
         
	</div>
	<div class='col-lg-6'>	
		 <label>Pekerjaan *</label>
                <div class="input-group m-b">
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                         <select name='pekerjaan_ortu' class='form-control' required >
                            <option value='' selected disabled>--Select Pekerjaan--</option>
                            <option value='pns'>PNS</option>
                            <option value='swasta'>SWASTA</option>
                            <option value='tni/polri'>TNI/POLRI</option>
                            <option value='lainya'>LAINYA</option>
                        </select>
                </div>

	</div>
	
	<div class='col-lg-12'>	
			<label>Alamat *</label>
            <div class="input-group m-b">
                <div class="input-group-prepend">
                    <span class="input-group-addon"><i class="fa fa-map"></i></span>
                </div>
                    <input name='alamat_ortu' type="text" class="form-control" placeholder='Nama Jalan' required='required' > &nbsp; &nbsp;
                    <input name='alamat_no_ortu' type="text" class="form-control col-lg-1" placeholder='No' required='required' > &nbsp; &nbsp;
                    <input name='alamat_rt_ortu' type="text" class="form-control col-lg-1" placeholder='RT' required='required' > &nbsp; <h3>/</h3> &nbsp;
                    <input name='alamat_rw_ortu' type="text" class="form-control col-lg-1" placeholder='RW' required='required' >
            </div>
			<div class="input-group m-b">
                    <input name='alamat_kel_ortu' type="text" class="form-control" placeholder='Kelurahan' required='required' > &nbsp; &nbsp;
                    <input name='alamat_kec_ortu' type="text" class="form-control" placeholder='Kecamatan' required='required' > &nbsp; &nbsp;
            </div>
			<div class="input-group m-b">
                    <input name='alamat_kota_ortu' type="text" class="form-control" placeholder='Kabupaten / Kota' required='required' > &nbsp; &nbsp;
                <div class="input-group-prepend">
                    <span class="input-group-addon"><i>+62</i></span>
                </div>
                    <input name='no_hp_ortu' type="text" class="form-control col-lg-6" placeholder='No Tlp / Hp' required='required' >
            </div>
          
	</div>
	
	<div class='col-lg-12'>	
         <h4>III. PILIHAN JURUSAN</h4> 
	</div>
	
	<div class='col-lg-12'>	
                <div class="input-group m-b">
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                         <select name='pil_fakultas' id='get_fakultas' class='form-control' required >
                            <option value='' selected disabled>--Select Fakultas--</option>
                            <?php
								$getdata = $this->m_admin->getDataTable('tb_fakultas');
								foreach ($getdata as $row){
							?>
							 <option value='<?=$row->kd_fakultas?>' ><?=$row->nm_fakultas?></option>
							<?php
								};
							?>
                         </select>
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                         <select name='pil_jurusan' id="kd_prodi" class='form-control' required >
                            <option value='' selected disabled>---Select Jurusan--</option>                           
                        </select>
                </div>
	</div>
	
	<div class='col-lg-12'>	
         <h4>IV. WAKTU KULIAH</h4> 
	</div>
	
	<div class='col-lg-12'>	
                <div class="input-group m-b">
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                         <select name='pil_jadwal'  class='form-control' required >
                            <option value='' selected disabled>--Select Waktu Kuliah--</option>
							<?php
								$getdata = $this->m_admin->getDataTable('tb_kelas_jenis');
								foreach ($getdata as $row){
							?>
							 <option value='<?=$row->kode_kelas_jenis?>' ><?=$row->nama_kelas_jenis?></option>
							<?php
								};
							?>
                        
                        </select>
                </div>
	</div>
</div>