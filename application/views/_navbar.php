<div class="navbar">

<?php $session_account = $this->session->userdata('user');?>


<style type="text/css">
.navbar{
	width: 100%;
	height:60px;
	text-align: right;
	padding-right: 20px;
	position: absolute;
	top:10px;
	font-size: 15px;
}

.loginDiv{
	position:absolute;
	top:-60px;
	right:10px;
	height:60px;
	width:700px;
}

.left-inner-addon {
    position: relative;
    float:left;
    margin-left: 1px;
    width:200px;
}
.left-inner-addon input {
    
    width: 200px;
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
.left-inner-addon i {
    position: absolute;
    padding: 10px 12px;
    pointer-events: none;
}

.left-inner-submit{
	float:left;
	position:relative;
	margin-left:1px;
	width:100;
}
.left-inner-submit input{
	width: 100px;
	height: 34px; 
	padding: 6px 30px; 
	font-size: 14px; 
	line-height: 1.42857143; 
	color: #555; 
	background-color: rgba(0,0,0,0.5); 
	background-image: none; 
	border: 1px solid #ccc; 
 	border-radius: 4px; 

}
</style>


<script>
	//these script code appear in DOM if user has been loggedin
$(".navbar").on("click","#logoutAnch", function(){
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



// Logged out 狀態時的SCRIPT

$(".navbar").on("click",".loginBut", function(){
	$('.navbar-a').slideUp(100); 
	$('.loginDiv').animate({top:"10"},200);

});


$("body").on("click","#loginBtn", function(){
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


<?php if($session_account){?>
<img src="<?= base_url('images/lulu.jpg') ?>" width="60px" height="60px"  class="img-circle">
<?php echo $session_account->account;?>
<div class="navbar-a">
	<a id="logoutAnch" href="#">登出</a>
</div>





<?php }else{?>
<div class="navbar-a">
	<a href="#" class="loginBut">登入</a>
	<a href="<?=site_url("user/register")?>">註冊</a>
</div>


	<div class="loginDiv">
		<form id="loginForm" method="post">
			<?php if(isset($wrong)) {echo "帳號或密碼錯誤";} ?>

			<div class="left-inner-addon">
				<i class="fa fa-user"></i>
				<input type="text" class="inputVal" name="userID" placeholder="user account" value = "<?php if(isset($userID)){echo $userID; }?>"></input>
			</div>
			
			<div class="left-inner-addon">
				<i class="fa fa-lock"></i>

				<input type="password" class="input inputVal" placeholder="password" name="password"></input>
			</div>
			<div class="left-inner-submit">
				<input type="button" id="loginBtn" value="Login"></input>
			</div>
			
		
		</form>
	</div>




<?php }?>
</div>


