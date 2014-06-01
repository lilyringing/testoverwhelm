<?php $session_account = $this->session->userdata('user');?>

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

<div class="navbar">

<?php if($session_account){?>
	<img src="<?= base_url('images/lulu.jpg') ?>" width="60px" height="60px"  class="img-circle">
	<?php echo $session_account->account;?>
	<a href="<?=site_url("user/logout")?>">登出</a>
	
	
<?php }else{?>
	<a href="<?=site_url("user/login")?>">登入</a>
	<a href="<?=site_url("user/register")?>">註冊</a>
<?php }?>

</div>