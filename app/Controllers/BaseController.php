<?php namespace Controllers;



class BaseController
{
	protected $app;

	protected $data;

	public function __construct()
	{
		$this->app = \Slim\Slim::getInstance();	
		$this->data = array();
	}
}
