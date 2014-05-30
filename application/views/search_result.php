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
	<div >
		<?php if( isset($files) ) {?>
			<?php if( $files != -1 ){?>
		<table>
			<tr>
				<td> FilesID </td>
				<td> timeID </td>
				<td> Subject </td>
				<td> Professor </td>
				<td> UserID </td>
			</tr>	
			<?php foreach ( $files as $element ):?>
			<tr>
				<td><a href="<?=site_url("/test/testing")?>/<?php echo $element->fileid?>"><?php echo $element->fileid?></a></td>
				<td><?php echo $element->timeid?></td>
				<td><?php echo $element->subject?></td>
				<td><?php echo $element->professor?></td>
				<td><?php echo $element->userid?></td>
			</tr>
			<?php endforeach;?>
		</table>		
			<?php }
			else 
				echo "nothing found"?>
		<?php }?>
	</div>
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="http://silviomoreto.github.io/bootstrap-select/javascripts/bootstrap-select.js"></script>
</body>
</html>