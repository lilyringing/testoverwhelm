<style type="text/css">
.out-container{
	position:absolute;
	top:100px;

}
.new-answer{
	
}
.new-file{
	
}
</style>
<div class="out-container col-lg-12">

	<div class="new-answer col-lg-offset-1 col-lg-4 well">
		<?php if( isset($answer) ) {?>
		<table>
			<tr><h2>最新答案</h2></tr>
				<td class="col-md-3">科目</td>
				<td class="col-md-3">回答者</td>
				<td class="col-md-6">回答時間</td>
			<?php $answerSize = count($answer); 
			for($i = 0; $i < $answerSize; $i++) {?>
			<tr > 
				<td class="col-md-3"><a href = "<?=site_url("test/testing")?>/<?php echo $answer[$i]->fileid;?>"><?php echo $subject['answer'][$i]->subject;?></td> 
				<td class="col-md-3"><?php echo $answer[$i]->account;?></td>
				<td class="col-md-6"><?php echo $answer[$i]->updatetime;?></td>
			</tr>
			<?php }?>
		</table>
		<?php }?>

	</div>
	<div class="new-file col-lg-offset-2 col-lg-4 well">
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
	</div>	
	
	


</div>
	