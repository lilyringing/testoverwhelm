
<?php if(!isset($_SESSION)){
		session_start();
	  }?>
<?php $session_account = $this->session->userdata('user');
?>
<div class="sheet">
<style>
	.sheet{
		position: relative;
		width: 80%;
		height: 80%;
		margin-top: 10%;
		margin-bottom: 10%;
		margin-left: auto;
		margin-right: auto;
		border: 1px solid;
		padding: 2em;
	}
	.question{
		width: 100%;
		position: relative;
		float:left;
	}
	.info, .number, .questContent, .ansBlock, .ansMain, .ansChild, .ansContent, .iconBlock, .formBlock, .sendAns, .uploadParent, .commentBlock, .commentChild{
		width: 100%;
		position:relative;
		float: left;
		margin-top: 0.4em;
		outline: none;
	}
	.ansBtn, .sendBtn, .uploadBtn, .showSendBtn{
		position: relative;
		float: left;
		width: 10em;
		margin-right: 2em;
	}
	.sendBtn{
		top:92px;
		margin-left: 1em;
	}
	.ansBtn input, .sendBtn button, .uploadBtn input, .showSendBtn input{
		height: 34px;
		padding: 6px 30px;
		font-size: 14px;
		line-height: 1.42857143;
		color: #555;
		background-color: #fff;
		background-image: none;
		border: 1px solid #ccc;
 		border-radius: 4px;
	}
	.questId, .ansId, .ansParent, .formBlock{
		display: none;
	}
	.ansChild, .commentChild{
		margin-left: 1em;
		margin-top: 0.4em;
	}
	.author, .thumb{
		position: relative;
		float: left;
		margin-right: 2em;
	}
	.thumb_icon, .author_icon, .noAns_icon, .comment_icon{
		font-size: 2em;
		color: gray;
	}
	.thumb_icon:hover, .author_icon:hover, .noAns_icon:hover, .comment_icon:hover{
		color: black;
	}
	.gb{
		display: inline-block;
	}
	.uploadChild{
		width: 12em;
		margin-right: 9em;
		position: relative;
		float: left;
	}
	textarea{
		resize: none;
		width:20em;
		height:9em;
		position: relative;
		float: left;
	}
	.editing{
		background-color: rgba(255, 200,141 , 0.5);
	}
	.title{
		position: relative;
    		text-align: center;
    		font-size: 2em;
	}
	.detail{
		position: relative;
    		text-align: right;
    		font-size: 1em;
	}
	.editPosition{
		position: fixed;
		bottom:5%;
		right:3%;
	}
	.editPosition input{
		height: 34px;
		padding: 6px 1em;
		font-size: 14px;
		line-height: 1.42857143;
		color: #555;
		background-color: #c7c7c7;
		background-image: none;
		border: 1px solid #ccc;
 		border-radius: 4px;
	}
</style>
<div class="info"><p class="title"><?php echo $info->subject."&nbsp;&nbsp;&nbsp;".$info->professor;?></p></div>
<div class="info"><p class="detail">
	<?php
		echo intval($info->timeid/100)."年";
		if( intval($info->timeid%10) == 1){
			echo "上學期";
		}
		else{
			echo "下學期";
		}
		echo "第".intval($info->timeid%100/10)."次段考";
	?>
		     </p>
</div>
<?php if($session_account){ ?>
<div class="editPosition">
	<input type="button" value="edit" class="edit">
</div>
<?php }//end if ?>
		<?php
		if($quest[0] != null){
		 foreach($quest as $rows){?>
		<div class="question">
			<div class="number"><?php echo $rows->number; echo "."; ?></div>
			<div class="questContent">
				<?php
					echo $rows->question;
				?>
			</div>
			<div class="questId"><?php echo $rows->questionid ?></div>
			<!-- print the answers of this question -->
		<?php if($session_account){ ?>
			<div  class="ansBlock">
				<div class="ansBlock">
					<div class="ansBtn"><input type="button" value="Show answer"></div>
					<div class="showSendBtn"><input type="button" value="Write answer"></div>
				</div>
				<div  class="ansParent">

			<?php if($answer[$rows->questionid] != null){ ?>
				   <?php foreach($answer[$rows->questionid] as $ans){?>
				  		<div class="ansChild">
				  			<div class="ansContent">
				  				<?php
				  				if( file_exists($ans->answer) )
				  				{
				  					$front_url = substr(site_url(), 0, strrpos(site_url(), "/") );

				  					$pic_filename = strrchr($ans->answer, "/");
				  					$pic_filename = substr($pic_filename, 1);
				  					$pic_path = $front_url."/upload/".$pic_filename;
				  				?>
				  				<img src="<?php echo $pic_path;?>">
				  			<?php }
				  				else{
				  					echo $ans->answer;
				  				} ?>
				  			</div>
				  			<div class="iconBlock">
				  				<?php echo "<div class='author'><div class='fa fa-user author_icon'></div>: ".$ans->account."</div>";?>
				  				<?php echo "<div class='thumb'><div class='fa fa-thumbs-o-up thumb_icon'><div class='ansId'>".$ans->answerid."</div></div>: <div class='gb'>".$ans->good."</div></div>";?>
								<?php echo "<div class='thumb'><div class='fa fa-thumbs-o-down thumb_icon'><div class='ansId'>".$ans->answerid."</div></div>: <div class='gb'>".$ans->bad."</div></div>";?>
							</div>
						</div>
			<?php   }
				  }else{
				  	echo "<div class='ansChild'><div class='fa  fa-times-circle noAns_icon'></div> no anwser</div>";
				  	} ?>
				</div>
			</div>


				<!-- a form for upload answer with text -->
				<div class="formBlock">
				<div class="sendAns">
				<form action="<?=site_url("test/upload_text_ans")?>/<?php echo $rows->questionid?>" method="post">
					<textarea name="content" placeholder="用文字作答或是上傳圖片都可以"></textarea>
					<div class="sendBtn"><button type="submit">Send answer</button></div>
				</form>
				</div>
				<div class="uploadParent">
				<!-- a form for upload answer with picture -->
					<div class="uploadChild">
						<?php echo form_open_multipart('test/upload_picture_ans/'.$rows->questionid);
		  		  	  	echo form_upload('userfile');?>
		  		  	  </div>
		  		  	  <div class="uploadChild uploadBtn">
		  				<input type="submit" value="upload" />
		  			  </div>
				<?php echo form_close();?>
				</div>
				</div>
		<?php }// end if($session_account) ?>
		</div>
		<?php }//end foreach
			}else {
				echo "<div class='ansChild'><div class='fa  fa-times-circle noAns_icon'></div> no question</div>";
				}?>

		<?php if($session_account){ ?>
		<div class="commentBlock">
			<div class="commentParent"><div class="fa  fa-comments comment_icon"></div> Comment:</div>
			<!-- print comments of this testsheet -->
			<?php if($comment != null){
					foreach($comment as $com){?>
						<div class="commentChild"><div class="fa  fa-child comment_icon"></div>: <?php echo $com->comment;?></div>
				<?php   }//end foreach
			 	 }else{ ?>
			 	 <div class="commentChild">no comments</div>
			 <?php	 } ?>

			<!-- a form for upload answer with text -->
			<form action="<?=site_url("test/upload_comment")?>/<?php echo $this->uri->segment(3);?>" method="post">
				<textarea name="comment"></textarea>
				<div class="sendBtn"><button type="submit">Send</button></div>
			</form>
		</div>
		<?php }//end if($session_account){ ?>
		<div style="opacity:0.01; width:1px">sad</div>
<script>
var editing =0;//0 = no, 1= yes
$(".ansBtn").bind("click", function(){
	var index = $(".ansBtn").index(this);
	if( $(".ansParent:eq("+index+")").css("display") == "none" )
	{
		$(".ansParent:eq("+index+")").fadeIn(200);
	}
	else
	{
		$(".ansParent:eq("+index+")").fadeOut(200);
	}
});


$(".showSendBtn").bind("click", function(){
	var index = $(".showSendBtn").index(this);
	if( $(".formBlock:eq("+index+")").css("display") == "none" )
	{
		$(".formBlock:eq("+index+")").fadeIn(200);
	}
	else
	{
		$(".formBlock:eq("+index+")").fadeOut(200);
	}
});

$(".thumb_icon").bind("click", function(){

	var index = $(".thumb_icon").index(this);
	var ansId = $(".ansId:eq("+index+")").html();
	var thisGb = $(".gb:eq("+index+")") ;

	var anotherGb;
	if( index % 2 ==0)
	{

		anotherGb = $(".gb:eq("+(index+1)+")");
	}
	else{
		anotherGb = $(".gb:eq("+(index-1)+")");
	}
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
         	if(response==0)
         	{
         		//add new
         	   thisGb.html( parseInt(thisGb.html(), 10)+1 );
         	}
         	else if(response==1)
         	{
         		//cancel vote
         	   thisGb.html( parseInt(thisGb.html(), 10)-1  );
         	}
         	else if( response==2 )
         	{
         		//change vote
         	   thisGb.html( parseInt(thisGb.html(), 10)+1  );
         	   anotherGb.html( parseInt(anotherGb.html(), 10)-1  );
         	}
         	else{
         		alert("喔啊不就直接尻網址好棒棒！去資種練練吧！")
         	}//end if

         }
        });//end ajax
});

<?php if($session_account){ ?>
$(".edit").bind("click", function(){
	if(editing==0)
	{
		$(".questContent").each(function(){
			$(this).attr("contentEditable", true);
			$(this).addClass("editing");
		})
		editing=1;
		alert("editing mode on")
	}
	else if (editing ==1 )
	{
		var questContent =[];
		var questId=[];
		$(".questContent").each(function(){
			questContent.push( $(this).html() );
		});
		$(".questId").each(function(){
			questId.push( $(this).html() );
		});
		$.ajax({
         		url: '<?=site_url("test/edit_test")?>/<?php echo $this->uri->segment(3);?>',
         		cache: true,
         		dataType: 'html',
         		    type:'POST',
         		data: {questionArray: questContent, questionid: questId},
         		error: function(xhr) {
         		  alert('與伺服器連線失敗');//can be replaced with <div> or whatever to tell user connection error occured
         		},
         		success: function(response) {
         			//update question content
			$(".questContent").each(function(){
				$(this).removeAttr("contentEditable");
				$(this).removeClass("editing");
			})
			editing = 0;
			alert("editing mode off")
         		}
       		});//end ajax
	}
})
<?php }//end if?>
</script>
</div>
