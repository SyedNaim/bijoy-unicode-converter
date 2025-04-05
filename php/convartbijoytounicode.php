<?php 
include_once __DIR__.'/bijoy2unicode.php';
if (isset($_POST['bijoy'])) {
	$bijoy = '';
	$bijoy = $_POST['bijoy'];
	if (!empty($bijoy)) {
		echo convertBijoyToUnicode($bijoy);
	}else{
		echo "Lvwj";
	}
}else{

}
?>