<div class="ajax-topbar">
<button type="button" class="close" aria-label="Close" onClick="hide_pop_box();"><span aria-hidden="true">&times;</span></button>
<p class="title"><?=$data['title']?></p>
</div>
<p class="subsection">数据库设置</div>
<div class="container row">
<form action="/project/settings/update" id="project_settings_form">
<div class="form-group clearfix">
  <label for="mysql_host" class="col-md-3 control-label font18 text-right">Host</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="mysql_host" placeholder="数据库地址，如：localhost、127.0.0.1" name="mysql_host" value="<?=$data['mysql_host']?>" required="required"  />
  </div>
</div>
<div class="form-group clearfix">
  <label for="mysql_port" class="col-md-3 control-label font18 text-right">Port</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="mysql_port" placeholder="数据库端口，如：3306" name="mysql_port" value="<?=$data['mysql_port']?>" required="required"  />
  </div>
</div>
<div class="form-group clearfix">
  <label for="mysql_user" class="col-md-3 control-label font18 text-right">User</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="mysql_host" placeholder="数据库用户名" name="mysql_user" value="<?=$data['mysql_user']?>" required="required"  />
  </div>
</div>
<div class="form-group clearfix">
  <label for="mysql_password" class="col-md-3 control-label font18 text-right">Password</label>
  <div class="col-md-9">
    <input type="password" class="form-control" id="mysql_password" placeholder="数据库密码" name="mysql_password" value="<?=$data['mysql_password']?>"  />
  </div>
</div>
<div class="form-group clearfix">
  <label for="mysql_database" class="col-md-3 control-label font18 text-right">Database</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="mysql_database" placeholder="数据库库名" name="mysql_database" value="<?=$data['mysql_database']?>" required="required"  />
  </div>
</div>
<div class="form-group top50">
  <div class="col-md-9 col-md-offset-3 clearfix">
    <button type="button" onclick="send_form_settings('project_settings_form');"  class="btn btn-primary btn-lg">保存设置</button>

  </div>
</div>	
</form>
</div>