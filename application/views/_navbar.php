<div class="navbar">
	<div class="navbar-logo">
		<a href="<?php echo site_url('/'); ?>"><img src="<?php echo base_url('/images/logo.png'); ?> "></a>
	</div>

<?php $session_account = $this->session->userdata('user');?>
<link rel="stylesheet" type="text/css" href="">


<style type="text/css">
.navbar-logo{
	position:absolute;
	top:-20px;
	left:40px;
}
.navbar-a{
	height:50px;
}
.navbar-link{
	border-radius:5px;
	font-size: 20px;
	width:60px;
	height:40px;
	line-height: 40px;
	vertical-align: middle;
	text-align: center;
	float:right;
}
.navbar-link:hover{

	background: rgba(25,203,208,0.1);
}

.navbar{
	width: 100%;
	height:60px;
	text-align: right;
	padding-right: 20px;
	top:0px;
	font-size: 15px;
	z-index: 101;
	position: fixed;
	background-color: white;
}

.loginDiv{
	position:absolute;
	top:-60px;
	right:0px;
	height:60px;
	width:530px;
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
	width:100px;
}
.left-inner-submit input{
	width: 100px;

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
.navbar-loggedin{
	float:left;
	margin:10px;



}
.navbar-a .navbar-inner{
	right:0px;
	width:150px;
	height:30px;
	line-height: 30px;
	vertical-align: middle;
	font-size: 20px;

	position: absolute;
}
</style>

<?php if($session_account){?>



<div class="navbar-a">
	<div class="navbar-inner">
		<div class="navbar-loggedin">
			<img src="<?= base_url('images/lulu.jpg') ?>" width="30px" height="30px"  class="img-circle">
		</div>
		<div class="navbar-loggedin">
			<?php echo $session_account->account;?>
		</div>

		<div class="navbar-loggedin">
			<a id="logoutAnch" href='<?=site_url("user/logout")?>'>登出</a>
		</div>
	</div>

</div>





<?php }else{?>

<div class="navbar-a">
	<div class="navbar-link"><a href="#" class="loginBut">登入</a></div>

	<div class="navbar-link"><a href="<?=site_url("user/register")?>">註冊</a></div>
</div>


	<div class="loginDiv">
		<form id="loginForm" method="post">

			<?php if(isset($wrong)) {?>

			<script>alert("登入資訊有誤")</script>

			<?php } ?>
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


<script>

// Logged out 狀態時的SCRIPT
$(".loginBut").bind("click", function(){
    $('.navbar-a').slideUp(100);
    $('.loginDiv').animate({top:"10"},200);
});


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
           alert('與伺服器連線失敗');//can be replaced with <div> or whatever to tell user connection error occured
         },
         success: function(response) {
            if(  $(".sheet").html() !==undefined )
             {

                    var sheet = "<?php
                                        if( isset($fileID) )
                                        {
                                            echo site_url("test/testing")."/".$fileID;
                                        }
                                        else{
                                            echo site_url();
                                        }
                                        ?>";

                    $.ajax({
                     url: sheet,
                     cache: true,
                     dataType: 'html',
                         type:'POST',
                     data: {},
                     error: function(xhr) {
                        //wrong password (or account) message belongs 'success' block below
                       //alert('與伺服器連線失敗');//can be replaced with <div> or whatever to tell user connection error occured
                     },
                     success: function(res) {
                       //alert("與伺服器連線成功");//the same with 'error' block above

                        var newSheet = document.createElement("div");
                        newSheet.innerHTML = res;
                        $(".sheet").html($(newSheet).children(".sheet").html() );

                     }
                    });//end ajax
            }
            //alert(oldNav.html());//the same with 'error' block above
           //create a new node to be responese's parent node
            var newNav = document.createElement("div");
            newNav.innerHTML = response;
            //update navbar content
             oldNav.html($(newNav).children().html());




         }
        });//end ajax

});//end bind loginBtn

/*
*/


</script>
</div>


