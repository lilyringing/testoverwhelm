<style>
	.icon{
		font-size: 2em;
		color: gray;
	}
	.icon:hover{
		color: black;
	}
	.ansBlock{
		display: none;
	}
</style>

<?php if(!isset($_SESSION)){
		session_start();
	  }?>
<?php $session_account = $this->session->userdata('user');?>
<div>
		<?php foreach($quest as $rows){?>
		<ul>
			<li><?php echo $rows->number;?></li>
			<li><?php echo $rows->question;?></li>

			<!-- print the answers of this question -->
			<div>
				<div class="ansBtn">Answer</div>
			<?php if($answer[$rows->questionid] != null){ ?>
				<div class="ansBlock">

				   <?php foreach($answer[$rows->questionid] as $ans){?>
				  		<li><?php echo $ans->answer;?><br>
				  			<?php echo "<div class='fa fa-thumbs-o-up icon'></div>: ".$ans->good;?>
							<?php echo "<div class='fa fa-thumbs-o-down icon'></div>: ".$ans->bad;?>
							<?php echo "user:".$ans->account;?></li>
			<?php   }
				  }else{
				  	echo "no anwser";
				  	} ?>
				</div>
			</div>
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

		<!-- print comments of this testsheet -->
		<?php if($comment != null){
				echo "Comment:";
				foreach($comment as $com){?>
				<ul>
					<li><?php echo $com->comment;?></li>
				</ul>
		<?php   }
		 	  }?>

		<!-- a form for upload answer with text -->
		<form action="<?=site_url("test/upload_comment")?>/<?php echo $this->uri->segment(3);?>" method="post">
			<textarea name="comment"></textarea>
			<button type="submit">Send comment</button>
		</form>
</div>

<script>
alert(1)
$(".ansBtn").bind("click", function(){
	var index = $(".ansBtn").index(this);
	$(".ansBlock:eq("+index+")").show();
	var aaa =  $(".ansBlock:eq("+index+")").html();
	alert(a)
});
</script>