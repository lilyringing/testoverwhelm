<style>
	.sheet{
		position: relative;
		width: 80%;
		height:80%;
		margin-top: 10%;
		margin-left: auto;
		margin-right: auto;
		border: 1px solid;
		padding: 2em;
	}
	.icon{
		font-size: 2em;
		color: gray;
	}
	.icon:hover{
		color: black;
	}
	.ansId{
		display: none;
	}
	.ansBlock{
		display: none;
	}
	.formBlock{
		width: 100%;
	}
	textarea{
		resize: none;
		width:20em;
		height:9em;
	}
</style>

<?php if(!isset($_SESSION)){
		session_start();
	  }?>
<?php $session_account = $this->session->userdata('user');?>
<div class="sheet">
		<?php foreach($quest as $rows){?>
		<div class="question">
			<div><?php echo $rows->number; echo "."; ?></div>
			<div><?php echo $rows->question;?></div>

			<!-- print the answers of this question -->
			<div>
				<div class="ansBtn">Show answer</div>
				<div class="ansBlock">
			<?php if($answer[$rows->questionid] != null){ ?>


				   <?php foreach($answer[$rows->questionid] as $ans){?>
				  		<div><?php echo $ans->answer;?><br>
				  			<?php echo "<div class='fa fa-thumbs-o-up icon'><div class='ansId'>".$ans->answerid."</div></div>: ".$ans->good;?>
							<?php echo "<div class='fa fa-thumbs-o-down icon'><div class='ansId'>".$ans->answerid."</div></div>: ".$ans->bad;?>
							<?php echo "user:".$ans->account;?></div>
			<?php   }
				  }else{
				  	echo "no anwser";
				  	} ?>
				</div>
			</div>


				<!-- a form for upload answer with text -->
				<div class="formBlock">
				<div class="sendAns">
				<form action="<?=site_url("test/upload_text_ans")?>/<?php echo $rows->questionid?>" method="post">
					<textarea name="content"></textarea>
					<button type="submit">Send answer</button>
				</form>
				</div>
				<div class="upload">
				<!-- a form for upload answer with picture -->
				<?php echo form_open_multipart('test/upload_picture_ans/'.$rows->questionid);
		  		  	  echo form_upload('userfile');?>
		  			<input type="submit" value="upload" />
				<?php echo form_close();?>
				</div>
				</div>
</div>
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
$(".ansBtn").bind("click", function(){
	var index = $(".ansBtn").index(this);
	//$(".ansBlock:eq("+index+")").show();
	var aaa = $(".ansBlock:eq("+index+")").html();
	//alert(aaa)
	$(".ansBlock:eq("+index+")").toggle(200);
});

$(".icon").bind("click", function(){
	var index = $(".icon").index(this);
	var ansId = $(".ansId:eq("+index+")").html();
	//1 is good, 0 is bad
	index = (index+1)%2;

	$.ajax({
         url: '<?=site_url("test/add_good_bad")?>',
         cache: true,
         dataType: 'html',
             type:'POST',
         data: {answerID:ansId, gb:index},
         error: function(xhr) {
           alert('與伺服器連線失敗');//can be replaced with <div> or whatever to tell user connection error occured
         },
         success: function(response) {
         	alert(response);
         }
        });//end ajax

});
</script>