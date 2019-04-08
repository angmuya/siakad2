<?php
    switch ($_POST['dil']){
        case "Ganjil" :
?>
        <option value="">Ke...</option>
        <option value="1">1</option>
        <option value="3">3</option>
        <option value="5">5</option>
        <option value="7">7</option>
<?php
        break;
        case "Genap" :
        ?>
        <option value="">Ke...</option>
        <option value="1">2</option>
        <option value="4">4</option>
        <option value="6">6</option>
        <option value="8">8</option>

        <?php
        break;
    }

?>