<?php include ("_header.php"); 
	  include ("_navbar.php");
	  if(!isset($_SESSION)){
	  	session_start();
	  }?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
	<link href="<?php echo base_url('css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="http://silviomoreto.github.io/bootstrap-select/stylesheets/bootstrap-select.css">
</head>

<body>
	<div class="hero-unit">
		<h1 class="text-center">歡迎蒞臨</h1>
	</div>
	
	<div class="container-fluid">
		<div class="row-fluid">
				
				<div class="span3">
				</div>
				
				<div class="span6">
					<img src="<?php echo base_url('image/TaipeiCityZoo.jpg');?>" alt="Zoo" class="img-circle">
				</div>
			
				<div class="span3">
				</div>
			
		</div>
	</div>
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="http://silviomoreto.github.io/bootstrap-select/javascripts/bootstrap-select.js"></script>
</body>
</html>