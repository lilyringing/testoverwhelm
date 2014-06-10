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
		<?php if(isset($error)){ ?>
		<div><?php echo $error; ?> </div>
		<?php } ?>
		<div class="well">
			科目：<input type="text" name = "subject">
			教授：<input type="text" name = "professor">
			<input type="text" name = "year">年
			<select name = "semester"><option value = "1">上</option><option value = "2">下</option></select>學期
			第<input type="text" name = "times">次考試
			<a class="addQuestion">新增題目</a>
			<a href="<?=site_url("test/upload_page/")?>" target="_blank">OCR</a>
		</div>
		<div class="Quest-all">

		</div>	

				<div>
					<input type = "submit" value ="送出">
				</div>
	</form>
	</div>
	<script>
	var count = 0;
	var appendQ = '<div class="well questionList"><div style="float:left;">第<input type="text">題</div><div><textarea style="margin-left:20px; width:600px;"></textarea></div></div>'
		$(".addQuestion").bind("click",function(){
			$(appendQ).appendTo('.Quest-all').find('input').attr('name','number'+count);
			$('.Quest-all .questionList').last().find('textarea').attr('name','question'+count);
			count++;
		})
	</script>

</body>