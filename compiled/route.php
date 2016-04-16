<?php 
namespace Lazyphp\Core {
Class RestException extends \Exception {}
Class RouteException extends \Lazyphp\Core\RestException {}
Class InputException extends \Lazyphp\Core\RestException {}
Class DatabaseException extends \Lazyphp\Core\RestException {}
Class DataException extends \Lazyphp\Core\RestException {}
Class AuthException extends \Lazyphp\Core\RestException {}
Class TmplateException extends \Lazyphp\Core\RestException {}
Class RpwtException extends \Lazyphp\Core\RestException {}
Class RemoteException extends \Lazyphp\Core\RestException {}
}
namespace{
$GLOBALS['meta'] = array (
  '904d185bb9e369a087f6d0cc6898feb0' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'user',
        'description' => '帐号注册',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'POST /account/reg',
        'ApiMethod' => '(type="POST")',
        'ApiRoute' => '(name="/account/reg")',
      ),
    ),
    'Params' => 
    array (
      0 => 
      array (
        'name' => 'password',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '密码',
      ),
      1 => 
      array (
        'name' => 'name',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '帐号名',
      ),
      2 => 
      array (
        'name' => 'email',
        'filters' => 
        array (
          0 => 'check_mail_lr',
        ),
        'cnname' => '电子邮件',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => 
    array (
      'password' => 
      array (
        'name' => 'password',
      ),
      'name' => 
      array (
        'name' => 'name',
      ),
      'email' => 
      array (
        'name' => 'email',
      ),
    ),
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'POST /account/reg',
        'params' => false,
      ),
    ),
  ),
  'adf2fcb06b2ee665aff2eb2aabd0b319' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'user',
        'description' => '获得token',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'POST /account/token',
        'ApiMethod' => '(type="POST")',
        'ApiRoute' => '(name="/account/token")',
      ),
    ),
    'Params' => 
    array (
      0 => 
      array (
        'name' => 'email',
        'filters' => 
        array (
          0 => 'check_email_lr',
        ),
        'cnname' => '电子邮件',
      ),
      1 => 
      array (
        'name' => 'password',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '密码',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => 
    array (
      'email' => 
      array (
        'name' => 'email',
      ),
      'password' => 
      array (
        'name' => 'password',
      ),
    ),
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'POST /account/token',
        'params' => false,
      ),
    ),
  ),
  '4350733afab42e2ae0cd9ad4fe27ae3b' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Interface',
        'description' => '默认提示',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET|POST /interface/field/add',
        'ApiMethod' => '(type="GET|POST")',
        'ApiRoute' => '(name="/interface/field/add")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET|POST /interface/field/add',
        'params' => false,
      ),
    ),
  ),
  '70c907e8750f400eb470132e210b44cb' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Demo',
        'description' => '默认提示',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET /',
        'ApiMethod' => '(type="GET")',
        'ApiRoute' => '(name="/")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET /',
        'params' => false,
      ),
    ),
  ),
  'b7b86a96da11293a5116d5a8d8e7d63c' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'User',
        'description' => '用户登入页面',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET /login',
        'ApiMethod' => '(type="GET")',
        'ApiRoute' => '(name="/login")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET /login',
        'params' => false,
      ),
    ),
  ),
  'b8c297d1d8398c693a4a0e40e2821394' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'User',
        'description' => '用户登入检查',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET|POST /login_check',
        'ApiMethod' => '(type="GET|POST")',
        'ApiRoute' => '(name="/login_check")',
      ),
    ),
    'Params' => 
    array (
      0 => 
      array (
        'name' => 'email',
        'filters' => 
        array (
          0 => 'check_email',
        ),
        'cnname' => 'Email',
      ),
      1 => 
      array (
        'name' => 'password',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '密码',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => 
    array (
      'email' => 
      array (
        'name' => 'email',
      ),
      'password' => 
      array (
        'name' => 'password',
      ),
    ),
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET|POST /login_check',
        'params' => false,
      ),
    ),
  ),
  '672c174c69d61c2c2cbcf46ac4d33d66' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'User',
        'description' => '项目列表',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET /projects',
        'ApiMethod' => '(type="GET")',
        'ApiRoute' => '(name="/projects")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET /projects',
        'params' => false,
      ),
    ),
  ),
  'be8c2d1d9c1569fade95639727e6a5cb' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Project',
        'description' => '项目设置',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET|POST /project/settings',
        'ApiMethod' => '(type="GET|POST")',
        'ApiRoute' => '(name="/project/settings")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET|POST /project/settings',
        'params' => false,
      ),
    ),
  ),
  '38f2e82b819d3a11abf31646a2e87abd' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Code',
        'description' => '公用函数编辑区',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET|POST /code/functions',
        'ApiMethod' => '(type="GET|POST")',
        'ApiRoute' => '(name="/code/functions")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET|POST /code/functions',
        'params' => false,
      ),
    ),
  ),
  'e699f3f1060a6c5974cd01e557e94be6' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Project',
        'description' => '保存项目',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET|POST /project/save',
        'ApiMethod' => '(type="GET|POST")',
        'ApiRoute' => '(name="/project/save")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET|POST /project/save',
        'params' => false,
      ),
    ),
  ),
  '7f090a27b63941767760fc2e233b9d04' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Project',
        'description' => '打开本地项目文件',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'POST /project/file/uploaded',
        'ApiMethod' => '(type="POST")',
        'ApiRoute' => '(name="/project/file/uploaded")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'POST /project/file/uploaded',
        'params' => false,
      ),
    ),
  ),
  '95014d953406805759ada0e582b7a66c' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Project',
        'description' => '更新项目设置',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'POST /interface/info/save',
        'ApiMethod' => '(type="POST")',
        'ApiRoute' => '(name="/interface/info/save")',
      ),
    ),
    'Params' => 
    array (
      0 => 
      array (
        'name' => 'info',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '接口数据',
      ),
      1 => 
      array (
        'name' => 'name',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '接口名称',
      ),
      2 => 
      array (
        'name' => 'modify',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '是否修改操作',
      ),
    ),
    'binding' => 
    array (
      'info' => 
      array (
        'name' => 'info',
      ),
      'name' => 
      array (
        'name' => 'name',
      ),
      'modify' => 
      array (
        'name' => 'modify',
      ),
    ),
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'POST /interface/info/save',
        'params' => false,
      ),
    ),
  ),
  '7593d61a7d8d2a5995eaee59773df4fa' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Code',
        'description' => '保存公共函数',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'POST /code/functions_save',
        'ApiMethod' => '(type="POST")',
        'ApiRoute' => '(name="/code/functions_save")',
      ),
    ),
    'Params' => 
    array (
      0 => 
      array (
        'name' => 'code',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '代码',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => 
    array (
      'code' => 
      array (
        'name' => 'code',
      ),
    ),
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'POST /code/functions_save',
        'params' => false,
      ),
    ),
  ),
  'bd2a557c4f952a01547b2cd1abff06c1' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Project',
        'description' => '更新项目设置',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'POST /project/settings/update',
        'ApiMethod' => '(type="POST")',
        'ApiRoute' => '(name="/project/settings/update")',
      ),
    ),
    'Params' => 
    array (
      0 => 
      array (
        'name' => 'mysql_host',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '数据库地址',
      ),
      1 => 
      array (
        'name' => 'mysql_port',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '数据库端口',
      ),
      2 => 
      array (
        'name' => 'mysql_user',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '数据库用户名',
      ),
      3 => 
      array (
        'name' => 'mysql_password',
        'filters' => 
        array (
          0 => '',
        ),
        'cnname' => '数据库密码',
      ),
      4 => 
      array (
        'name' => 'mysql_database',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => '数据库名称',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => 
    array (
      'mysql_host' => 
      array (
        'name' => 'mysql_host',
      ),
      'mysql_port' => 
      array (
        'name' => 'mysql_port',
      ),
      'mysql_user' => 
      array (
        'name' => 'mysql_user',
      ),
      'mysql_password' => 
      array (
        'name' => 'mysql_password',
      ),
      'mysql_database' => 
      array (
        'name' => 'mysql_database',
      ),
    ),
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'POST /project/settings/update',
        'params' => false,
      ),
    ),
  ),
  'c9cd1f5b63422af8864111cf64e32798' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Project',
        'description' => '接口列表',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET /interface/list',
        'ApiMethod' => '(type="GET")',
        'ApiRoute' => '(name="/interface/list")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET /interface/list',
        'params' => false,
      ),
    ),
  ),
  '4e989ac920d999cda2f48d32b52816d8' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'User',
        'description' => '退出登入',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET /logout',
        'ApiMethod' => '(type="GET")',
        'ApiRoute' => '(name="/logout")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET /logout',
        'params' => false,
      ),
    ),
  ),
  'd24028ad66b67cfd7a9ddbf7052a7200' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Meta',
        'description' => 'session',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET|POST /table/fields',
        'ApiMethod' => '(type="GET|POST")',
        'ApiRoute' => '(name="/table/fields")',
      ),
    ),
    'Params' => 
    array (
      0 => 
      array (
        'name' => 'table',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => 'table',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => 
    array (
      'table' => 
      array (
        'name' => 'table',
      ),
    ),
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET|POST /table/fields',
        'params' => false,
      ),
    ),
  ),
  '770dd84199081a78062e6b3765267efe' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'User',
        'description' => 'session',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET /session',
        'ApiMethod' => '(type="GET")',
        'ApiRoute' => '(name="/session")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET /session',
        'params' => false,
      ),
    ),
  ),
  '7930fbb22ba9344f9776ba16415378a6' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'code',
        'description' => '生成代码块',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET|POST /code/build',
        'ApiMethod' => '(type="GET|POST")',
        'ApiRoute' => '(name="/code/build")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET|POST /code/build',
        'params' => false,
      ),
    ),
  ),
  '5d6aecff6be60c1be68f608a01144f5b' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Project',
        'description' => '删除接口',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'POST /interface/remove',
        'ApiMethod' => '(type="POST")',
        'ApiRoute' => '(name="/interface/remove")',
      ),
    ),
    'Params' => 
    array (
      0 => 
      array (
        'name' => 'id',
        'filters' => 
        array (
          0 => 'check_not_empty',
        ),
        'cnname' => 'id',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => 
    array (
      'id' => 
      array (
        'name' => 'id',
      ),
    ),
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'POST /interface/remove',
        'params' => false,
      ),
    ),
  ),
  '53a2cc6c42b4381e93bf4f6e4122d73b' => 
  array (
    'Description' => 
    array (
      0 => 
      array (
        'section' => 'Project',
        'description' => '创建接口',
      ),
    ),
    'LazyRoute' => 
    array (
      0 => 
      array (
        'route' => 'GET /interface/create',
        'ApiMethod' => '(type="GET")',
        'ApiRoute' => '(name="/interface/create")',
      ),
    ),
    'Return' => 
    array (
      0 => 
      array (
        'type' => 'object',
        'sample' => '{\'code\': 0,\'message\': \'success\'}',
      ),
    ),
    'binding' => false,
    'route' => 
    array (
      0 => 
      array (
        'uri' => 'GET /interface/create',
        'params' => false,
      ),
    ),
  ),
);
$app = new \Lazyphp\Core\Application();
$app->route('POST /account/reg',array( 'Lazyphp\Controller\LazyRestController','user_lcadd_1460691333694'));
$app->route('POST /account/token',array( 'Lazyphp\Controller\LazyRestController','user_lccustom_1460694654897'));
$app->route('GET|POST /interface/field/add',array( 'Lazyphp\Controller\LazyphpController','field_add'));
$app->route('GET /',array( 'Lazyphp\Controller\LazyphpController','index'));
$app->route('GET /login',array( 'Lazyphp\Controller\LazyphpController','login'));
$app->route('GET|POST /login_check',array( 'Lazyphp\Controller\LazyphpController','login_check'));
$app->route('GET /projects',array( 'Lazyphp\Controller\LazyphpController','projects'));
$app->route('GET|POST /project/settings',array( 'Lazyphp\Controller\LazyphpController','settings'));
$app->route('GET|POST /code/functions',array( 'Lazyphp\Controller\LazyphpController','code_functions'));
$app->route('GET|POST /project/save',array( 'Lazyphp\Controller\LazyphpController','project_save'));
$app->route('POST /project/file/uploaded',array( 'Lazyphp\Controller\LazyphpController','project_load'));
$app->route('POST /interface/info/save',array( 'Lazyphp\Controller\LazyphpController','interface_save'));
$app->route('POST /code/functions_save',array( 'Lazyphp\Controller\LazyphpController','functions_save'));
$app->route('POST /project/settings/update',array( 'Lazyphp\Controller\LazyphpController','settings_save'));
$app->route('GET /interface/list',array( 'Lazyphp\Controller\LazyphpController','interface_list'));
$app->route('GET /logout',array( 'Lazyphp\Controller\LazyphpController','logout'));
$app->route('GET|POST /table/fields',array( 'Lazyphp\Controller\LazyphpController','getfields'));
$app->route('GET /session',array( 'Lazyphp\Controller\LazyphpController','session'));
$app->route('GET|POST /code/build',array( 'Lazyphp\Controller\LazyphpController','code_build'));
$app->route('POST /interface/remove',array( 'Lazyphp\Controller\LazyphpController','interface_remove'));
$app->route('GET /interface/create',array( 'Lazyphp\Controller\LazyphpController','interface_create'));
$app->run();
}
