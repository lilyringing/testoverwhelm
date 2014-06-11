<body>
	<?php if( isset($answer) ) {?>
	<table>
		<tr>最新答案</tr>
			<td>科目</td>
			<td>回答者</td>
			<td>回答時間</td>
		<?php $answerSize = count($answer); 
		for($i = 0; $i < $answerSize; $i++) {?>
		<tr> 
			<td><a href = "<?=site_url("test/testing")?>/<?php echo $answer[$i]->fileid;?>"><?php echo $subject['answer'][$i]->subject;?></td> 
			<td><?php echo $answer[$i]->account;?></td>
			<td><?php echo $answer[$i]->updatetime;?></td>
		</tr>
		<?php }?>
	</table>
	<?php }?>
	<?php if( isset($file) ) {?>
	<table>
		<tr>最新題目</tr>
			<td>科目</td>
			<td>上傳者</td>
			<td>上傳時間</td>
		<?php foreach( $question as $row ){ ?>
		<tr> 
			<td><?php echo $row->subject;?></td> 
			<td><?php echo $row->account;?></td>
			<td><?php echo $row->updatetime;?></td>
		</tr>
		<?php }?>
	</table>
	<?php }?>
</body>
