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
		<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
		<!-- Bootstrap core CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="dropzone.js"></script>
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
							<li><a href="index.php">Home</a></li>
							<li class="cart"><a href="./index.php?modules=static&page=carthop"><i class="fa fa-cart-plus"></i><span class="badge pull-right"><?php echo $_SESSION['kov'] ?></span></a></li>
							<li class="active"><a href="./index.php?modules=static&page=uploadfile"><? echo $_SESSION['open']?></a></li>
							<? echo $_SESSION['exit']; ?>
							<? echo $_SESSION['reg']; ?>
						</ul>
						<form action="" method="get" class="navbar-form navbar-right">
							<input type="text" name="search" class="form-control" placeholder="Search...">
						</form>
					</div>
				</div>
			</div> 
		<div class="container votes">
			<div id="vote" class="row">
				<?php  echo $info; ?>
				<?php echo $_SESSION['eror']; ?>
				<?php echo $_SESSION['adds']; ?>
				<?php echo $_SESSION['reg2']; ?>
				<?php include './skin/default/'.$_GET['modules'].'/'.$_SESSION['reds'].'.tpl';?>
				<?php include './skin/default/'.$_GET['modules'].'/'.$_SESSION['reds2'].'.tpl';?>				
			</div>			
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