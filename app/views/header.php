<!doctype html>
<html dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="/Mo3taz/public/img/ico.ico" type="image/x-icon" />
    <title>Motaz Photography</title>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="http://localhost/Mo3taz/public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Mo3taz/public/css/motaz.css">
	<link rel='stylesheet' type='text/css' href='http://localhost/Mo3taz/public/css/camera.css' id='camera-css' media='all'> 
	<link rel='stylesheet' type='text/css' href='http://localhost/Mo3taz/public/css/gslider.css' id='camera-css' media='all'> 
    <script src="/Mo3taz/public/js/jquery-1.11.2.min.js"></script>
    <script src="/Mo3taz/public/js/bootstrap.min.js"></script>
    <title></title>
</head>
<body>

<div class="container-fluid wrapper">
<?php if(!isset($data['gslider'])){?>
	<header>

		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" style="margin-left:50% " href="#">logo
				<img src=""/>
			  </a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="container">

			<form class="navbar-form navbar-left">
				<div class="right-inner-addon">
					<div class="form-group has-feedback">
						<input id="searchbox" type="text" class="form-control" placeholder="ابحث عن صورة" onkeypress="Fsearchbox(event)" <?php if(isset($data['search'])) echo ' value="'.$data['search'].'"'; ?>/>
						<i class="glyphicon glyphicon-camera form-control-feedback"></i>
					</div>
				</div>
			</form>
			  <ul class="nav navbar-nav navbar-right">
				<li<?php if($data['page']=='home')echo ' class="active"';?>><a href="/Mo3taz/public/home">الصفحة الرئيسية</a></li>
				<li<?php if($data['page']=='album')echo ' class="active"';?>><a href="/Mo3taz/public/albums">الألبومات</a></li>
				<li<?php if($data['page']=='bio')echo ' class="active"';?>><a href="/Mo3taz/public/bio">عن المصور</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
	</header>
<?php }?>
<script>
function Fsearchbox(e) {
    var keynum = e.keyCode || e.which;

    if (keynum==13){
        var x = document.getElementById("searchbox").value;
        window.location.href = '/Mo3taz/public/search/'+x;
        e.preventDefault();
    }
}
</script>