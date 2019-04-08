            <option value='' disabled selected >---Select Prodi---</option>

 <?php
            foreach ($result_prodi as $row){
            ?>
            
             <option value='<?=$row->kd_prodi?>' ><?=$row->nm_prodi?></option>
            <?php
                };
            ?>