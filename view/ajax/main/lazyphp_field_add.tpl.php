<div class="ajax-topbar">
<button type="button" class="close" aria-label="Close" onClick="hide_pop_box();"><span aria-hidden="true">&times;</span></button>
<p class="title"><?=$data['title']?></p>
</div>
<div class="container row">
	<div class="col-md-8">
		<form action="" onsubmit="<?php if( intval($data['modify']) == 0 ): ?>field_add('<?=$data['type']?>')<?php else: ?>field_modify('<?=$data['type']?>')<?php endif; ?>;return false;" id="field_settings_form">
			<div class="form-group clearfix">
		      <label for="field_enname" class="col-md-3 control-label font18 text-right">英文名</label>
		      <div class="col-md-9">
		        <input type="text" class="form-control" id="field_enname" placeholder="必填，直接用于代码" name="field_enname" required="required" value="<?=$data['info']['enname']?>" />
		      </div>
		    </div>

		    <?php if( in_array($data['type'] , array( 'input' , 'mwhere' , 'lwhere' , 'dwhere' ) )  ): ?>
		    <div class="form-group clearfix">
		      <label for="field_table" class="col-md-3 control-label font18 text-right">所属table</label>
		      <div class="col-md-9">
		        <input type="text" class="form-control" id="field_table" placeholder="选填，不是来自数据表的字段留空即可" name="field_table" required="required" value="<?=$data['info']['table']?>" />
		      </div>
		    </div>
		    <?php endif; ?>

		    <?php if( $data['type'] == 'input' || $data['type'] == 'unique' ): ?> 
		    <div class="form-group clearfix">
		      <label for="field_cnname" class="col-md-3 control-label font18 text-right">中文名</label>
		      <div class="col-md-9">
		        <input type="text" class="form-control" id="field_cnname" placeholder="选填，用于错误时的提示信息" name="field_cnname" value="<?=$data['info']['cnname']?>"  />
		      </div>
		    </div>
		    <?php endif; ?>

		    <?php if( $data['type'] == 'input' ): ?> 
		    <div class="form-group clearfix">
		      <label for="field_checkfunction" class="col-md-3 control-label font18 text-right">检查函数</label>
		      <div class="col-md-9">
		        <input type="text" class="form-control" id="field_checkfunction" placeholder="可空，输入检查函数，返回false则提示错误" name="field_checkfunction" value="<?=$data['info']['checkfunction']?>"  />
		      </div>
		    </div>
		    <?php endif; ?>

		    <?php if( in_array($data['type'] , array( 'input' , 'output' ) )  ): ?>
		    <div class="form-group clearfix">
		      <label for="field_filterfunction" class="col-md-3 control-label font18 text-right">过滤函数</label>
		      <div class="col-md-9">
		        <input type="text" class="form-control" id="field_filterfunction" placeholder="可空，过滤函数，直接返回修正后的数据" name="field_filterfunction" value="<?=$data['info']['filterfunction']?>"  />
		      </div>
		    </div>
		    <?php endif; ?>

		    <!-- 输入字段特有的设置 -->
		    <?php if( $data['type'] == 'input' ): ?> 
		    <div class="form-group clearfix">
		      <label for="field_cannull" class="col-md-3 control-label font18 text-right">可否为空</label>
			      <div class="col-md-9">
			        <div class="radio-inline">
				        <label>
				        	<input type="radio" name="field_cannull" id="field_cannull_1" value="1" <?=checked($data['info']['cannull'] ,  1)?>>
				            是
				        </label>
			        </div>

			        <div class="radio-inline">
			        	<label>
			            	<input type="radio" name="field_cannull" id="field_cannull_0" value="0" <?=checked($data['info']['cannull'] ,  0)?>>
			            	否
			         	</label>
			        </div>
		      	</div>
			</div>
			<?php endif; ?>

			<?php if( in_array($data['type'] , array( 'mwhere' , 'lwhere' , 'dwhere' ) )  ): ?>
			<div class="form-group clearfix">
		      <label for="field_eq" class="col-md-3 control-label font18 text-right">匹配规则</label>
			      <div class="col-md-9">
			        <div class="radio-inline">
				        <label>
				        	<input type="radio" name="field_eq" id="ffield_eq_all" value="1" <?=checked($data['info']['eq'] ,  1)?>>
				            全等匹配(=)
				        </label>
			        </div>

			        <div class="radio-inline">
			        	<label>
			            	<input type="radio" name="field_eq" id="field_eq_part" value="2" <?=checked($data['info']['eq'] ,  2)?>>
			            	部分匹配(%)
			         	</label>
			        </div>
		      	</div>
			</div>
			<?php endif; ?>

			<div class="form-group top20">
		      <div class="col-md-9 col-md-offset-3 clearfix">
		        <button type="button" onclick="<?php if( intval($data['modify']) == 0 ): ?>field_add('<?=$data['type']?>')<?php else: ?>field_modify('<?=$data['type']?>')<?php endif; ?>;return false;" class="btn btn-primary btn-lg">保存设置</button>

		        <button type="button" onclick="field_delete('<?=$data['type']?>');void(0);" class="btn btn-error btn-lg pull-right">删除</button>
		      </div>
		    </div>

		    
		</form>
	</div>
	<div class="col-md-4 left-line">
	<ul class="nav nav-tabs" role="tablist">
							    
    <li role="presentation" class="active"><a href="#field_from_db" aria-controls="field_from_db" role="tab" data-toggle="tab">来自数据库</a></li>

    <li role="presentation"><a href="#field_last_used" aria-controls="field_last_used" role="tab" data-toggle="tab">最近输入</a></li>

	</ul>

	<div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="field_from_db">
	    	<select class="form-control" id="table_list">
	    		<option value="0">请选择数据表</option>
			</select>

			<select multiple class="form-control midbox" id="field_list">
			</select>

			<button type="button" onclick="field_fill_left();void(0);"  class="btn btn-default btn-lg top20">填至左侧</button>
	    </div>

	    <div role="tabpanel" class="tab-pane" id="field_last_used">
	    	
	    	<select multiple class="form-control midbox" id="field_last_list" >
			</select>

			<button type="button" onclick="field_fill_left2();void(0);"  class="btn btn-default btn-lg top20">填至左侧</button>
	    </div>
	</div>    

	

	</div>
</div>

<!-- <div class="ajax-topbar">
<button type="button" class="close" aria-label="Close" onClick="hide_pop_box();"><span aria-hidden="true">&times;</span></button>
<p class="title">这里是标题</p>
</div>
<div class="container">
	miao😊
</div> -->
<?php if( isset( $_SESSION['current_project']['tables'] ) ): ?>

<script>
<?php foreach( $_SESSION['current_project']['tables'] as $key => $table ): ?>
var li = $('<option value="<?=$key?>"><?=$key?></option>');
$("#table_list").append(li);
<?php endforeach; ?>
$("#table_list").on( 'change' , function()
{
	reset_field_list();
});

if( last_table != null )
{
	$("#table_list").val(last_table);
	reset_field_list();	
}

if( last_fields.length > 0 )
{
	$.each( last_fields , function( index , info )
	{
		var li = $('<option value="' + info.name + '">'+ info.name +'</option>');

		li.data('info' , info  );
		
		$("#field_last_list").append(li);
	});
}
</script>



<?php endif; ?>


