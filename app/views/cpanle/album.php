<style>
.CPAlbum input{width:100%;padding:3px}
.visible,.notvisible,.delete,.edit,.deletea{
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
.edit{
	background-image:url(/Mo3taz/public/img/cpanel/edit.png);
}
</style>
<div class="row">
	<img class="addalbum" src="/Mo3taz/public/img/cpanel/addalbum.png" style="padding:0px 10px; 20px 0px;">
</div>
<div class="row CPAlbum">
	<?php
	for($i=0;$i<sizeof($data['row']);$i++){
	$view=($data['row'][$i]['hidden']==1)?"notvisible":"visible";
	$album=$data['row'][$i]['albumid'];?>
	<div id="album<?php echo $album; ?>" class="col-md-12" style="background:#ccc;margin-bottom:5px;padding:4px">
		<div class="col-md-1">
			<img class="edit" data-album="<?php echo $album?>"><a style="font-size:30px" href="/Mo3taz/public/cpanle/pic/<?php echo $album?>">♥</a>
		</div>
		<div class="col-md-1">
			<img class="view <?php echo $view?>" data-album="<?php echo $album?>">
		</div>
		<div class="col-md-1">
			<img class="delete" data-album="<?php echo $album?>">
		</div>
		<div class="col-md-3">
			<input class="name" placeholder="اسم الألبوم" value="<?php echo $data['row'][$i]['name'];?>">
		</div>
		<div class="col-md-3">
			<input class="date" placeholder="التاريخ" value="<?php echo $data['row'][$i]['date'];?>">
		</div>
		<div class="col-md-3">
			<input class="descr" placeholder="الوصف" value="<?php echo $data['row'][$i]['descr'];?>">
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
		var album=$(this).attr("data-album");
		$.ajax({
			url: "/Mo3taz/public/ajax/admin.php",
			data: { 
				"function": "deletealbum", 
				"album": album 
			},
			type: "GET",
			success: function(response) {
				$("#album"+album).hide();
			},
		});
	});
	
	$(document).on('click','.view',function(){
		var album=$(this).attr("data-album");
		$.ajax({
			url: "/Mo3taz/public/ajax/admin.php",
			data: { 
				"function": "hide-showalbum", 
				"album": album 
			},
			type: "GET",
			success: function(response) {
				location.reload();
			},
		});
	});
	
	$(document).on('click','.edit',function(){
		var album=$(this).attr("data-album");
		var name=$("#album"+album+" .name").val();
		var date=$("#album"+album+" .date").val();
		var descr=$("#album"+album+" .descr").val();
		$.ajax({
			url: "/Mo3taz/public/ajax/admin.php",
			data: { 
				"function": "changealbum", 
				"album": album, 
				"name": name, 
				"date": date, 
				"descr": descr 
			},
			type: "GET",
			success: function(response) {
				location.reload();
			},
		});
	});

	$(document).on('click','.addalbum',function(){
		var album=$(this).attr("data-album");
		$.ajax({
			url: "/Mo3taz/public/ajax/admin.php",
			data: { 
				"function": "addalbum"
			},
			type: "GET",
			success: function(response) {
				location.reload();
			},
		});
	});

});
</script>