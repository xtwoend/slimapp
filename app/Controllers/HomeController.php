<?php namespace Controllers;

use App;

class HomeController extends BaseController
{
	public function index()
	{
		$this->data['title'] = 'Selamata datang di starter slim';
		return App::render('index.twig', $this->data);
	}

	public function test()
	{
		
	}
}
