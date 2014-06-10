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

	<div class="search-result"><?php 
	// Don't change this class 'search-result' unless you understand what it means ?>
		<?php if( isset($files) ) {?>
			<?php if( $files != -1 ){?>
		<table>
			<tr>
				<td> 學年度 </td>
				<td> 學期 </td>
				<td> 次段考 </td>
				<td> 科目 </td>
				<td> 教授 </td>
				<td> 上傳者</td>
			</tr>	
			<?php foreach ( $files as $element ):?>
			<?php  $year = floor($element->timeid/ 100);
				   $semester = floor($element->timeid / 10 - $year*10);
				   $times = floor($element->timeid - $year*100 - $semester * 10 );?>
			<tr>
				<td><?php echo $year;?></td>
				<td><?php echo $semester;?></td>
				<td><?php echo $times;?></td>
				<td><?php echo $element->subject?></td>
				<td><?php echo $element->professor?></td>
				<td><?php echo $element->account?></td>
				<td><a href="<?=site_url("/test/testing")?>/<?php echo $element->fileid?>">Go!</a></td>
				
			</tr>
			<?php endforeach;?>
		</table>		
			<?php }
			else 
				echo "nothing found"?>
		<?php }?>
	</div>
</body>
</html>