<?php
function build_css()
{
	system('lessc ' . AROOT . DS . 'assets' . DS . 'css' . DS . 'app.less' . ' ' . AROOT . DS . 'assets' . DS . 'css' . DS . 'app.css');
}

function image( $path )
{
	return '/assets/image/'.$path;
}

function css( $path )
{
	return '/assets/css/'.$path;
}

function js( $path )
{
	return '/assets/script/'.$path;
}

function is_login()
{
	return isset( $_SESSION['admin'] ) && intval( $_SESSION['admin'] ) >= 1 ;
}

function ss( $key )
{
	if( isset( $_SESSION[$key] ) ) return $_SESSION[$key];
	else return false;
}


function checked( $value1 , $value2 )
{
	if( intval($value1) == intval( $value2 ) ) echo " checked ";
	else echo " ";
}

function selected( $value1 , $value2 )
{
	if( intval($value1) == intval( $value2 ) ) echo " selected ";
	else echo " ";
}

function twig()
{
	if( !isset( $GLOBALS['__LR_TNG'] ) )
	{
		$loader = new \Twig_Loader_Filesystem( AROOT . DS . 'codetpl' . DS . 'code' );

		$GLOBALS['__LR_TNG'] = new \Twig_Environment($loader);

		$filter = new Twig_SimpleFilter('join_names', function ( $array)
		{
    		$ret = array();
    		foreach( $array as $item )
    		{
    			$ret[] = '$'.$item['field_enname'];
    		}
    		return join(',' , $ret );
		});

		$filter2 = new Twig_SimpleFilter('clean_ptag', function ( $string )
		{
    		$string = trim( $string );
    		if( substr( $string , 0 , 5 ) == '<'.'?php' ) $string = substr( $string , 5  );
    		if( substr( $string , -2 ) == '?'.'>' ) $string = substr( $string , 0 , -2  );
    		return  $string;
		});

		$GLOBALS['__LR_TNG']->addFilter( $filter );
		$GLOBALS['__LR_TNG']->addFilter( $filter2 );

	}

	return $GLOBALS['__LR_TNG'];
}

// ======================================
// function now()
// {
// 	return date("Y-m-d H:i:s");
// }

// function check_mobile( $str )
// {
// 	return preg_match('/1\d{10}/',$str);
// }

