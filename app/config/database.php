<?php 


return array(
	
	'fetch' => PDO::FETCH_CLASS,
    
    'default' => 'mysql',
    
    'connections' => array(
        
        'mysql' => array(

            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'slim',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
    )

);