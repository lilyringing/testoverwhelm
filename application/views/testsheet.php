<?php if(!isset($_SESSION)){
		session_start();
	  }?>
<!DOCTYPE html>
<body>
	<table border=1>
		<?php foreach($quest as $rows){?>
		<tr>
			<td><?php echo $rows->number;?></td>
			<td><?php echo $rows->question;?></td>
			<td>
			<?php if($answer[$rows->questionid] != null){
				    foreach($answer[$rows->questionid] as $ans){
				       echo "A:";?>
				    
				  		<?php echo $ans->answer;?>
				  	
				  		<?php echo "good".$ans->good;?>
						<?php echo "bad".$ans->bad;?><br>
			<?php   }
				  }?>
		<?php }?></td>
		</tr>
	</table>
</body>