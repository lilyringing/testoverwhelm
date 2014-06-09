<?php if(!isset($_SESSION)){
		session_start();
	  }?>
<?php $session_account = $this->session->userdata('user');?>
<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div>
	<!-- a form for upload question with picture -->
	<?php echo form_open_multipart('test/upload_question/');
		  echo form_upload('userfile');?>
		<input type="submit" value="upload" />
	<?php echo form_close();?>
	</div>
</body>