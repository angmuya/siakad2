<div class="row">
    <div class="col-lg-8">
      <label>Judul Post *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-book"></i></span>
           </div>
                <input name='nm_matkul' value='<?=$rest->judul_post?>' type="text" placeholder="Judul Post" value='' class="form-control" required='required' >
        </div>
      
	  <label> Category Post *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
           </div>
           <select name='kd_prodi' id='kd_prodi' class="select2 form-control" required='required'>
            <option selected disabled  value=''>---Select Category---</option>
           
        </select>
        </div>
     </div>
	<div class='col-lg-12' >
        <label>Isi Post *</label>

          <textarea id="editor<?=$rest->id_post .$rest->slug_post?>" name="isi_post" rows="100" cols="100">
		  <?=$rest->isi_post?>
		  </textarea>

	</div>
</div>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor<?=$rest->id_post .$rest->slug_post?>')

  })
</script>
