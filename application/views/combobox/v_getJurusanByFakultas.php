            <option value='' disabled selected >---Select Jurusan---</option>

 <?php
            foreach ($result_prodi as $row){
            ?>
            
             <option value='<?=$row->p_studi .$row->kd_prodi?>' ><?php echo $row->nm_prodi ." ( ".$row->p_studi ." ) ";?></option>
            <?php
                };
            ?>