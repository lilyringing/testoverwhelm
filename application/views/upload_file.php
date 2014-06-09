<?php if(!isset($_SESSION)){
		session_start();
}?>

<body>
	<div>
	<form action="<?=site_url("test/upload_test")?>" method = "post" name = "upload_file">
		<br>
		<br>
		<br>
		<div>
			科目：<input type="text" name = "subject">
			教授：<input type="text" name = "professor"><br>
			<input type="text" name = "year">年
			<select name = "semester"><option value = "1">上</option><option value = "2">下</option></select>學期
			第<input type="text" name = "times" value="幾">次考試<br>
		</div>
		<a href="<?=site_url(("test/upload_file/".($size+1)))?>">新增題目</a>
		<?php for($i = 0; $i < $size; $i++){?>
		<div>
			第<input type="text" name = "number<?php echo $i;?>" value="幾">題<br>
			<textarea name = "question<?php echo $i;?>"></textarea>
		</div>
		<?php }?>		
		<input type = "submit" value ="送出">
	</form>
	</div>

</body>