<script>
	jQuery(function(){
		

		jQuery('#camera_wrap').camera({
			height: '600px',
			loader: 'bar',
			pagination: false,
			thumbnails: true,
			fx: 'topLeftBottomRight',
			barDirection: 'rightToLeft',
			time: 3000,
			hover: false,
			height: '45%'
		});
	});
</script>
<div class="col-sm-10 col-md-offset-1 hidden-xs">
	<div class="camera_wrap camera_magenta_skin" id="camera_wrap">
		<?php for($i=0;$i<sizeof($data['row']);$i++){?>
			<div data-thumb="<?php echo $data['row'][$i]['SRC'];?>" data-src="<?php echo $data['row'][$i]['SRC'];?>">
				<div class="camera_caption fadeFromBottom">
					<?php 
					$str=(trim($data['row'][$i]['DESCR'])=="")? "" : ' <em>(' . $data['row'][$i]['DESCR'] . ')</em>' ;
					echo '<a href="'.$data['row'][$i]['URL'].'">'.$data['row'][$i]['NAME']. '</a>' . $str;
					?>
				</div>
			</div>
		<?php }?>
	</div>
</div>
<script type='text/javascript' src='js/homeslider/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='js/homeslider/camera.min.js'></script> 
<script type='text/javascript' src='js/homeslider/jquery.mobile.customized.min.js'></script>