<?php if(!isset($_SESSION)){
		session_start();
	  }?>
<?php $session_account = $this->session->userdata('user');?>

<!DOCTYPE html>
<body>
		<?php foreach($quest as $rows){?>
		<ul>
			<li><?php echo $rows->number;?></li>
			<li><?php echo $rows->question;?></li>
			
			<!-- print the answers of this question -->
			<?php if($answer[$rows->questionid] != null){
					echo "Answer:";
				    foreach($answer[$rows->questionid] as $ans){?>
				  		<li><?php echo $ans->answer;?><br>
				  			<?php echo "good: ".$ans->good;?>
							<?php echo "bad: ".$ans->bad;?></li>
			<?php   }
				  }?>
		</ul>
		
				<!-- a form for upload answer with text -->
				<form action="<?=site_url("test/upload_text_ans")?>/<?php echo $rows->questionid?>" method="post">
					<textarea name="content"></textarea>
					<button type="submit">Send answer</button>
				</form>		
			
				<!-- a form for upload answer with picture -->
				<?php echo form_open_multipart('test/upload_picture_ans/'.$rows->questionid);
		  		  	  echo form_upload('userfile');?>
		  			<input type="submit" value="upload" />
				<?php echo form_close();?>
						
		<?php }?>
	
</body>