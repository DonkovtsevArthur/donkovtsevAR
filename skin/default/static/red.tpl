<h5 class="eror"> Все существующие смартфоны:</h5>
<form action="" method="post">
	<?php $ris = mysqli_query($db,"SELECT `id`, `name`, `memory`, `wlan`, `sub`, `g2`, `img` FROM `tovar`");
	while($rew = mysqli_fetch_assoc($ris)) { ?>
		<div class="col-md-12 text-left">
			<input type="checkbox" name="del[]" value="<?php echo $rew['id'];?>">
			<span style="color:#fff;"> Название: <?php echo $rew['name'];?>  Память: <?php echo $rew['memory'];?> Связь: <?php echo $rew['wlan'];?></span>	
		</div>
	<?php } ?>
	<input class="buttom2 text-center" type="submit" name="delete" value="Удалить" />
	<input class="buttom2 text-center" type="submit" name="red" value="Редактировать" />
</form>
			
