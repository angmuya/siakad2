<div class="row">
    <div class="col-lg-5">
        <label>Nama Mahasiswa *</label>
            <div class="input-group m-b">
                <div class="input-group-prepend">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
                    <input name='pd3' type="text" placeholder="Nama Siswa" class="form-control" required='required' >
            </div>
    
        <div class="form-group" id="data_1">
            <label class="font-normal">Tempat dan Tanggal Lahir *</label>
            <div class="input-group m-b">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input name='pd3' type="text" placeholder="Tempat Lahir" class="form-control" required='required' >
                    <input name='tgl' type="text" class="form-control input-group date" placeholder='<?=date('Y-m-d')?>' required='required' >
            </div>
        </div>

        <label>Jenis Kelamin *</label>
        <div class="form-group row">
            <div class='col-lg-6' >
                <div class="input-group m-b">
                    <div class="i-checks"><label> <input type="radio" required='required' value="L" name="jk"> <i></i> Laki-Laki</label></div><br>
                    <div class="i-checks"><label> <input type="radio" required='required' value="P" name="jk"> <i></i> Perempuan </label></div>
                </div>
            </div>
        </div>

            <label>Nama Suku *</label>
                <div class="input-group m-b">
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                        <input name='pd3' type="text" placeholder="Nama Suku" class="form-control" required='required' >
                </div>
            <label>Agama *</label>
                <div class="input-group m-b">
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                        <select class='form-control' required >
                            <option value='' selected disabled>--Religion--</option>
                            <option value='islam'>Islam</option>
                            <option value='Protestan'>Protestan</option>
                            <option value='Katholik'>Katholik</option>
                            <option value='Hindu'>Hindu</option>
                            <option value='Budha'>Budha</option>
                        </select>
                </div>
            
            <label>Asal Sekolah *</label>
                <div class="input-group m-b">
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                        <input name='pd3' type="text" placeholder="Asal Sekolah" class="form-control" required='required' >
                </div>

            <label>Tahun Lulus *</label>
                <div class="input-group m-b">
                    <div class="input-group-prepend">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                        <input name='pd3' type="text" placeholder="Tahun Lulus" class="form-control" required='required' >
                        <input name='pd3' type="text" placeholder="Nem" class="form-control col-lg-3" required='required' >
                </div>
    </div>
</div>