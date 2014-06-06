<?php if(!isset($_SESSION)){
		session_start();
	  }?>
<!DOCTYPE html>
<body>
	<table>
		<tr>
			<td><?php echo "科目"?></td>
			<td><?php echo "學年度"?></td>
			<td><?php echo "學期"?></td>
			<td><?php echo "第幾次段考"?></td>
			<td><?php echo "教授"?></td>
		</tr>
		
		<?php foreach($info as $rows){
				$times = $rows->timeid / 10;
				$semester = ($rows->timeid / 100 - $times) / 10;
				$year = ($rows->timeid - $semester*10 - $times) / 100;?>
			<tr>
				<td><?php echo $rows->subject?></td>
				<td><?php echo $year?></td>
				<td><?php echo $semester?></td>
				<td><?php echo $times?></td>
				<td><?php echo $rows->professor?></td>
				
			</tr>
		<?php }?>
	</table>
</body>