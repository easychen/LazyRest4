<div class="ajax-topbar">
<button type="button" class="close" aria-label="Close" onClick="hide_pop_box();"><span aria-hidden="true">&times;</span></button>
<p class="title"><?=$data['title']?></p>
</div>
<div class="codebox">
	<div id="function_editor"></div>
	<div class="top20"> <button class="btn btn-lg btn-primary" onclick="function_save();">保存代码</button></div>
	
</div>
<script>
	var feditor = ace.edit('function_editor');
	feditor.$blockScrolling = Infinity;
	feditor.getSession().setMode('ace/mode/php');
	feditor.setTheme('ace/theme/monokai');
	feditor.getSession().setUseWrapMode(true);
	document.getElementById('function_editor').style.fontSize='14px';

	<?php if( strlen($data['code']) ): ?>
	var last_code = $.base64Decode('<?=$data['code']?>');
	feditor.setValue( last_code );
	<?php else: ?>
	feditor.setValue( '<'+'?php'+"\r\n"+'/'+'/ 公共函数写这里，例如检查函数、过滤函数、权限检查函数'+"\r\n" );
	<?php endif; ?>
</script>