<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v2.4&appId=897187950316865";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div style="width:100%;height:100%;position:fixed;">
	<div id="superbgimage">
	<?php 
	$rel=0;
	for($i=$data['n'];$i<sizeof($data['row']);$i++)
	{
		echo '<img src="'.$data['row'][$i]['SRC'].'" rel="'.$rel.'">';
		$rel++;
	}
	for($i=0;$i<$data['n'];$i++)
	{
		echo '<img src="'.$data['row'][$i]['SRC'].'" rel="'.$rel.'">';
		$rel++;
	}	
	?>
	</div>
</div>

<div id="header">
	<nav style="position:relative;height:100%;direction: rtl;">
		<h3>العنوان</h3>
		<div style="text-align:left;">
			<sub><?php echo $data['albumdate']?></sub>
		</div>
		<div id="jRate"></div>
		<div style="direction:rtl">تقييم الألبوم:<?php echo number_format($data['rate'], 2, '.', ''); ?>/5</div>
		<div id="ajaxRate" data-album="<?php echo $data['album'];?>" style="display:none"></div>
		<hr>
		<h4>خصائص الصورة</h4>
		<div>
			نوع الصورة:
			<samp id="d-imgtype">
			</samp>
		</div>
		<div>
			الأبعاد:
			<samp id="d-imgsize">
			</samp>
		</div>
		<div>حجم الصورة:256kb</div>
		<div>
			<div class="fb-share-button" data-href="https://www.google.ps/" data-layout="button_count"></div>
		</div>
		<div><a class="btn-link" href="">إرسال شكوى حول الصورة</a></div>
		<div style="position:absolute;bottom:70px;right:0px;">
			جميع الحقوق محفوظة لدى معتز أبو منشار.
		</div>
	</nav>				
</div>
				

<div id="slideshow_nav_portrait"></div>

<div id="thumbs" style="display: block;">

	<div id="thumb_wrapper">
		<div id="thumb_vert_mousemove" style="overflow: hidden; height: 539px;">
			<?php 
			$rel=0;
			for($i=$data['n'];$i<sizeof($data['row']);$i++)
			{
				echo '<a href="'.$data['row'][$i]['SRC'].'" rel="'.$rel.'"><img src="'.$data['row'][$i]['SRC'].'"></a>';
				$rel++;
			}
			for($i=0;$i<$data['n'];$i++)
			{
				echo '<a href="'.$data['row'][$i]['SRC'].'" rel="'.$rel.'"><img src="'.$data['row'][$i]['SRC'].'"></a>';
				$rel++;
			}	
			?>
		</div>
	</div>
		
	<div id="slideshow_nav_controls">
		<ul>
			<li class="backward_button"></li>
			<li class="play_stop_button" style="background-position: -53px -30px;"></li>
			<li class="forward_button"></li>
		</ul>
		<div class="clear"></div>
	</div>
	
</div>

<div class="clear"></div>

<script src="/Mo3taz/public/js/jRate.min.js"></script>
<script type="text/javascript">
$(function () {
	var that = this;
	var toolitup = $("#jRate").jRate({
		rating: <?php echo intval($data['rate']);?>,
		strokeColor: 'black',
		width: 30,
		height: 30,
		precision: 1,
		minSelected: 1,
		onSet: function(rating) {
			var x=$("#ajaxRate").attr("data-album");
			$.ajax({url: "/Mo3taz/public/ajax/rate.php",
			data: { 
			"album": x, 
			"rate": rating, 
			},
			success: function(result){
				alert(result);
			}});
		}
	});
});
</script>

<script type="text/javascript" src="/Mo3taz/public/js/gslider/jquery.js"></script>
<script type="text/javascript" src="/Mo3taz/public/js/gslider/jquery.superbgimage.js"></script>
<script type="text/javascript" src="/Mo3taz/public/js/gslider/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="/Mo3taz/public/js/gslider/jquery.custom.js"></script>

<script type="text/javascript">
jQuery(function() {
	// initialize SuperBGImage
	jQuery('#thumb_vert_mousemove').superbgimage();
});
</script>