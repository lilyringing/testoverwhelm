<?php include ("_header.php");
	  include ("_navbar.php"); 
	  if(!isset($_SESSION)){
	  	session_start();
	  }?>

	<div >
		<form action="<?=site_url("search/searching")?>" method="post">
			Subject: <input type="text" placeholder="請輸入搜尋內容" name="subject" ></br>
  			Teacher: <input type="text" placeholder="請輸入搜尋內容" name="teacher" ></br>
			Year: <input type="text" placeholder="請輸入搜尋內容" name="year" ></br> 
			
			<button type="submit">搜尋</button>
		
		</form>
	</div>
	
<?php include ("_footer.php"); ?>