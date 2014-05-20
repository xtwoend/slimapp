<?php


return array(
	
	'mode'          => 'development',
	
	'debug'         => true,
	
	'log.writer'    => null,
	
	'log.level'     => \Slim\Log::DEBUG,
	
	'log.enabled'   => true,
	
	'view'          => new \Slim\Views\Twig(),
	
	'http.version' 	=> '1.1',
	
	'routes.case_sensitive' => true,
    
	'providers' => array(
    				'Illuminate\Events\EventServiceProvider',
				    'Illuminate\Database\DatabaseServiceProvider',
				    //'Cartalyst\Sentry\SentryServiceProvider',
	),
	'aliases' 	=> array(

					'Slim'      => 'Slim\Slim',
					'Eloquent'  => 'Illuminate\Database\Eloquent\Model',
					'Sentry'    => 'Cartalyst\Sentry\Facades\Native\Sentry',
				    'Middleware'=> 'Slim\Middleware',
				    //slim facedes
				    'App'       => 'SlimFacades\App',
				    'Input'     => 'SlimFacades\Input',
				    'Log'       => 'SlimFacades\Log',
				    'Request'   => 'SlimFacades\Request',
				    'Response'  => 'SlimFacades\Response',
				    'Route'     => 'SlimFacades\Route',
				    'View'      => 'SlimFacades\View',
	),

);