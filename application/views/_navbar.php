<?php $session_account = $this->session->userdata('user');?>

<?php if($session_account){?>
	<a href="<?=site_url("user/logout")?>">登出</a>
	Hi! <?php echo $session_account->account;?>
	
<?php }else{?>
	<a href="<?=site_url("user/login")?>">登入</a>
	<a href="<?=site_url("user/register")?>">註冊</a>
<?php }?>