<?php include ("_header.php");
	  include ("_navbar.php"); 
	  if(!isset($_SESSION)){
	  	session_start();
	  }?>



 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/css/register.css'); ?> ">


<div class="container">
	<section id="content">
		<form action="<?php echo site_url('user/createUser') ?>" method="post">
			<h1>Register</h1>
			<div>
				<input type="text" id="username" name="userID" value="<?php if(isset($alert)){
										echo $alert; }?>" placeholder="UserID"></input>
			</div>
			<div>
				<input type="password" id="password" name="password" placeholder="Password"></input>
			</div>
			<div>
				<input type="submit" value="Register" />
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->
<?php include('_footer.php'); ?>
