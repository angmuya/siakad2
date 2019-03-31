<?php
if (isset($_POST['proses'])){
$host = $_POST['servername'];
$user = $_POST['user'];
$pass = $_POST['password'];
$datab = $_POST['datab'];

$isifile ="<?php
defined('BASEPATH') OR exit('No direct script access allowed');
-active_group = 'default';
-query_builder = TRUE;

-db['default'] = array(
	'dsn'	=> '',
	'hostname' => '$host',
	'username' => '$user',
	'password' => '$pass',
	'database' => '$datab',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);";
$isi = str_replace("-","$",$isifile);
$file = fopen("../application/config/database.php","w");
fwrite($file,$isi);
fclose($file);
}
if (!file_exists('../application/config/database.php')){
?>
<form method='post'>
<input name='datab' type='text' required placeholder='Nama Db Ex: db_public'>
<input name='servername' type='text' required placeholder='Servername Ex: localhost'>
<input name='user' type='text' required placeholder='Username Ex: Root'>
<input name='password' type='text'  placeholder='*******'>
<input name='proses' type='submit' value='proses'>
</form>
<?php
}else{
	echo "akan redirect";
}
?>