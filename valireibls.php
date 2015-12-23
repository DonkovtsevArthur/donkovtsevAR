<?php
$alloved = ['static'];

if(!isset($_GET['modules'])){
	$_GET['modules'] = 'static';
}elseif (!in_array($_GET['modules'], $alloved)) {
	header("Location: /index.php?modules=404");
	exit();
}
if(!isset($_GET['page'])) {
	$_GET['page'] = 'main';
}

?>