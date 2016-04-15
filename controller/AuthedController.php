<?php
namespace Lazyphp\Controller;

class AuthedController
{
	public function __construct()
    {
    }

    protected function auth()
    {
    	$token = t(v('_token'));
    	if( strlen( $token ) > 0 )
    	{
    		session_id( $token );
    	}

    	session_start();
    }

    
}
