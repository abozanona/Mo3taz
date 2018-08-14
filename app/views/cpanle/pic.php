<style>
.visible,.notvisible,.delete,.deletea{
	background-repeat:no-repeat;
	width:40px;
	height:40px;
	background-position: center;
	border:solid 0px;
}
.visible{
	background-image:url(/Mo3taz/public/img/cpanel/view.png);
}
.notvisible{
	background-image:url(/Mo3taz/public/img/cpanel/unview.png);
}
.delete{
	background-image:url(/Mo3taz/public/img/cpanel/delete.png);
}
.deletea{
	background-image:url(/Mo3taz/public/img/cpanel/deletea.png);
}
</style>
<h1>الألبوم: <?php echo $data['albumname'];?></h1>
<div class="row">
	<img class="addpic" data-album="<?php echo $data['albumid'] ?>" src="/Mo3taz/public/img/cpanel/addimg.png" style="padding:0px 10px; 20px 0px;">
</div>
<div class="row">
	<?php 
	for($i=0;$i<sizeof($data['row']);$i++){
		$id=$data['row'][$i]['ID'];
		$view=($data['row'][$i]['HIDDEN']==1)?"notvisible":"visible";
	?>
	<div id="pic<?php echo $id;?>" class="col-md-2">
		<div class="row">
			<div class="col-md-3">
				<img class="view <?php echo $view;?>" data-pic="<?php echo $id; ?>" data-album="<?php echo $data['albumid']; ?>">
			</div>
			<div class="col-md-3">
				<img class="delete"  data-pic="<?php echo $id; ?>" data-album="<?php echo $data['albumid']; ?>">
			</div>
			<div class="clearfix"></div>
			<div class="col-md-12">
				<img src="<?php echo $data['row'][$i]['SRC']; ?>" style="width:100%;height:200px"/>
			</div>
		</div>
	</div>
	<?php }?>
</div>
<script>
$(document).ready(function() {
	$(document).on('click','.delete',function(){
		$(this).attr("class","deletea");
	});

	$(document).on('click','.deletea',function(){
		var pic=$(this).attr("data-pic");
		var album=$(this).attr("data-album");
		$.ajax({
			url: "/Mo3taz/public/ajax/admin.php",
			data: { 
				"function": "deletepic", 
				"album": album, 
				"pic": pic 
			},
			type: "GET",
			success: function(response) {
				$("#pic"+pic).hide();
			},
		});
	});

	$(document).on('click','.view',function(){
		var pic=$(this).attr("data-pic");
		var album=$(this).attr("data-album");
		$.ajax({
			url: "/Mo3taz/public/ajax/admin.php",
			data: { 
				"function": "hide-showpic", 
				"album": album, 
				"pic": pic 
			},
			type: "GET",
			success: function(response) {
				location.reload();
			},
		});
	});

	$(document).on('click','.addpic',function(){
		var album=$(this).attr("data-album");
		var url=prompt("أدخل رابط الصورة", "");
		if(url=="")return;
		$.ajax({
			url: "/Mo3taz/public/ajax/admin.php",
			data: { 
				"function": "addpic",
				"album": album,
				"url": url
			},
			type: "GET",
			success: function(response) {
				location.reload();
			},
		});
	});

});
</script>