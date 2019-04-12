<?php
$ta = date('m');
if ($ta >= "6"){
		$rest = date('Y');
}else{
	$rest = date ('Y')-1;
}

$taa = date('m');

if ($taa >= "6"){
		$restt = date('Y');
}else{
	$restt = date ('Y')-1;
}

switch ($semester){
	case "ganjil" :
			echo "<label>ID Semester *</label>";
			echo "<input name='id_smt' id='smt' readonly class='form-control' value=".$rest.'1'." >";
	break;
	
	case "genap" :
	echo "<label>ID Semester *</label>";
		echo "<input name='id_smt' id='smt' readonly class='form-control' value=".$rest.'2'." >";
	break;
}

?>