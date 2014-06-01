<?php include ("_header.php");
	  include ("_navbar.php"); 
	  if(!isset($_SESSION)){
	  	session_start();
	  }?>

<div>
	<div class="search">
		<form action="<?=site_url("search/searching")?>" method="post">

			<span style="font-size:5em;"><i class="fa fa-search" ></i></span>
			Subject: <input type="text" placeholder="請輸入搜尋內容" name="subject" ></br>
  			Teacher: <input type="text" placeholder="請輸入搜尋內容" name="teacher" ></br>
			Year: <input type="text" placeholder="請輸入搜尋內容" name="year" ></br> 
			
			<button type="submit" class="btn">搜尋</button>
		
		</form>
	</div>

	<div class="other">
		<span><i></i></span>
		<span><i></i></span>
		<span><i></i></span>
	</div>

</div>


<?php include ("_footer.php"); ?>