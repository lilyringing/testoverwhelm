<?php if(!isset($_SESSION)){
		session_start();
	  }?>
<!DOCTYPE html>
<body>
	<table>
		<?php foreach($question as $rows){?>
		<tr>
			<td><?php echo $rows->number;?></td>
			<td><?php echo $rows->question;?></td>
		</tr>
		<?php }?>
	</table>
</body>