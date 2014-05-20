<?php namespace Controllers;

use App,
	Input,
	Sentry,
	Response;

class AuthController extends BaseController
{
	public function index()
	{
		$this->data['title'] = 'Login Page';
		return App::render('users/login.twig', $this->data);
	}

	public function store()
	{
		$email 		= Input::post('email');
		$password 	= Input::post('password');
		$remember 	= Input::post('remember', false);

		try{
            $credential = array(
                'email'     => $email,
                'password'  => Input::post('password')
            );

            // Try to authenticate the user
            $user = Sentry::authenticate($credential, $remember);
       		Sentry::login($user, false);

        	Response::redirect($this->siteUrl('admin'));

        }catch(\Exception $e){
           
            Response::redirect($this->siteUrl('login'));
        }


	}
}
