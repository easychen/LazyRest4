var last_table = null;
var last_fields = [];


function post( url , params , func )
{
	$.ajax({
    url: url,
    headers: {
        'LP4-Request-Type':'json'
    },
    method: 'POST',
    dataType: 'json',
    data: params,
    success: function(data){
      func(data);
    }
  });
}

function send_form( name , func )
{
	var url = $('#'+name).attr('action');
	
	var params = {};
	$.each( $('#'+name).serializeArray(), function(index,value) 
	{
		params[value.name] = value.value;
	});
	
	
	post( url , params , func );
	//$.post( url , params , func );	
}

function send_form_bar( name )
{
	return send_form( name , function( data ){ infobar( data ); } );
}

function form_login( name )
{
	return send_form( name , function( data )
	{
		if( parseInt( data.code ) > 0 )
		{
			errorbar( data.message );
		}
		else
		{
			infobar('登入成功，即将转向');
			setTimeout( function()
			{
				window.location = '/projects';
			} , 1000 );
		}
		console.log( data );
	});
}

function send_form_settings( name )
{
	return send_form( name , function( data )
	{
		if( parseInt( data.code ) > 0 )
		{
			errorbar( data.message );
		}
		else
		{
			infobar('设置已经保存');
			hide_pop_box();
		}
	});
}

function upload_lazy_file()
{

	//alert( $("#lazyfile_upload").val() );
	if( $("#lazyfile_upload").val() != '' )
		$('#project_upload_form').submit();
}

function build_part_code( type )
{
	post( '/build/code' , {'type':type} , function( data )
	{
		if( data.code != 0 )
		{
			errorbar( data.message );
		}
		else
		{
			// 取得数据
			// data.data并回填到编辑器
			editor['logiccode'].setValue( $.base64Decode( data.data ) );
			
			
		}
		
	} );
}



function create_new_project()
{
	window.location = '/interface/list';
}

function show_float_box( url )
{
	$.post( url , null , function( data )
	{
		show_pop_box( data );
	} );
}

function show_pop_box( data , popid )
{
	if( popid == undefined ) popid = 'lp_pop_box'
	//console.log($('#' + popid) );
	if( $('#' + popid).length == 0 )
	{
		var did = $('<div><div id="' + 'lp_pop_container' + '"></div></div>');
		did.attr( 'id' , popid );
		did.css( 'display','none' );
		$('body').prepend(did);
	} 
	
	if( data != '' )
		$('#lp_pop_container').html(data);
	
	var left = ($(window).width() - $('#' + popid ).width())/2;
	
	$('#' + popid ).css('left',left);
	$('#' + popid ).css('display','block');
}

function hide_pop_box( popid )
{
	if( popid == undefined ) popid = 'lp_pop_box'
	$('#' + popid ).css('display','none');
}

function function_save()
{
	//alert(feditor.getValue());
	post( '/code/functions_save' , {'code':feditor.getValue()} , function( data )
	{
		if( data.code != 0 )
		{
			errorbar( data.message );
		}
		else
		{
			infobar( '代码已保存' );	
			
		}
		
	} );

}

function reset_field_list()
{
	//alert('changed');
	// 首先，获得当前选中的table
	var table = $("#table_list").val();
	$("#field_list option").each(function()
	{
		$(this).remove();
	});
	//alert(table);
	post( '/table/fields' , {'table':table} , function( data )
	{
		if( data.code != 0 )
		{
			errorbar( data.message );
		}
		else
		{

			$.each(data.data.names , function( index , value )
			{
				var li = $('<option value="' + value + '">'+value+'</option>');

				li.data('info' , data.data.fields[value]  );
				data.data.fields[value]['table'] = table;
				
				
				$("#field_list").append(li);
			});

			last_table = table;
			
		}
		// console.log( data );
		//show_pop_box( data );
	} );

}

function field_fill_left()
{
	//alert('in');
	var info = $("#field_list option:selected").data('info');
	
	$("#field_enname").val(info.name);
	$("#field_table").val(info.table);
	$("#field_cnname").val(info.comment);
	if( info.notnull )
	{
		$("#field_cannull").val(0);
		$("#field_checkfunction").val('check_not_empty');	
	}

	last_fields.push( info ); 

	console.log( info );
}

function field_fill_left2()
{
	//alert('in');
	var info = $("#field_last_list option:selected").data('info');
	
	$("#field_enname").val(info.name);
	$("#field_table").val(info.table);
	$("#field_cnname").val(info.comment);
	if( info.notnull )
	{
		$("#field_cannull").val(0);
		$("#field_checkfunction").val('check_not_empty');	
	} 

	console.log( info );
}


// formid 
// type: insert,where,update
function field_add( type , info )
{
	if( info == null )
	{
		info = {};
		info.field_enname =  $('#field_enname').val() ;
		info.field_table =  $('#field_table').val() ;
		info.field_cnname =  $('#field_cnname').val() ;
		info.field_cannull =  $('input[name=field_cannull]:checked').val();
		info.field_eq =  $('input[name=field_eq]:checked').val();
		info.field_checkfunction =  $('#field_checkfunction').val() ;
		info.field_filterfunction =  $('#field_filterfunction').val() ;
	}
	
	
	var li = $('<li>'+ info.field_enname +'</li>');
	li.data( 'info', info );

	//li.attr( 'data-info2' , '255' );
	
	var ul = $("#" + type + "-fileds");
	ul.prepend( li );

	$('#field_enname').val('') ;
	$('#field_table').val('') ;
	$('#field_cnname').val('') ;
	$('#field_cannull').val('') ;
	$('#field_eq').val('') ;
	$('#field_checkfunction').val('') ;
	$('#field_filterfunction').val('') ;

	hide_pop_box();

	//alert( formid );
	//var data = $("#"+domid).data('array') | [];
	// 创建一个li对象
	// 把参数存储到它的data属性里边
	// 添加到UL上
	// 然后清空form里边的值

}

function field_modify( type )
{
	var info = {};
	info.field_enname =  $('#field_enname').val() ;
	info.field_table =  $('#field_table').val() ;
	info.field_cnname =  $('#field_cnname').val() ;
	info.field_cannull =  $('input[name=field_cannull]:checked').val();
	info.field_eq =  $('input[name=field_eq]:checked').val();
	info.field_checkfunction =  $('#field_checkfunction').val() ;
	info.field_filterfunction =  $('#field_filterfunction').val() ;
	
	$("#" + type + "-fileds li").each(function()
	{
		var info2 = $(this).data('info');
		if( info2 && info2.field_enname && info2.field_enname == info.field_enname ) $(this).data('info',info);
	});
	
	//li.data( 'info', info );

	$('#field_enname').val('') ;
	$('#field_table').val('') ;
	$('#field_cnname').val('') ;
	$('#field_cannull').val('') ;
	$('#field_eq').val('') ;
	$('#field_checkfunction').val('') ;
	$('#field_filterfunction').val('') ;

	hide_pop_box();

	//alert( formid );
	//var data = $("#"+domid).data('array') | [];
	// 创建一个li对象
	// 把参数存储到它的data属性里边
	// 添加到UL上
	// 然后清空form里边的值

}

function field_delete(  type )
{
	//alert(type);
	$("#" + type + "-fileds li").each(function()
	{
		var info2 = $(this).data('info');
		if( info2 && info2.field_enname && info2.field_enname == $('#field_enname').val() ) $(this).remove();
	});
	
	$('#field_enname').val('') ;
	$('#field_table').val('') ;
	$('#field_cnname').val('') ;
	$('#field_cannull').val('') ;
	$('#field_eq').val('') ;
	$('#field_checkfunction').val('') ;
	$('#field_filterfunction').val('') ;

	hide_pop_box();


}

function interface_delete( id )
{
	if( confirm( '确定删除接口数据？本操作是不可恢复的哟' ) )
	{
		post( '/interface/remove' , {'id':id } , function( data )
		{
			window.location.reload();
		});
	}
	
}


function interface_info_save( modify )
{
	//
	// check the must fix
	var interface_info = {};

	if( modify == null )
	{
		interface_info.id = Date.now();
		interface_info.modify = false;
	}
	else
	{
		interface_info.id = info.id;
		interface_info.modify = true;
	}

	if( $("#iname").val() == '' )
	{
		scrollTo("iname");
		$("#iname").focus();
		return errorbar("接口名称不能为空"); 	
	}

	interface_info.active_logic = $(".logicul li.active a").attr('aria-controls');
	interface_info.iname = $("#iname").val(); 

	if( $("#iuri").val() == '' )
	{
		scrollTo("iuri");
		$("#iname").focus();
		return errorbar("访问路径不能为空");
	}

	interface_info.iuri = $("#iuri").val();

	var getvalue = parseInt($("#iget:checked").val());
	var postvalue = parseInt($("#ipost:checked").val());

	interface_info.iget = getvalue;
	interface_info.ipost = postvalue;

	interface_info.ipublic = $('input[name=ipublic]:checked').val();
	interface_info.inoauth = $('input[name=inoauth]:checked').val();
	interface_info.target_table_list = $("#target_table_list").val();

	interface_info['input-fileds']= getObjectData($("#input-fileds li[class!=new][class!=build]") , 'info' );
	interface_info.inputcode = editor['inputcode'].getValue();


	interface_info['unique-fileds']= getObjectData($("#unique-fileds li[class!=new][class!=build]") , 'info' );

	interface_info['mwhere-fileds']= getObjectData($("#mwhere-fileds li[class!=new][class!=build]") , 'info' );

	interface_info['lwhere-fileds']= getObjectData($("#lwhere-fileds li[class!=new][class!=build]") , 'info' );

	interface_info['dwhere-fileds']= getObjectData($("#dwhere-fileds li[class!=new][class!=build]") , 'info' );

	interface_info.logiccode = editor['logiccode'].getValue();
	
	interface_info['output-fileds']= getObjectData($("#output-fileds li[class!=new][class!=build]") , 'info' );

	interface_info.outputcode = editor['outputcode'].getValue();




	console.log( interface_info );



	post( '/interface/info/save' , {'info':JSON.stringify(interface_info),'name':interface_info.iname,'modify':interface_info.modify} , function( data )
	{
		//alert('im in');
		if( data.code != 0 )
		{
			errorbar( data.message );
		}
		else
		{
			infobar('数据成功保存');	
			setTimeout( function()
			{
				window.location = '/interface/list';
			} , 1000 );
		}
		// console.log( data );
		//show_pop_box( data );
	} );





}

function interface_modify( iname )
{
	location = '/interface/create?iname='+encodeURIComponent(iname);
}

function getObjectData( objs , name )
{
	var ret = [];
	$.each( objs , function( index , value )
	{
		ret.push($(value).data( name ));
	});

	return ret;
}

function scrollTo( name )
{
	 $('html, body').animate({
        scrollTop: $("#"+name).offset().top - 200
    }, 1000);
}




function errorbar( info )
{
	toastr.options.closeButton = true;
	toastr.options.positionClass = 'toast-bottom-full-width';
	toastr.error( info );
}

function infobar( info )
{
	toastr.options.closeButton = true;
	toastr.options.positionClass = 'toast-bottom-full-width';
	toastr.info( info );
}

function okbar( info )
{
	toastr.options.closeButton = true;
	toastr.options.positionClass = 'toast-bottom-full-width';
	toastr.Success( info );
}

