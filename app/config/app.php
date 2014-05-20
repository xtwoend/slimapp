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
    				
	),
	'aliases' 	=> array(

					'Slim'      => 'Slim\Slim',
				    'Middleware'=> 'Slim\Middleware',
				    'App'       => 'SlimFacades\App',
				    'Route'     => 'SlimFacades\Route',
	),

);