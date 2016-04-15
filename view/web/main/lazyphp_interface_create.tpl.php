<div class="container lrpage">
	<div class="lrbox">
		<h4>接口设置</h4>
		<div class="itile clearfix">
			<div class="icontent">
			<div class="interface-flow"></div>
			<div class="interface-detail">
				<div class="top-point"></div>
				<div class="interface-content">
					<form action="">
						<div class="form-group clearfix">
						  <input class="form-control input-lg" id="iname" name="iname" type="text" value="<?=$data['info']['iname']?>" placeholder="接口名称">
						</div>

						<div class="form-group clearfix">
					      <label for="iuri" class="col-lg-3 control-label bigfont text-right">访问路径</label>
					      <div class="col-lg-9">
					        <input type="text" class="form-control" id="iuri" name="iuri" placeholder="/your/interface/uri" value="<?=$data['info']['iuri']?>">
					      </div>
					    </div>

					    <div class="form-group clearfix">
					      <label for="imethod" class="col-lg-3 control-label bigfont text-right">方法</label>
					      <div class="col-lg-9">
					        <div class="checkbox-inline">
						          <label>
						            <input type="checkbox" name="iget" id="iget" value="1" <?=checked( $data['info']['iget']  , 1 )?> >
						            GET
						          </label>
					        </div>

					        <div class="checkbox-inline">
					          <label>
					            <input type="checkbox" name="ipost" id="ipost" value="1" <?=checked( $data['info']['ipost']  , 1 )?> >
					            POST
					          </label>
					        </div>
					      </div>
					    </div>

					    <div class="form-group clearfix">
					      <label for="ipublic" class="col-lg-3 control-label bigfont text-right">开放</label>
					      <div class="col-lg-9">

					        <div class="radio-inline">
						        <label>
						        	<input type="radio" name="ipublic" id="ipublicopen" value="1" <?=checked( $data['info']['ipublic']  , 1 )?>>
						            是
						        </label>
					        </div>

					        <div class="radio-inline">
					        	<label>
					            	<input type="radio" name="ipublic" id="ipublicclose" value="0" <?=checked( $data['info']['ipublic']  , 0 )?>>
					            	否
					         	</label>
					        </div>

					      	</div>
					    </div>

					    <div class="section">Auth - 授权控制</div>

					    <div class="form-group clearfix">
					      <label for="inoauth" class="col-lg-3 control-label bigfont text-right">任意访问</label>
					      <div class="col-lg-9">

					        <div class="radio-inline">
						        <label>
						        	<input type="radio" name="inoauth" id="inoauthopen" value="1" <?=checked( $data['info']['inoauth']  , 1 )?>>
						            是
						        </label>
					        </div>

					        <div class="radio-inline">
					        	<label>
					            	<input type="radio" name="inoauth" id="inoauthclose" value="0" <?=checked( $data['info']['inoauth']  , 0 )?>>
					            	否
					         	</label>
					        </div>

					      	</div>
					    </div>

						<!-- 
					    <div class="form-group clearfix">
					      <label for="iacltablename" class="col-lg-3 control-label bigfont text-right">权限表</label>
					      <div class="col-lg-9">
					        <input type="text" class="form-control" id="iacltablename" placeholder="user">
					      </div>
					    </div>

					    <div class="form-group clearfix">
					      <label for="iaclusername" class="col-lg-3 control-label bigfont text-right">用户名字段</label>
					      <div class="col-lg-9">
					        <input type="text" class="form-control" id="iaclusername" placeholder="user">
					      </div>
					    </div>

					    <div class="form-group clearfix">
					      <label for="iacluserpassword" class="col-lg-3 control-label bigfont text-right">密码字段</label>
					      <div class="col-lg-9">
					        <input type="text" class="form-control" id="iacluserpassword" placeholder="password">
					      </div>
					    </div>

					    <div class="form-group clearfix">
					      <label for="iaclfunction" class="col-lg-3 control-label bigfont text-right">校验函数</label>
					      <div class="col-lg-9">
					        <input type="text" class="form-control" id="iaclfunction" placeholder="checkpassword">
					      </div>
					    </div> -->

					    <div class="section">Target - 目标数据表</div>

					    <div class="form-group clearfix">
					      <div class="col-lg-12">
					        <select class="form-control" name="itargettable" id="target_table_list">
							  <option value="0" >请选择数据表</option>
							</select>
					      </div>
					    </div>

					    

						<div class="section">Input fileds - 输入字段</div>

						<ul class="lfields" id="input-fileds">
							<li class="new"><span class="lricon-add"></span>添加新字段</li>
						</ul>

						<div class="section">Input filter - 输入过滤代码</div>
						<div class="form-group clearfix" >
							<div id="inputcode"><?=htmlspecialchars(file_get_contents( AROOT . DS . 'assets' . DS . 'template' . DS . 'inputcode.tpl.php'  ));?>
							</div>
					    </div>

					   <div class="section">Logic code - 业务逻辑代码</div>
						<div>
							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs logicul" role="tablist">
							    
							    <li role="presentation" class="active"><a href="#lccustom" aria-controls="lccustom" role="tab" data-toggle="tab">自定义</a></li>

							    <li role="presentation"><a href="#lcadd" aria-controls="lcadd" role="tab" data-toggle="tab">添加</a></li>

								<li role="presentation" ><a href="#lcmodify" aria-controls="lcmodify" role="tab" data-toggle="tab">修改</a></li>
								
								<li role="presentation" ><a href="#lclist" aria-controls="lclist" role="tab" data-toggle="tab">列表</a></li>

								<li role="presentation"><a href="#lcdelete" aria-controls="lcdelete" role="tab" data-toggle="tab">删除</a></li>
							    

							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane active" id="lccustom">
							    &nbsp;</div>

							    <div role="tabpanel" class="tab-pane" id="lcadd">
							    	<p class="lcsubtitle  top20">唯一字段</p>

							    	<ul class="lfields" id="unique-fileds">
										<li class="new"><span class="lricon-add"></span>添加新字段</li>

										<!-- <li class="build"><span class="lricon-movie_filter"></span>生成逻辑代码</li> -->
									</ul>



							    </div>

							    <div role="tabpanel" class="tab-pane" id="lcmodify">
							    	<p class="lcsubtitle  top20">参与WHERE子句的字段</p>

							    	<ul class="lfields" id="mwhere-fileds">
										<li class="new"><span class="lricon-add"></span>添加新字段</li>

										<!-- <li class="build"><span class="lricon-movie_filter"></span>生成逻辑代码</li> -->
									</ul>
							    </div>


							    <div role="tabpanel" class="tab-pane" id="lclist">
							    	<p class="lcsubtitle  top20">参与WHERE子句的字段</p>

							    	<ul class="lfields" id="lwhere-fileds">
										<li class="new"><span class="lricon-add"></span>添加新字段</li>

										<!-- <li class="build"><span class="lricon-movie_filter"></span>生成逻辑代码</li> -->
									</ul>
							    </div>


							    <div role="tabpanel" class="tab-pane" id="lcdelete"><p class="lcsubtitle  top20">参与WHERE子句的字段</p>

							    	<ul class="lfields" id="dwhere-fileds">
										<li class="new"><span class="lricon-add"></span>添加新字段</li>

										<!-- <li class="build"><span class="lricon-movie_filter"></span>生成逻辑代码</li> -->
									</ul></div>
							    
							  </div>

							</div>
						<div class="form-group clearfix top20" >
							<div id="logiccode"><?=htmlspecialchars(file_get_contents( AROOT . DS . 'assets' . DS . 'template' . DS . 'logiccode.tpl.php'  ));?>
							</div>
					    
						</div>

						<div class="section">Output fileds - 输出字段</div>

						<ul class="lfields" id="output-fileds">
							<li class="new"><span class="lricon-add"></span>添加新字段</li>
						</ul>

						<div class="section">Output code - 输出控制代码</div>
						<div class="form-group clearfix" >
							<div id="outputcode"><?=htmlspecialchars(file_get_contents( AROOT . DS . 'assets' . DS . 'template' . DS . 'outputcode.tpl.php'  ));?>
							</div>
					    
						</div>

						<div class="form-group top50">
					        <?php if( $data['form_type'] == 'modify' ): ?>
					        	<button type="button" onclick="interface_info_save(true);" class="btn btn-primary btn-lg">保存接口</button>

					        	<!-- <button type="button" onclick="interface_info_delete();" class="btn btn-error btn-lg">删除接口</button> -->

					        <?php else: ?>
							<button type="button" onclick="interface_info_save();" class="btn btn-primary btn-lg">保存接口</button>
					        <?php endif;?>	
					        
					    </div>    
						
						<!-- 
						
						<div class="section">Output fileds - 输出字段</div>
						<div class="section">Output filter - 输出过滤代码</div> -->



					    



					</form>

				</div>
			</div>
			</div> <!-- icontent -->
		</div>	
	</div>
	
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js" type="text/javascript" charset="utf-8"></script> -->
<script>
var info = null;
<?php if( isset( $data['info_json'] ) ): ?>
// 填充target表
info = jQuery.parseJSON($.base64Decode('<?=$data['info_json']?>'));
<?php endif; ?>

<?php if( $data['form_type'] == 'modify' ): ?>
$("#iname").attr('ReadOnly','ReadOnly');
<?php endif; ?>

var types = [ 'input' , 'output' , 'unique' , 'mwhere' , 'lwhere' , 'dwhere' ];

$.each( types , function( index , value )
{
	// 事件绑定
	$('#'+ value +'-fileds').on('click' , 'li' , function()
	{
		if( $(this).hasClass('new') ) show_float_box('/interface/field/add?type='+value);
		else
		{
			if( $(this).hasClass('build') )
			{
				build_part_code( value );
				//alert( 'build '+value );
			}
			else
			{
				var info = $(this).data('info');
				show_float_box('/interface/field/add?type='+value+'&modify=1'
					+'&field[enname]='+ encodeURIComponent(info.field_enname) 
					+'&field[table]='+ encodeURIComponent(info.field_table) 
					+'&field[cnname]='+ encodeURIComponent(info.field_cnname) 
					+'&field[cannull]='+ encodeURIComponent(info.field_cannull) 
					+'&field[eq]='+ encodeURIComponent(info.field_eq) 
					+'&field[checkfunction]='+ encodeURIComponent(info.field_checkfunction) 
					+'&field[filterfunction]='+ encodeURIComponent(info.field_filterfunction) 
					);	
			} 
		}
		//alert('miao');
	});

	// 设置对应值
	//$('#'+ value +'-fileds')
	if( info  )
	{
		if( info[value+'-fileds'].length > 0 )
		{
			$.each( info[value+'-fileds'] , function( index2 , value2 )
			{
				 field_add(value,value2);
			});	
		}
		
	}

} );

var editors = [ 'inputcode' , 'logiccode' , 'outputcode' ];
var editor = [];
$.each( editors , function( index , value )
{
	editor[value] = ace.edit(value);
	editor[value].$blockScrolling = Infinity;
	editor[value].getSession().setMode('ace/mode/php');
	editor[value].setTheme('ace/theme/monokai');
	editor[value].getSession().setUseWrapMode(true);
	document.getElementById(value).style.fontSize='14px';

	if( info )
	{
		if( info[value].length > 0 )
		{
			editor[value].setValue( info[value] );
		}	
	}
});

<?php if( isset( $_SESSION['current_project']['tables'] ) ): ?>

<?php foreach( $_SESSION['current_project']['tables'] as $key => $table ): ?>
var li = $('<option value="<?=$key?>"><?=$key?></option>');
$("#target_table_list").append(li);

<?php endforeach; ?>

if( info )
{
	if( info.target_table_list != 0 )
		$("#target_table_list").val( info.target_table_list );

	// 选中tab页面
	$('.logicul a[href="#'+ info.active_logic +'"]').tab('show');	
	//info.active_logic	
}


<?php endif; ?>

</script>