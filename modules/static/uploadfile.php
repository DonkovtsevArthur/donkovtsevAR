<?php
$uploaddir = './upload/test/';
$uploadfile = $uploaddir.time().'-'. basename($_FILES['userfile']['name']);
$t = scandir($uploaddir);
foreach($t as $v);
$test = '<img class="img2" src="/upload/test/'.$v.'">';

if(isset($_POST['add']) && isset($_FILES['userfile'])) {
	$tmpFile = $_FILES['userfile']['tmp_name'];
	list($width, $height) = getimagesize($tmpFile);
	if ($width == null && $height == null) {
		header("Location: index.php");
		return;
	} 
	if ($width >= 105 && $height >= 189) {
		$image = new Imagick($tmpFile);
		$image->thumbnailImage(105, 189);
		$image->writeImage($uploadfile);
	} else {
	move_uploaded_file($tmpFile, $uploadfile);
	}	
	$fileimg = time().'-'. basename($_FILES['userfile']['name']);
	$files = [];
	if($dirfile = opendir($uploaddir)) {
		while( false !== ($files = readdir($dirfile))) {
			if($files == '.' || $files == '..')
			continue;
			if($files = $fileimg){
				$test = '<img class="img2" src="/upload/test/'.time().'-'. basename($_FILES['userfile']['name']).'">';				
				$_POST['test'] = $test;
			}else {
				echo 'нет такого файла';
			}
		}
	}
}
if(isset($_POST['update']) && isset($_FILES['userfile'])) {
	 $tmpFile = $_FILES['userfile']['tmp_name'];
	 list($width, $height) = getimagesize($tmpFile);
	if ($width == null && $height == null) {
		header("Location: index.php");
		return;
  } 
  if ($width >= 105 && $height >= 189) {
		$image = new Imagick($tmpFile);
		$image->thumbnailImage(105, 189);
		$image->writeImage($uploadfile);
	} else {
	move_uploaded_file($tmpFile, $uploadfile);
	}	
	$fileimg = time().'-'. basename($_FILES['userfile']['name']);
	$files = [];
	if($dirfile = opendir($uploaddir)) {
		while( false !== ($files = readdir($dirfile))) {
			if( $files == '.' || $files == '..')
			continue;
			if($files = $fileimg) {
				$test = '<img  class="img2" src="/upload/test/'.time().'-'. basename($_FILES['userfile']['name']).'">';				
				$_POST['test'] = $test;
			}else {
				echo 'нет такого файла';
			}
		}
	}
}
$reg = '<li><form method="post"><button name="login" class="exit" type="submit">Регистрация</button></form></li>';
$reg11 = '<div class="col-md-4 col-md-offset-4">
		<form class="form-signin" id="avt" role="form" method="post">
		<input type="email" name="name2" class="form-control avt" placeholder="Введите Email" value="'.@$_POST['name2'].'" required autofocus>
		<input type="password" name="password2" class="form-control" placeholder="Введите пароль" required>
		<input type="password" name="password3" class="form-control" placeholder="Повторите пароль" required>
		<button class="buttom1-1 text-center" name="sing2" type="submit">Регистрация</button>
		</form>	         			
		</div>';
$reg22 = '	<div class="col-md-4 col-md-offset-4">			 
	<form class="form-signin" id="avt" role="form" method="post">
        <input type="email" name="name" class="form-control avt" placeholder="Введите Email" value="'.@$_POST['name'].'" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Введите пароль" required>    
        <button class="buttom1-1 text-center" name="sing" type="submit">Войти</button>
      </form>
	  </div>';
$adds = '<div class="col-md-12">
			<form enctype="multipart/form-data" action="" method="POST">
				<input class="buttom2 text-center" type="submit" name="adds" value="Добавить" />
			</form>
		</div>';
$add = '<form enctype="multipart/form-data" action="" method="POST">
<h4 style="color:#fff;">Добавить смартфон </h4>
		<div>
			<span style="color:#fff;">Картинка </span><input name="userfile" type="file"/>
		</div>
		<div>
			<span style="color:#fff;">Название смартфона </span><input type="text" name="name" placeholder="например:Nokia X2">
		</div>
		<div>
			<span style="color:#fff; padding-right: 44px;">Объем памяти </span><input type="text" name="memory" placeholder="например:256Mb">
		</div>
		<div>
			<span style="color:#fff; padding-right: 104px;">Связь </span><input type="text" name="wwlan" placeholder="например:3g">
		</div>
		<input class="buttom2 text-center" type="submit" name="add" value="Добавить" />
		</form>';
		
$eror = '<p class="eror"> Не верный email или пароль</p>';
$spa = '<p class="eror"> Спасибо за регистрацию! Введите свой Email и пароль.</p>';	  	  
if (!isset($_SESSION['names']) && !isset($_SESSION['passwords'])){
	$_SESSION['open'] = '<i class="fa fa-user"></i> Вход';	
	$_SESSION['reg'] = $reg;
	$_SESSION['reg2'] = $reg22;
	unset($_SESSION['eror']);
	} elseif (isset($_SESSION['names']) && !isset($_SESSION['passwords'])){
		$_SESSION['open'] = '<i class="fa fa-user"></i> Вход';	
		$_SESSION['reg'] = $reg;
		$_SESSION['reg2'] = $reg22;
		unset($_SESSION['eror']);
	}
	else {		
		unset($_SESSION['eror']);
	}
if(isset($_POST['login'])) {
	unset($_SESSION['passwords']);
	unset($_SESSION['names']);
	if(!isset($_SESSION['names2']) && !isset($_SESSION['passwords2']) && !isset($_SESSION['passwords3'])){
		$_SESSION['open'] = '<i class="fa fa-user"></i> Вход';
		$_SESSION['reg2'] = $reg11;
		$_SESSION['reg'] = $reg;
		unset($_SESSION['exit']);
		unset($_SESSION['eror']);
	} 
}
if(isset($_POST['sing2'])) {
	$_SESSION['passwords2'] = htmlspecialchars($_POST['password2']);
	$_SESSION['passwords3'] = htmlspecialchars($_POST['password3']);
	if($_SESSION['passwords2'] == $_SESSION['passwords3']) {
		$_SESSION['names2'] = htmlspecialchars($_POST['name2']);
		$file=fopen('./loginpassword/login.txt','a+'); 
		fputs($file,$_SESSION['names2']."\r\n"); 
		fclose($file); 
		$file2=fopen('./loginpassword/password.txt','a+\n'); 
		fputs($file2,$_SESSION['passwords2']."\r\n"); 
		fclose($file2);
		$_SESSION['eror'] = $spa;

	} else {
		$error = '<p class="eror">Пароли не совпадают</p>';
		$_SESSION['eror'] = $error;
		unset($_SESSION['names2']);
		unset($_SESSION['passwords2']);
		unset($_SESSION['passwords3']);
		$_SESSION['reg2'] = $reg11;
		
	}
}

if(isset($_POST['sing'])) {
		$_SESSION['names'] = htmlspecialchars($_POST['name']);
		$_SESSION['passwords'] = htmlspecialchars($_POST['password']);
		$_SESSION['reg'] = $reg;
		$fp = fopen('./loginpassword/login.txt', 'r');
		while (false !== ($char = fgets($fp))) {
				$t[] = $char;	
		}	
		foreach ($t as $p) {
			$pos = strpos($p, $_SESSION['names']);
			if ($pos !== true){ 
				unset($_SESSION['eror']);			
				$fpw = fopen('./loginpassword/password.txt', 'r');		
				while (false !== ($charw = fgets($fpw))) {
					$tw[] = $charw;	
				}	
				foreach ($tw as $e) {
					$posw = strpos($e, $_SESSION['passwords']);
					if ($posw !== false){ 
						unset($_SESSION['eror']);
						$_SESSION['open'] = '<i class="fa fa-unlock"></i>Admin';
						$_SESSION['exit'] = '<li><form method="post"><button name="exit" class="exit" type="submit">Выход</button></form></li>';
						unset($_SESSION['reg']);
						unset($_SESSION['reg2']);					
						$_SESSION['reds'] =  'red';
						$_SESSION['adds'] = $adds;
					}else{
							$_SESSION['eror'] = '<p class="eror"> Не верный email или пароль</p>';
						}
				}	
			} 			
		} 
	}
if(isset($_POST['red']) && isset($_POST['del'])){
	$del = implode(',',$_POST['del']);	
	$_SESSION['reds2'] = 'red2';	
}	
if(isset($_POST['adds'])) {
	$_SESSION['adds'] = $add;	
}
if(isset($_POST['add'])){
	if(!empty($_POST['name']) && !empty($_POST['memory']) && !empty($_POST['wwlan'])){
		$_SESSION['adds'] = $adds;
		unset($_SESSION['eror']);		
		mysqli_query($db,"INSERT INTO `tovar` (`name`, `memory`, `wlan`, `img`) 
        VALUES ('".$_POST['name']."','".$_POST['memory']."','".$_POST['wwlan']."','".$_POST['test']."')");
		$_SESSION['info'] ='<p class="eror"> Товар добавлен</p>';		
	}
	else {
		$_SESSION['eror'] = '<p class="eror">Вы ничего не добавили</p>';
	}
}
if(isset($_POST['delete'])) {
	$del = implode(',',$_POST['del']);
	mysqli_query($db,"DELETE FROM `tovar` WHERE `id` IN(".$del.")");
	$_SESSION['info'] ='<p class="eror">Товар удален</p>';
}
if(isset($_POST['update'])){
	if(!empty($_POST['name']) && !empty($_POST['memory']) && !empty($_POST['wwlan'])){
		$_SESSION['adds'] = $adds;
		unset($_SESSION['eror']);
		$del = implode(',',$_POST['del']);
		mysqli_query($db,"UPDATE `tovar` SET
			`name`='".$_POST['name']."',
			`memory`='".$_POST['memory']."',
			`wlan`='".$_POST['wwlan']."',
			`img`='".$_POST['test']."'
			WHERE `id` = ".$_SESSION['id']."");
		$_SESSION['info'] ='<p class="eror">Товар изменился</p>';
		unset($_SESSION['reds2']);
	}
	else {
		$_SESSION['eror'] = '<p class="eror">Вы ничего не добавили</p>';
	}	
}
if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
if(isset($_POST['exit']) && isset($_SESSION['passwords']) && isset($_SESSION['names'])){
	unset($_SESSION['passwords']);
	unset($_SESSION['names']);
	unset($_SESSION['passwords2']);
	unset($_SESSION['names2']);
	$_SESSION['open'] = '<i class="fa fa-user"></i> Вход';
	$_SESSION['reg2'] = $reg22;
	$_SESSION['reg'] = $reg;
	unset($_SESSION['exit']);
	unset($_SESSION['adds']);
	unset($_SESSION['eror']);
	unset($_SESSION['reds']);
	unset($_SESSION['reds2']);
	unset($_SESSION['info']);
}
?>