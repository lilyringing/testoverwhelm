<?php $session_id = $this->session->userdata('user');?>
	<div class="bs-example">
    	<div class="navbar navbar-static">
        	<div class="navbar-inner">
            	<a href="<?=site_url("/")?>" class="brand">Zoo</a>
            	<div class="nav-collapse collapse navbar-responsive-collapse">
            	<ul class="nav">
                	
                	<li><a href="<?=site_url("search/animal_info")?>">動物資訊</a></li>
                	
                	<li class="dropdown">
        				<a href="" class="dropdown-toggle" data-toggle="dropdown" class="dropdown-toggle">
        				園區資訊 <b class="caret"></b></a>
						<ul class="dropdown-menu">
          					<li><a href="<?=site_url("display/building")?>">展館位置</a></li>
          					<li><a href="<?=site_url("display/store")?>">商店位置</a></li>
							<li class="divider"></li>
							<li><a href="<?=site_url("display/traffic")?>">交通資訊</a></li>
						</ul>
					</li>
					
					<li><a href="<?=site_url("project/research")?>">研究計畫</a></li>
					<li><a href="<?=site_url("project/activity")?>">活動</a></li>
					
					<?php if($session_id){?>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown" class="dropdown-toggle">
        				後台管理 <b class="caret"></b></a>
        				<ul class="dropdown-menu">
        					<li><a href="<?=site_url("search/animal_info")?>">修改動物資訊</a></li>
        					<li><a href="<?=site_url("search/insert_animal")?>">新增動物</a></li>	
        				</ul>
					</li>
					<?php }?>
					
            	</ul>
            	</div>
            		
            	<?php if($session_id){?>
            	<ul class="nav pull-right">
            		<li><a href="<?=site_url("user/logout")?>">登出</a></li>
            		<li><a href="">Hi! <?php echo $session_id->Account;?></a></li>
            			  		
            	</ul>
            	
            	<?php }else{ ?>
            	<ul class="nav pull-right">
                	<li><a href="<?=site_url("user/login")?>">登入</a></li>
            	</ul>
            	<?php }?>
        	</div>
    	</div>
	</div>
	   