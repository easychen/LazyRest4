<?php
namespace Lazyphp\Controller;

class LazyphpController
{
	public function __construct()
    {
        session_start();
        $public_actions = array( 'index' , 'login' , 'login_check' );
        
        if( !in_array( g('__METHOD__') , $public_actions) )
        {
            if( !is_login() )
            {
                send_error( 'AUTH' , '<a href="/login">请登入后再访问此页面</a>' );
                exit;
            }
        }
    }

    /**
     * 添加字段窗口
     * @ApiDescription(section="Interface", description="默认提示")
     * @ApiLazyRoute(uri="/interface/field/add",method="GET|POST")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function field_add()
    {
        if( intval( v('modify') ) > 0 )
        {
            $data['modify'] = 1;
            $data['info'] = v('field');
        }

        if( strlen( v('type') ) < 1 ) $type = 'input';
        else $type = z( v('type') );

        $data['type'] = $type;
        $data['title'] = $data['top_title'] = '字段设置';
        return render_ajax( $data ); 
    }


    /**
     * 默认提示
     * @ApiDescription(section="Demo", description="默认提示")
     * @ApiLazyRoute(uri="/",method="GET")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function index()
    {
       header( 'Location: /login' );
       exit;
    }

    /**
     * 登入页面
     * @ApiDescription(section="User", description="用户登入页面")
     * @ApiLazyRoute(uri="/login",method="GET")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function login()
    {
        $data['title'] = $data['top_title'] = '管理员登入';
        return render_web( $data );
    }

    /**
     * 登入检查
     * @ApiDescription(section="User", description="用户登入检查")
     * @ApiLazyRoute(uri="/login_check",method="GET|POST")
     * @ApiParams(name="email", type="string", nullable=false, description="Email", check="check_email", cnname="Email")
     * @ApiParams(name="password", type="string", nullable=false, description="密码", check="check_not_empty", cnname="密码")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function login_check( $email , $password )
    {
        if( $email == c('admin_email') && $password == c('admin_password') )
        {
            $_SESSION['admin'] = 1;
            $data['msg'] = 'ok';
            return render_json( $data );
        }
        else
            return send_error( 'AUTH' , '请输入正确的管理员账号' , true );
    }

    /**
     * 项目列表
     * @ApiDescription(section="User", description="项目列表")
     * @ApiLazyRoute(uri="/projects",method="GET")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function projects()
    {
        $data['title'] = $data['top_title'] = '项目选择';
        return render_web( $data );
    }

    /**
     * 项目设置
     * @ApiDescription(section="Project", description="项目设置")
     * @ApiLazyRoute(uri="/project/settings",method="GET|POST")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function settings()
    {
        if( isset( $_SESSION['current_project']['mysql_settings'] ) )
            $data = $_SESSION['current_project']['mysql_settings'];
        
        $data['title'] = $data['top_title'] = '项目设置';
        return render_ajax( $data );
    }

    /**
     * 公用函数编辑区
     * @ApiDescription(section="Code", description="公用函数编辑区")
     * @ApiLazyRoute(uri="/code/functions",method="GET|POST")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function code_functions()
    {
        if( isset( $_SESSION['current_project']['functions'] ) )
            $data['code'] = $_SESSION['current_project']['functions'];
        
        $data['title'] = $data['top_title'] = '公用函数';
        return render_ajax( $data );
    }

    /**
     * 保存项目
     * @ApiDescription(section="Project", description="保存项目")
     * @ApiLazyRoute(uri="/project/save",method="GET|POST")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function project_save()
    {
        if( isset( $_SESSION['current_project'] ) )
        {
            $content = serialize( $_SESSION['current_project'] );
            header( 'Content-type: application/lazy' );
            header( 'Content-Disposition: attachment; filename="LazyRest.config.' . date( "YmdHis" ) . '.txt"' );
            echo $content;
        }
    }

    // /project/file/uploaded
    /**
     * 打开本地项目文件
     * @ApiDescription(section="Project", description="打开本地项目文件")
     * @ApiLazyRoute(uri="/project/file/uploaded",method="POST")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function project_load()
    {
        if( isset( $_FILES['lazyfile_upload'] ) && $_FILES['lazyfile_upload']['error'] == 0 )
        {
            $content = file_get_contents( $_FILES['lazyfile_upload']['tmp_name'] );

            if( $pdata = unserialize( $content ) )
            {
                $_SESSION['current_project'] = $pdata;
                header( 'Location: /interface/list' );
            }
            else
            {
                return info_page( '无法识别文件内容，<a href="javascript:history.back();void(0);">请返回重试</a>' );
            }
        }
    }

    /**
     * 更新项目设置
     * @ApiDescription(section="Project", description="更新项目设置")
     * @ApiLazyRoute(uri="/interface/info/save",method="POST")
     * @ApiParams(name="info", type="string", nullable=false, description="info", check="check_not_empty", cnname="接口数据")
     * @ApiParams(name="name", type="string", nullable=false, description="name", check="check_not_empty", cnname="接口名称")
     * @ApiParams(name="modify", type="string", nullable=false, description="modify", check="check_not_empty", cnname="是否修改操作")
     */
    public function  interface_save( $info , $name , $modify )
    {
        if( !$modify && isset( $_SESSION['current_project']['interface']['name'] ) &&  in_array( $name , $_SESSION['current_project']['interface']['name'] ) )
            return send_error( null , '同名接口已经存在' );

        $_SESSION['current_project']['interface']['info'][$name] = $info;
        
        if( !$modify )
            $_SESSION['current_project']['interface']['name'][] = $name;

        $data['msg'] = 'done';
        return send_result( $data );
    }

    /**
     * 保存公共函数
     * @ApiDescription(section="Code", description="保存公共函数")
     * @ApiLazyRoute(uri="/code/functions_save",method="POST")
     * @ApiParams(name="code", type="string", nullable=false, description="code", check="check_not_empty", cnname="代码")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function functions_save( $code )
    {
        $_SESSION['current_project']['functions'] = base64_encode( $code );
        return render_json( 'done' );
    }


     /**
     * 更新项目设置
     * @ApiDescription(section="Project", description="更新项目设置")
     * @ApiLazyRoute(uri="/project/settings/update",method="POST")
     * @ApiParams(name="mysql_host", type="string", nullable=false, description="mysql_host", check="check_not_empty", cnname="数据库地址")
     * @ApiParams(name="mysql_port", type="string", nullable=false, description="mysql_port", check="check_not_empty", cnname="数据库端口")
     * @ApiParams(name="mysql_user", type="string", nullable=false, description="mysql_user", check="check_not_empty", cnname="数据库用户名")
     * @ApiParams(name="mysql_password", type="string", nullable=true, description="mysql_password", check="", cnname="数据库密码")
     * @ApiParams(name="mysql_database", type="string", nullable=false, description="mysql_database", check="check_not_empty", cnname="数据库名称")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function settings_save( $mysql_host , $mysql_port , $mysql_user , $mysql_password , $mysql_database )
    {
        
        // 连接数据库
        $dsn = 'mysql:host=' . $mysql_host
              . ';port=' . $mysql_port
              . ';dbname=' . $mysql_database;

        $db = mydb( $dsn , $mysql_user , $mysql_password );
        
        // 取得table列表
        if( $tables = $db->getData("SHOW TABLES")->toArray() )
        {
            //$_SESSION['current_project']['tables'] = $tables;
            $pdo = $db->pdo;
            
                
            foreach( $tables as $table )
            {
                $table_name = reset( $table );
                
                $datameta = new \Lazyphp\Core\Datameta( $pdo );
                $ret = array();

                $ret['fields'] = $datameta ->getTableCols( $table_name );
                $ret['names'] = $datameta->getFields( $table_name );
                $_SESSION['current_project']['tables'][$table_name] = $ret ;

            }
        }

        $_SESSION['current_project']['mysql_settings'] = array
        (
            'mysql_host' => $mysql_host , 
            'mysql_port' => $mysql_port , 
            'mysql_user' => $mysql_user , 
            'mysql_password' => $mysql_password , 
            'mysql_database' => $mysql_database
        );

        $data['msg'] = 'done';

        return send_result( $data );
    }

    /**
     * 接口列表
     * @ApiDescription(section="Project", description="接口列表")
     * @ApiLazyRoute(uri="/interface/list",method="GET")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function interface_list()
    {
        if( isset( $_SESSION['current_project']['interface']['info'] ) )
            $data['interfaces']  = $_SESSION['current_project']['interface']['info'] ;
        $data['title'] = $data['top_title'] = '接口列表';
        return render_web( $data , 'lazyrest' );
    }

    /**
     * 退出登入
     * @ApiDescription(section="User", description="退出登入")
     * @ApiLazyRoute(uri="/logout",method="GET")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function logout()
    {
        foreach( $_SESSION as $k=>$v )
        {
            unset( $_SESSION[$k] );   
        }

        header('Location: /login');
        exit;
    }


    /**
     * 取得表的字段信息
     * @ApiDescription(section="Meta", description="session")
     * @ApiLazyRoute(uri="/table/fields",method="GET|POST")
      * @ApiParams(name="table", type="string", nullable=false, description="table", check="check_not_empty", cnname="table")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function getfields( $table )
    {
        if( isset( $_SESSION['current_project']['tables'][$table] ) ) return render_json( $_SESSION['current_project']['tables'][$table] );
        else
            return send_error( null , '数据表不存在' );
    }

    /**
     * session
     * @ApiDescription(section="User", description="session")
     * @ApiLazyRoute(uri="/session",method="GET")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function session()
    {
        echo '<pre>' . htmlspecialchars( print_r( $_SESSION , 1 ) ) . '</pre>';
    }

    /**
     * 生成完整的代码
     * @ApiDescription(section="code", description="生成代码块")
     * @ApiLazyRoute(uri="/code/build",method="GET|POST")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function code_build()
    {
        // 首先从session中取得接口信息
        if( !isset( $_SESSION['current_project']['interface']['info'] ) ) return send_error( 'INPUT' , '还没有接口信息' );

        // 初始化代码模板引擎
        $twig = twig();

        // 取得了接口列表
        $interfaces = $_SESSION['current_project']['interface']['info'];

        // 开始循环
        foreach( $interfaces as $item )
        {
            // 默认格式为Json，解码成多维数组
            $item = json_decode( $item , 1 );
            
            $data = array();
            $data['settings'] = $item;
            $data['table_fields'] = $_SESSION['current_project']['tables'][$item['target_table_list']]['names'];
            $data['method'] = $item['target_table_list'].'_'.$item['active_logic'].'_'.$item['id'];
            $code['mysql'] = $_SESSION['current_project']['mysql_settings'];

            if( intval( $item['inoauth'] ) == 1 ) $code['noauth'][] = $data['method'];

            // 然后要开始识别是什么类型的接口
            if( $item['active_logic'] != 'lccustom' )
            {
                // 先要检查是否选中了操作表
                // 只有自定义操作才不需要指定目标数据表
                if( $item['target_table_list'] == '0' ) 
                    return send_error( 'INPUT' , '接口「' . $item['iname'] . '」的目标数据表未选择，无法生成默认代码' );

                

                switch( $item['active_logic'] )
                {
                    // insert 
                    case 'lcadd':

                        $code['lcadd'][] = $twig->render( 'insert.tpl.code' , $data );

                    break; 

                    // modify
                    case 'lcmodify':
                        $code['lcmodify'][] = $twig->render( 'update.tpl.code' , $data );

                    break;

                    // delete
                    case 'lcdelete':
                        $code['lcdelete'][] = $twig->render( 'delete.tpl.code' , $data );

                    break;

                    // list
                    case 'lclist':
                        $code['lclist'][] = $twig->render( 'list.tpl.code' , $data );

                    break;

                    
                }
            }
            else
            {
                //    case 'lccustom':
                $code['lccustom'][] = $twig->render( 'custom.tpl.code' , $data );
            }

            //

        }

         $code['functions'] = base64_decode($_SESSION['current_project']['functions']);
        

        // 输出最终代码
        echo '============================'."\r\n";

        $class_code = $twig->render( 'controller.tpl.code' , $code );
        file_put_contents( AROOT . 'controller' . DS . 'LazyRestController.php' , $class_code  );
        
        echo '<pre>' . highlight_string( $class_code , 1 ) . '</pre>';
    }

    /**
     * 删除接口
     * @ApiDescription(section="Project", description="删除接口")
     * @ApiLazyRoute(uri="/interface/remove",method="POST")
     * @ApiParams(name="id", type="string", nullable=false, description="id", check="check_not_empty", cnname="id")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function interface_remove( $id )
    {
        foreach( $_SESSION['current_project']['interface']['info'] as $key => $item )
        {
            $item = json_decode( $item , 1 );
            if( $item['id'] == $id )
            {
                $remove_name = $item['iname'];
                unset($_SESSION['current_project']['interface']['info'][$key]);
            }
        }

        return render_json( 'done' );
    }

    /**
     * 创建接口
     * @ApiDescription(section="Project", description="创建接口")
     * @ApiLazyRoute(uri="/interface/create",method="GET")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     */
    public function interface_create()
    {
        $iname = z( t( v('iname') ) );
        if( strlen( $iname ) > 0 )
        {
            $data['info'] = json_decode( $_SESSION['current_project']['interface']['info'][$iname] , 1 );
            $data['info_json'] = base64_encode( $_SESSION['current_project']['interface']['info'][$iname] );

            $data['title'] = $data['top_title'] = '修改接口';
            $data['form_type'] = 'modify';
        }
        else
        {
            $data['title'] = $data['top_title'] = '创建接口'; 
            $data['form_type'] = 'create';   
        }

        return render_web( $data , 'lazyrest' );

    }
}
