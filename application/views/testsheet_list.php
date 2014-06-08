<?php if(!isset($_SESSION)){
		session_start();
		include("_header.php");
		include("_navbar.php");
	  }?>

<body>
	<div>
	<?php $cur = NULL;?>
	<?php for($i=0, $size = count($info); $i<$size; $i++){ ?>
	<?php if( $cur != $info[$i]->subject ) { ?>
		</div>
		<div>
		<div><?php echo ($cur = $info[$i]->subject);?></div>
		<div>
			<div><?php echo "學年度"?></div>
			<div><?php echo "學期"?></div>
			<div><?php echo "第幾次段考"?></div>
			<div><?php echo "教授"?></div>
		</div>
		<?php }?>
		<?php  
			$year = floor($info[$i]->timeid/ 100);
			$semester = floor($info[$i]->timeid / 10 - $year*10);
			$times = floor($info[$i]->timeid - $year*100 - $semester * 10 );?>
			<div>
				<div><?php echo $year?></div>
				<div><?php echo $semester?></div>
				<div><?php echo $times?></div>
				<div><?php echo $info[$i]->professor?></div>
				
			</div>
		<?php  
		}?>
	</div>
</body>