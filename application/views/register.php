<?php include ("_header.php");
	  include ("_navbar.php"); 
	  if(!isset($_SESSION)){
	  	session_start();
	  }?>
	  
<!DOCTYPE html>

<body>
	<form action="<?=site_url("user/createUser")?>" method="post">
		帳號<input name="userID" value="<?php if(isset($alert)){
										echo $alert; }?>"></input>
		密碼<input name="password"></input>
		<button type="submit">Regist</button>
	</form>
</body>