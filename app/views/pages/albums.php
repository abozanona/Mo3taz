<div class="row">
	<?php if($data['id']!=null or isset($data['search'])){?>
	<div class="col-md-10 col-md-offset-1 searchResult">
		<h3>
			<?php if(isset($data['search'])){?>
			<span class="glyphicon glyphicon-camera"></span>
			نتائج البحث عن :
			<?php }?>
			<samp><?php if($data['id']!=null) echo $data['album']; else echo '" '.$data['search'].' "';?></samp>
		</h3>
	</div>
	<?php }?>
	<div class="col-md-10 col-md-offset-1">
		<div class="row albums">
			<?php
			for($i=0;$i<sizeof($data['row']);$i++)
			{
			$info=$data['row'][$i];
			?>
			<div class="col-md-4 col-sm-3">
				<?php if($data['id']==null){?>
				<div class="albumName">
				<b><?php echo $info['NAME']?></b>
				</div>
				<?php }?>
				<div class="albumPic">
			<a href="<?php echo $info['URL'];?>" class="darkness"><img src="<?php echo $info['SRC'];?>"/></a>
				</div>
				<?php if($data['id']==null){?>
				<div class="albumInfo">
					<samp class="picsNo">
						<?php echo $info['PICNO'] ?> صورة
					</samp>
					<samp class="rate">
						التقييم: <?php echo number_format($info['RATE'], 2, '.', ''); ?>
					</samp>
				</div>
				<?php }?>
			</div>
			<?php //if(($i+1)%3==0)echo '<div class="clearfix"></div>';
			}?>
		</div>
	</div>
</div>
