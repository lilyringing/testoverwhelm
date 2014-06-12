<?php include ("_header.php");
	  include ("_navbar.php");
	  if(!isset($_SESSION)){
	  	session_start();
	  }?>

<style type="text/css">

	.background-div{
		position:absolute;
		width:100%;
		height:100%;
		background-image: url(<?= base_url("images/TSAY.jpg") ?>);
		background-position:bottom left;
		background-repeat: no-repeat;
		background-size: 40%;
		opacity: 0.5;
	
	}
	.icon{

	}
	.ac_child{
		color: #4f4e4d;
	}
	.action_set{
		width: 800px;
		height: 450px;
		margin-top: 170px;

		float :right;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		overflow: hidden;
		background: rgba(255, 200,141 , 0.5);


	}
	.action_set .ac_child{
		height: 225px;
		width:800px;
				/*#73f3cd;*/


	}
	.search{
		height:50px;
		line-height: 50px;
		vertical-align: middle;

		float:left;
		
	}


	.search-icon{
		line-height: 100px;
		height:100px;
		font-size: 100px;


	}
	.search-icon i{
		padding-top: 40px;
	}

	.search .search-input{
		line-height: 20px;
		vertical-align: middle;
		height: 30px;
		width:100px;
		border:0;
	}
	.search #searchBtn{
		height:52px;
		width: 100px;
		margin-top:0px; 
		padding: 6px 30px; 
		font-size: 14px; 
		line-height: 30px;
		vertical-align: middle; 
		color: #555; 
		background-color: #fff;
		background-image: none; 
		border: 0; 
		margin-left: 50px;
	}
	.search #searchBtn:hover{
		background: rgba(30,30,30,0.2);
		
	}
	.ac-other .action{
		height:225px;
		width:225px;
		font-size: 130px;
		line-height: 225px;
		vertical-align: middle;
		position:absolute;
		text-align: center;
	}
	.ac-search .ac-search-div{
		margin-left:100px;
		height:225px;
		line-height: 225px;
		vertical-align: middle;

		
		float:left;
		width:500px;
	}

	.action.action-archive{
		margin-left:75px;
	}

	.action.action-upload{
		margin-left:325px;
	}
	.action.action-users{
		margin-left:575px;
	}
	.action .icon:hover{
		opacity: 0.5;
	}
	
	.ac-search-div .search-all{
		position:absolute;
		margin-top:60px;
		margin-left:130px;
		background-color:white;
		height:50px;
		width:500px;
		border-radius: 25px;
		text-align: center;
		padding-left:40px;
		overflow: hidden;


	}


	.search-result{
		position: absolute;
		width: inherit;
		height: inherit;
		z-index: 999;
		opacity: 0.7;
		background-color: white;
		display: none;
	}
	.action .act-describe{
		font-size: 30px;
		position: absolute;
		color: white;
		z-index: 999;
		height: 80%;
		width: 80%;
		background-color: rgba(0,0,0,0.5);
		opacity: 0;
		border-radius: 10px;
		margin-left: 10%;
		margin-top: 10%;
		

	}
	.action .act-describe:hover{
		opacity: 1;
	}
	

</style>
<div class="background-div"></div>

<div class="action_set">
	<div class="ac_child ac-search">

		<div class="ac-search-div">
			<form method="post">

				<div class="search search-icon"><i class="fa fa-search" ></i></div>

				<div class="search-all">
					<div class="search"><input type="text" class="search-input" name="subject" placeholder="Subject" ></div>
					<div class="search">/</div>
					<div class="search"><input type="text" class="search-input" name="teacher" placeholder="Teacher"></div>
					<div class="search">/</div>
					<div class="search"><input type="text" class="search-input" name="year" placeholder="Year"></div>
					
					<div class="search">
						<input id="searchBtn" type="button" class="search-input" value="搜尋"></input>
					</div>
				</div>
				
				
	
			</form>
		</div>



	</div>



	<div class="ac_child ac-other">
		<div class="search-result"></div>
		<div class="action action-archive">
			<div class="act-describe">瀏覽題庫</div>
			<i class="icon fa fa-archive"></i>
		</div>

		<div class="action action-upload">
			<div class="act-describe">上傳題目</div>
			<i class="icon fa fa-upload"></i>
		</div>

		<div class="action action-users">
			<div class="act-describe">最新動態</div>
			<i class="icon fa fa-users"></i>
		</div>
	</div>

</div>


<script>
	
	$("#searchBtn").blur(function(){
		$(".search-result").fadeOut(100);
	})

	var lock = 0;//unlocked
	$("#searchBtn").bind("click", function(){
		if(lock == 0)
		{
			lock = 1;//locked to defend against crazy clicking
		var subject = $(".search-input")[0].value;
		var teacher = $(".search-input")[1].value;
		var year = $(".search-input")[2].value;
		var oldResult = $(".search-result");

		oldResult.fadeOut(0);
		//var oldNav = $(".navbar");

		$.ajax({
         url: '<?=site_url("search/searching")?>',
         cache: true,
         dataType: 'html',
             type:'POST',
         data: {subject: subject, teacher: teacher, year: year},
         error: function(xhr) {
           //alert('與伺服器連線失敗');//can be replaced with <div> or whatever to tell user connection error occured
			oldResult.html("connection fail");
			oldResult.fadeIn(0).show(400, function(){lock = 0;});//unlocked after 400 ms
         },
         success: function(response) {
           //alert("與伺服器連線成功");//the same with 'error' block above
           //create a new node to be responese's parent node
            var newResult = document.createElement("div");
            newResult.innerHTML = response;
            //update search result content
			oldResult.html($(newResult).children(".search-result").html());
			oldResult.fadeIn(0).show(400, function(){lock = 0;});//unlocked after 400 ms
/*//////////////////////////////////////////////////////////////////////////////////////
			don't change the class in view:search_result.php
//////////////////////////////////////////////////////////////////////////////////////*/

         }
        });//end ajax

		}//end if lock
	})//end bind searchBtn



//////icon link click js

$(".action-archive").click(function(event){
    window.location.href = '<?php echo site_url("/search/search_all") ; ?>';
});

$(".action-upload").click(function(event){
    window.location.href = '<?php echo site_url("/test/upload_file") ; ?>';
});


</script>



<?php include ("_footer.php"); ?>