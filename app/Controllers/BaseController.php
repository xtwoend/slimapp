<?php namespace Controllers;

use Request;


class BaseController
{
	protected $app;

	protected $data;

	public function __construct()
	{
		$this->app = \Slim\Slim::getInstance();	
		$this->data = array();

		$this->data['baseUrl']  = $this->baseUrl();
	}


	/**
     * generate base URL
     */
    protected function baseUrl()
    {
        $path       = dirname($_SERVER['SCRIPT_NAME']);
        $path       = trim($path, '/');
        $baseUrl    = Request::getUrl();
        $baseUrl    = trim($baseUrl, '/');
        return $baseUrl.'/'.$path.( $path ? '/' : '' );
    }

    /**
     * generate siteUrl
     */
    protected function siteUrl($path, $includeIndex = false)
    {
        $path = trim($path, '/');
        return $this->data['baseUrl'].$path;
    }
}
