<?php namespace Controllers;

use App;
use Models\Post;

class HomeController extends BaseController
{
	public function index()
	{	
		$this->data['posts'] = Post::all();
		$this->data['title'] = 'Selamata datang di starter slim';
		return App::render('index.twig', $this->data);
	}

	public function test()
	{
		
	}
}
