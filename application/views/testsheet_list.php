<?php if(!isset($_SESSION)){
		session_start();

	  }?>
<script type="text/javascript" src="<?php echo base_url('/js/masonry.pkgd.min.js') ; ?>"></script>
<script>
$(document).ready(function(){
	var container = document.querySelector('#container');
	var msnry = new Masonry( container, {
	  // options
	  columnWidth: 50,
	  itemSelector: '.item'
	});
})


</script>

<style type="text/css">
.item{
	margin-left:10px;
	padding-left: 0px;
	padding-right: 0px;

}
.subject{
	margin: 0px auto; 
}
.list{
	margin-top:10%;
}

tr:hover{
	background:rgba(150,150,150,0.2);
}
</style>
<body>
	<div id="container" class="container list">
		<div class="row">
	<?php $cur = NULL;?>
	<?php for($i=0, $size = count($info); $i<$size; $i++){ ?>

	
	<?php if( $cur != $info[$i]->subject ) { ?>
	
			<div class="panel panel-default col-lg-3 item">
			  <div class="panel-heading">
			    <h3 class="panel-title"><?php echo ($cur = $info[$i]->subject);?></h3>
			  </div>
			  <table class="table">
				<thead>
					<tr>
						<th><?php echo "學年度"?></th>
						<th><?php echo "學期"?></th>
						<th><?php echo "第幾次段考"?></th>
						<th><?php echo "教授"?></th>
					</tr>
					
				</thead>

	<?php }?>

		<?php  
			$year = floor($info[$i]->timeid/ 100);
			$semester = floor($info[$i]->timeid / 10 - $year*10);
			$times = floor($info[$i]->timeid - $year*100 - $semester * 10 );?>
			
			<tr onclick="document.location = '<?php echo site_url('/test/testing/'.$info[$i]->fileid) ?>';">


				
					<td><?php echo $year?></td>
					<td><?php echo $semester?></td>
					<td><?php echo $times?></td>
					<td><?php echo $info[$i]->professor?></td>
				
			</tr>

			<?php if($i+1 != $size && ($cur != $info[$i+1]->subject)){ ?>	
			</table>
						</div>

			<?php } ?>

		<?php  
		}?>
		</div>
			
		</div>
		
	</div>		


			<!--  -->
		
		
		
	</div>
</body>