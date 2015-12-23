<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="img/favicon.ico">
		<title>GoodPoll</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="css/mystyle.css" rel="stylesheet">
		<link href="css/fonts/fonts.css" rel="stylesheet">
		<!-- Bootstrap core CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>
	<body class="bodyfon">
		<!-- Fixed navbar -->
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php"><span  class="logo">GoodPoll</span></a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php">Home</a></li>
							<li class="cart"><a href="./index.php?modules=static&page=carthop"><i class="fa fa-cart-plus"></i><span class="badge pull-right"><?php echo $_SESSION['kov'] ?></span></a></li>
							<li><a href="./index.php?modules=static&page=uploadfile"><? echo $_SESSION['open']?></a></li>
							<? echo $_SESSION['exit']; ?>							
						</ul>
						<form action="" method="get" class="navbar-form navbar-right">						
							<input type="text" name="search" class="form-control" placeholder="Search...">
						</form>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		<div class="container votes">
			<div id="vote" class="row">
				<div class="col-sm-4 col-md-3 col-md-push-9 mobiles">
					<form action=""    method="get">
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading box" data-toggle="collapse" data-parent="#selector" href="#collapseOne">
									<h4 class="panel-title" >
										Производитель
									</h4>  
								</div>
								<div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body">					
										<label><input type="checkbox" name="tel[1]" value="microsoft"  id="1" <? echo $tel1['microsoft'];?>><span>Microsoft</span></label>
										<label><input type="checkbox" name="tel[2]"  value="samsung"  id="2" <? echo $tel1['samsung'];?>><span>Samsung </span></label><br>
										<label><input type="checkbox" name="tel[3]"  value="lenovo" id="3" <? echo $tel1['lenovo'];?>><span>Lenovo </span></label>
										<label><input type="checkbox" name="tel[4]"  value="apple" id="4" <? echo $tel1['apple'];?>><span>Apple </span></label>													
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading box" data-toggle="collapse" data-parent="#selector" href="#collapseTwo">
									<h4 class="panel-title">
										Выберите память
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse in">
									<div class="panel-body text-center">
								<select name="memory">
										<option ></option>
										<option value="256" <?php if($_GET['memory']=='256') echo 'selected'; ?>>256 Mb</option>
										<option value="512"<?php if($_GET['memory']=='512') echo 'selected'; ?>>512 Mb</option>
										<option value="1"<?php if($_GET['memory']=='1') echo 'selected'; ?>>1 Gb</option>
										<option value="2"<?php if($_GET['memory']=='2') echo 'selected'; ?>>2 Gb</option>
								 </select>
									</div>
								</div>
							</div>
							 <div class="panel panel-default">
								<div class="panel-heading box" data-toggle="collapse" data-parent="#selector" href="#collapseThree">
									<h4 class="panel-title">
										Тип связи
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse in">
									<div class="panel-body">
										<label><input type="checkbox" name="set[2]" id="1" value="2g"<? echo $set1['2g'];?>><span>2G</span></label>
										<label><input type="checkbox" name="set[3]" id="2" value="3g"<? echo $set1['3g'];?>><span>3G</span></label>
										<label><input type="checkbox" name="set[4]" id="3" value="4g"<? echo $set1['4g'];?>><span>4G</span></label>
									</div>
								</div>
							</div>
						</div>
						<input class="buttom text-center" name="submit" type="submit" value="ПРИМЕНИТЬ">
					</form>	
				</div>	
				<div class="col-sm-8 col-md-9 col-md-pull-3">
					<div class="row">
						<?php echo $html; ?>					
					</div>	
				</div>	         			
			</div>
			<?php echo $html3; ?>
		</div> <!-- /container -->
		<div id="foote">
		  <div class="container text-right">
				<span class="foote"> Copyright <i class="fa fa-copyright"></i>. 2015 by Donkovtsev Arthur.</span>
		  </div>
		</div>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="js/docs.min.js"></script>
	</body>
</html>