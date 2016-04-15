<div class="lazyrest-top-nav">
	<div class="container clearfix">
		<div class="logo"><img src="<?=image('logo.lr4.png')?>" alt="" class="logo" /></div>
		<ul class="iconlist">
			<li id="icon-list" class="active" data-toggle="tooltip" data-placement="bottom" data-original-title="接口列表" title="接口列表"><span class="lricon-view_list"></span></li>
			<li id="icon-edit" data-toggle="tooltip" data-placement="bottom" data-original-title="公共函数" title="公共函数"><span class="lricon-pencil"></span></li>
			<li id="icon-build" data-toggle="tooltip" data-placement="bottom" data-original-title="生成代码" title="生成代码"><span class="lricon-movie_filter"></span></li>
			<li id="lricon-save" data-toggle="tooltip" data-placement="bottom" data-original-title="保存" title="保存"><span class="lricon-save"></span></li>
			<li id="icon-settings" data-toggle="tooltip" data-placement="bottom" data-original-title="设置" title="设置"><span class="lricon-settings"></span></li>
			<li id="icon-exit" data-toggle="tooltip" data-placement="bottom" data-original-title="退出" title="退出"><span class="lricon-exit_to_app"></span></li>
		</ul>
	</div>	
</div>
 <script>
 		$("#icon-exit").on('click',function(){ window.location = '/logout'; });
 		
 		$("#lricon-save").on('click',function()
 			{
 				window.open('/project/save');
 			});

 		$("#icon-build").on('click',function()
 			{
 				window.open('/code/build' , 'builder');
 			});

 		$("#icon-list").on('click',function(){ window.location = '/interface/list'; });

 		$("#icon-settings").on('click',function(){ show_float_box('/project/settings'); });
 		$("#icon-edit").on('click',function(){ show_float_box('/code/functions'); });
 </script>
