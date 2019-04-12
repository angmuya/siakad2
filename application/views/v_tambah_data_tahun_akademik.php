<?php
$ta = date('m');;
if ($ta >= "6"){
		$rest = date('Y');
}else{
	$rest = date ('Y')-1;
}

$taa = date('m');

if ($taa >= "6"){
		$restt = date('Y')+1;
}else{
	$restt = date ('Y');
}


?>

<div class='row' >
    <div class="col-md-6">
        <label>Tahun Akadmik</label>
        <div class="input-group m-b">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            </div>
                <input name='ta' id='ta' readonly type="text" placeholder="Nama Dekan" class="form-control " value="<?=$rest.'/'.$restt?>" required='required' >
        </div>
		
		<label>Semester</label>
        <div class="input-group m-b">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            </div>
				<select name='semester' id='get_semester' class='form-control semester' required>
					<option  disabled selected value='' >Select Semester</option>
				<?php if ($ta >= "6"){?>
					<option  value='ganjil' >Ganjil</option>
				<?php
				}else{
				?>
					<option  value='genap' >Genap</option>
				<?php
				}
				?>
				</select>	
        </div>
		 <div id="res_id_ta">

		</div>
      </div>
</div>