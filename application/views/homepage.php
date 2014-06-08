<?php include ("_header.php");
	  include ("_navbar.php");
	  if(!isset($_SESSION)){
	  	session_start();
	  }?>
<style type="text/css">

	body{
		background-image: url(<?= base_url("images/frontface.jpg") ?>);
		background-position: bottom left;
		background-size: 100%;
		background-repeat: no-repeat;
		height: 100%;
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
		height: 200px;
		width:800px;
				/*#73f3cd;*/


	}
	.search{
		height:200px;
		line-height: 200px;
		vertical-align: middle;


		float:left;
		width:100px;
			}
	.search-icon{
		line-height: 60px;
		height:60px;
		font-size: 100px;


	}
	.search-icon i{
		padding-top: 40px;
	}

	.search .search-input{
		line-height: 20px;
		vertical-align: middle;
		height:50px;
		width:100px;
	}
	.ac-other .action{
		height:200px;
		width:200px;
		font-size: 130px;
		position:absolute;
	}
	.ac-search .ac-search-div{
		margin-left:100px;
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
	.action:hover{
		opacity: 0.5;
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
</style>

<div class="action_set">
	<div class="ac_child ac-search">

		<div class="ac-search-div">
			<form method="post">

				<div class="search search-icon"><i class="fa fa-search" ></i></div>
				<div class="search" ><input type="text" class="search-input" name="subject" placeholder="Subject" ></div>
				<div class="search" ><input type="text" class="search-input" name="teacher" placeholder="Teacher"></div>
				<div class="search" ><input type="text" class="search-input" name="year" placeholder="Year"></div>

				<div class="search">
					<input id="searchBtn" type="button" class="search-input btn btn-default btn-lg" value="搜尋"></input>
				</div>


			</form>
		</div>



	</div>



	<div class="ac_child ac-other">
		<div class="search-result"></div>
		<div class="action action-archive"><i class="icon fa fa-archive"></i></div>

		<div class="action action-upload"><i class="icon fa fa-upload"></i></div>

		<div class="action action-users"><i class="icon fa fa-users"></i></div>
	</div>

</div>


<script>
	var lock = 0;//unlocked
	$(".action-archive").click()
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
</script>


<?php include ("_footer.php"); ?>