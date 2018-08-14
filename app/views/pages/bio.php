<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v2.4&appId=897187950316865";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="row">
	<div class="col-md-10 col-sm-11 col-xs-11 col-sm-offset-2 col-md-offset-1 bioConBG">
		<div class="fbl-motaz  hidden-sm hidden-xs">
			<div class="fb-page" data-href="https://www.facebook.com/pages/Photos-By-Motaz-Abu-Munshar/379767848876842" data-width="340" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Photos-By-Motaz-Abu-Munshar/379767848876842"><a href="https://www.facebook.com/pages/Photos-By-Motaz-Abu-Munshar/379767848876842">‏‎Photos By Motaz Abu Munshar‎‏</a></blockquote></div></div>
		</div>
		<div style="position:absolute;bottom:0px;left:0px">
			<small>التصوير هو ايقاف لحة من الزمن لتدوم للأبد.</small>
		</div>
		<div class="bioCon row">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<img src="/Mo3taz/public/img/bio.jpg">
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<h2>معتز موفق أبو منشار.</h2>
				<h4></h4>
				<h4>مصور فوتوغرافي.</h4>
				<h4>متطوع في جمعية الهلال الأحمر الفلسطيني.</h4>
				<h4>طالب هندسة مدنية في جامعة بوليتكنك فلسطين.</h4>
			</div>
		</div>
	</div>
</div>
  <!--div class="col-md-12">
	<div class="alert alert-success"><strong><span class="glyphicon glyphicon-send"></span> Success! Message sent. (If form ok!)</strong></div>	  
    <div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span><strong> Error! Please check the inputs. (If form error!)</strong></div>
  </div-->

<div class="row contact">
	<div class="col-md-10 col-md-offset-1">
		<form role="form" action="" method="post">
			<div class="col-md-6 col-sm-12 sendmsg">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="input-group">
								<label for="InputName">اسمك</label>
								<input  id="InputName" type="text" class="form-control" placeholder="أدخل اسمك" required="">
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="input-group">
								<label for="InputEmail">بريدك الإلكتروني</label>
								<input  id="InputEmail" type="email" class="form-control" name="InputEmail" placeholder="أدخل البريد الإلكتروني" required="">
							</div>
						</div>
					</div>
					<div class="input-group">
						<label   for="InputMessage">نص الرسالة</label>
						<textarea id="InputMessage" name="InputMessage" class="form-control" rows="5" placeholder="أدخل نص الرسالة" required="">
						<?php if($data['msg']!="") echo 'شكوى حول الرسالة ذات الرمز '.$data['msg'].'
أريد منكم إزالة هذه الصورة لأنها ...'; ?>
						</textarea>
					</div>
					<div class="input-group">
						<input type="submit" name="submit" value="إرسال" class="btn btn-info pull-left">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>