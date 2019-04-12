<?php
$ta = "7"; //date('m');
if ($ta >= "6"){
		$rest = date('Y');
}else{
	$rest = date ('Y')-1;
}

$taa = "7"; // date('m');

if ($taa >= "6"){
		$restt = date('Y');
}else{
	$restt = date ('Y')-1;
}

switch ($semester){
	case "ganjil" :
			echo $rest.'1';
	break;
	
	case "genap" :
		echo $restt.'2';
	break;
}

?>