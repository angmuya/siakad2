 <?php
            foreach ($result_css_class as $rw){
            ?>
            
             <input hidden name='css_class' value='<?=$rw->css_class_grup?>' > 
             <input hidden name='urut' value='<?=$rw->urut?>' >
            <?php
                };
            ?>