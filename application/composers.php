<?php

return array(

	'layouts.home' => array('name' => 'home', function($view)
	{	
        
        //Get $user_profile data from session
        $user = Session::get('$user_profile');
		
		//If not empty user...
		if(!empty($user)) {

			$partial = 'partials/form';
		
		//User is valid
		} else {
	  
			$partial = 'partials/fblog';

		}
		
        //Detect validation errors from POST form
        $errors = Session::has('errors') ? Session::get('errors') : null;
        
        $view->partial('form', $partial, array(
                                               'me' => Session::get('$user_profile'),
                                               'user' => Session::get('$user'),
                                               'fburl' => Session::get('$fburl'),
                                               'errors' => $errors
                                               ));        
		return $view;        
        
	}),

);