<?php include ("_header.php");
	  include ("_navbar.php"); 
	  if(!isset($_SESSION)){
	  	session_start();
	  }?>
<style type="text/css">
	
	body{
		background-image: url(<?= base_url("images/frontface.jpg") ?>);
		background-position: top left;
		background-size: 100%;

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

</style>

<script>
	$(".action-archive").click()
</script>

<div class="action_set">
	<div class="ac_child ac-search">
		
		<div class="ac-search-div">
			<form action="<?=site_url("search/searching")?>" method="post">

				<div class="search search-icon"><i class="fa fa-search" ></i></div>
				<div class="search" ><input type="text" class="search-input" name="subject" placeholder="Subject" ></div>
				<div class="search" ><input type="text" class="search-input" name="teacher" placeholder="Teacher"></div>
				<div class="search" ><input type="text" class="search-input" name="year" placeholder="Year"></div>
				
				<div class="search">
					<button type="submit" class="search-input btn btn-default btn-lg">搜尋</button>
				</div>
				
			
			</form>
		</div>

		
		
	</div>



	<div class="ac_child ac-other">
		<div class="action action-archive"><i class="icon fa fa-archive"></i></div>

		<div class="action action-upload"><i class="icon fa fa-upload"></i></div>
	
		<div class="action action-users"><i class="icon fa fa-users"></i></div>
	</div>

</div>


<?php include ("_footer.php"); ?>