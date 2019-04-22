<div class="row">
    <div class="col-lg-8">
      <label>Judul Post *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-book"></i></span>
           </div>
                <input name='judul_post' type="text" placeholder="Judul Post" value='' class="form-control" required='required' >
        </div>
      
	  <label> Category Post *</label>
        <div class="input-group m-b">
           <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
           </div>
           <select name='cat_post' id='kd_prodi' class="select2 form-control" required='required'>
            <option selected disabled  value=''>---Select Category---</option>
			<?php
			$data = $this->db->get('tb_category_post')->result();
			foreach ($data as $ro){
			?>
			<option value='<?=$ro->id_cat_post?>' ><?=$ro->nm_cat_post?></option>
			<?php
			}
			?>
           
        </select>
        </div>
     </div>
	<div class='col-lg-12' >
        <label>Isi Post *</label>

          <textarea id="editor1" name="isi_post" rows="100" cols="100">
		  </textarea>

	</div>
</div>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')

  })
</script>
