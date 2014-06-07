<?php $session_account = $this->session->userdata('user');?>

<div class="navbar">

<style type="text/css">
.navbar{
	width: 100%;
	height:60px;
	text-align: right;
	padding-right: 20px;
	position: absolute;
	top:10px;
	font-size: 2em;
}
</style>

<?php if($session_account){?>
	<img src="<?= base_url('images/lulu.jpg') ?>" width="60px" height="60px"  class="img-circle">
	<?php echo $session_account->account;?>
	<a id="logoutAnch" href="#">登出</a>
	
	<script>
	//these script code appear in DOM if user has been loggedin
$("#logoutAnch").bind("click", function(){
	var oldNav = $(".navbar");
	
	$.ajax({
         url: '<?=site_url("user/logout")?>',
         cache: true,
         dataType: 'html',
             type:'POST',
         data: {},
         error: function(xhr) {
           //alert('與伺服器連線失敗');//can be replaced with <div> or whatever to tell user connection error occured
         },
         success: function(response) {
           //alert("與伺服器連線成功");//the same with 'error' block above
           //create a new node to be responese's parent node
            var newNav = document.createElement("div");
            newNav.innerHTML = response;
            //update navbar content
			oldNav.html($(newNav).children().html());
         }
        });//end ajax

});//end bind logoutAnch

</script>
	
<?php }else{?>
	<a href="<?=site_url("user/login")?>">登入</a>
	<a href="<?=site_url("user/register")?>">註冊</a>

	<form id="loginForm" method="post">
		<?php if(isset($wrong)) {echo "帳號或密碼錯誤";} ?>
		登入帳號<input class="inputVal" name="userID" value = "<?php if(isset($userID)){
										echo $userID; }?>"></input>
		登入密碼<input class="inputVal" name="password"></input>
		<input type="button" id="loginBtn" value="Login"></input>
	
	</form>
	<script>
	//these script code appear in DOM if user hasn't been loggedin
$("#loginBtn").bind("click", function(){
	var userID = $(".inputVal")[0].value;
	var password = $(".inputVal")[1].value;
	var oldNav = $(".navbar");
	
	$.ajax({
         url: '<?=site_url("user/authenticate")?>',
         cache: true,
         dataType: 'html',
             type:'POST',
         data: { userID: userID, password: password},
         error: function(xhr) {
         	//wrong password (or account) message belongs 'success' block below
           //alert('與伺服器連線失敗');//can be replaced with <div> or whatever to tell user connection error occured
         },
         success: function(response) {
           //alert("與伺服器連線成功");//the same with 'error' block above
           //create a new node to be responese's parent node
            var newNav = document.createElement("div");
            newNav.innerHTML = response;
            //update navbar content
			oldNav.html($(newNav).children().html());
         }
        });//end ajax

});//end bind loginBtn

</script>
<?php }?>

</div>

