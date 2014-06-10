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

	<div class="search-result">
	<?php // Don't change this class 'search-result' unless you understand what it means ?>
	<style>
	.collection{
		width:100%;
		height: 100%;
		overflow: scroll;
	}
	.collection a:link, .collection a:visited{
		color:gray;
	}
	.collection a:hover{
		color:black;
	}
	.rect{
		position: relative;
		float: left;
		margin: 2em;
		border: 1px solid;
		padding: 3px;
	}
	</style>
		<div class="collection">


			<?php if( isset($files) ) {?>
				<?php if( $files != -1 ){?>
				<?php foreach ( $files as $element ):?>
				<a href="<?=site_url("/test/testing")?>/<?php echo $element->fileid?>">
					<div class="rect">
					<div  class="line">
						<?php echo intval($element->timeid/100)."年";
							if( intval($element->timeid%10) == 1){
								echo "上學期";
							}
							else{
								echo "下學期";
							}
						?>
					</div>
					<div  class="line">
						<?php
							echo "第".intval($element->timeid%100/10)."段考";
						?>
					</div>
					<div class="line"><?php echo $element->subject?></div>
					<div class="line"><?php echo $element->professor?></div>
					</div>
				</a>
				<?php endforeach;?>
			<?php }
			else
				echo "<div class='rect'><div class='line'><h2>nothing found</h2></div></div>"?>
			<?php }?>
		</div>
	</div>
</body>
</html>