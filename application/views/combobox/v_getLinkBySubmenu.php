<?php
            foreach ($result_link as $rest){
            ?>
            
             <input name='sub_menu' value='<?=$rest->nama_submenu?>' >
             <input name='link_url' value='<?=$rest->link_url?>' > 
             <input name='urut' value='<?=$rest->urutan_menu?>' >
            <?php
                };
            ?>