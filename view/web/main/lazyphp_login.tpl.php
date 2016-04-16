<div class="login-box">
	<div class="text-center">
		<img src="<?=image('logo.lr4.png')?>" alt="" class="login-logo" />
		<!-- <p class="solgan">Restful API Server for lazy ones</p> -->
	</div>
	<form action="/login_check" method="post" class="form-horizontal login-form" onsubmit="form_login('login_form');return false;void(0);" id="login_form">
	<div class="form-group">
      <div class="col-lg-8 col-lg-offset-2">
        <input type="text" class="form-control" id="email" name="email" placeholder="管理员Email地址">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-8 col-lg-offset-2">
        <input type="password" class="form-control" id="password" name="password" placeholder="管理员密码">
      </div>
    </div>

    <div class="form-group top50 text-center">
      <div class="col-lg-8 col-lg-offset-2">
        <button type="submit" class="btn btn-primary btn-lg">管理员登入</button>
      </div>
    </div>

    
		
	</form>
</div>