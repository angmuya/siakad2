		<br>
		   <div class="input-group m-b">
                <select id='select_thn' data-placeholder="Select Tahun Angkatan" class="chosen-select form-control" required>
                <?php
                $datatahun = $this->m_admin->getDataTable('tb_thn_masuk');
                foreach ($datatahun as $res){
                ?>
                <option><?=$res->thn_masuk?></option>
                <?php
                };
                ?>
            </select>
		   </div>
		   <div class="wrapper wrapper-content animated fadeInRight" id='show_data'>	
		   </div>

		
<script>

$("#select_thn").change(function(){
   
   // variabel dari nilai combo box provinsi
   var select_thn = $("#select_thn").val();
		 
   // mengirim dan mengambil data
   $.ajax({
	   type: "POST",
	   dataType: "html",
	   url: "<?=site_url().'/admin/mahasiswa/search'?>",
	   data: "ta="+select_thn,
	   success: function(msg){
		  
			   $("#show_data").html(msg);                                                     
	   }
   });    
});
</script>
