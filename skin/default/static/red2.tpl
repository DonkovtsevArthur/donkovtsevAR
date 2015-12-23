<?php 
$sql = "SELECT `id`, `name`, `memory`, `wlan`, `sub`, `g2`, `img` FROM `tovar` WHERE `id` IN(".$del.") LIMIT 1";
$res = mysqli_query($db,$sql);
//print_r($res);
$row = mysqli_fetch_assoc($res);
$_SESSION['id']=$row['id'];
?>
<form enctype="multipart/form-data" action="" method="POST">
<h4 style="color:#fff;">Редактировать смартфон </h4>
		<div>
			<span style="color:#fff;">Картинка </span><input name="userfile" type="file"/>
		</div>		
		<div>
			<span style="color:#fff;">Название смартфона </span><input type="text" name="name" value="<?php echo $row['name']?>">
		</div>
		<div>
			<span style="color:#fff; padding-right: 44px;">Объем памяти </span><input type="text" name="memory" value="<?php echo $row['memory']?>">
		</div>
		<div>
			<span style="color:#fff; padding-right: 104px;">Связь </span><input type="text" name="wwlan" value="<?php echo $row['wlan']?>">
		</div>
		<input class="buttom2 text-center" type="submit" name="update" value="Изменить" />
</form>