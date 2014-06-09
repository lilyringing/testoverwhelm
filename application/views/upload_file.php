<?php if(!isset($_SESSION)){
		session_start();
}?>
<style type="text/css">
.quesForm{
	margin-top:100px;
}
.questionList{
	vertical-align: text-bottom;
}
</style>

<body>
	<div class="quesForm container">
	<form action="<?=site_url("test/upload_test")?>" method = "post" name = "upload_file">
		
		<div class="well">
			科目：<input type="text" name = "subject">
			教授：<input type="text" name = "professor">
			<input type="text" name = "year">年
			<select name = "semester"><option value = "1">上</option><option value = "2">下</option></select>學期
			第<input type="text" name = "times" value="幾">次考試
			<a href="<?=site_url(("test/upload_file/".($size+1)))?>">新增題目</a>
			<a href="<?=site_url("test/upload_page/")?>" target="_blank">OCR</a>
		</div>

		<?php for($i = 0; $i < $size; $i++){?>
			<div class="well questionList">
				<div style="float:left;">
					第<input type="text" name = "number<?php echo $i;?>" value="">題
				</div>
				

				<div>
					<textarea style="margin-left:20px; width:600px;" name = "question<?php echo $i;?>"></textarea>
				</div>
				
				
				
			</div>
		<?php }?>		
			<div>
					<input type = "submit" value ="送出">
				</div>
	</form>
	</div>

</body>