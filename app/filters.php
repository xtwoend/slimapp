<?php

//route filter middleware
function Auth()
{
	if(!Sentry::check()){
		if(Request::isAjax()){
           	Response::headers()->set('Content-Type', 'application/json');
            Response::setBody(json_encode(
	            array(
	                'success'   => false,
	                'message'   => 'Session expired or unauthorized access.',
	                'code'      => 401
				)
            ));
            App::stop();
        }else{
            $redirect = Request::getResourceUri();
            Response::redirect(App::urlFor('login').'?redirect='.base64_encode($redirect));
        }
	}
}
