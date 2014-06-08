<?php if(!isset($_SESSION)){
		session_start();
	  }?>
<!DOCTYPE html>
<body>
	<table>
	<?php $cur = NULL;?>
	<?php for($i=0, $size = count($info); $i<$size; $i++){ ?>
	<?php if( $cur != $info[$i]->subject ) { ?>
		</table>
		<table>
		<tr><?php echo ($cur = $info[$i]->subject);?></tr>
		<tr>
			<td><?php echo "學年度"?></td>
			<td><?php echo "學期"?></td>
			<td><?php echo "第幾次段考"?></td>
			<td><?php echo "教授"?></td>
		</tr>
		<?php }?>
		<?php  
			$year = floor($info[$i]->timeid/ 100);
			$semester = floor($info[$i]->timeid / 10 - $year*10);
			$times = floor($info[$i]->timeid - $year*100 - $semester * 10 );?>
			<tr>
				<td><?php echo $year?></td>
				<td><?php echo $semester?></td>
				<td><?php echo $times?></td>
				<td><?php echo $info[$i]->professor?></td>
				
			</tr>
		<?php  
		}?>
	</table>
</body>