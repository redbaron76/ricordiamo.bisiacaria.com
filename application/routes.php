<?php

return array(
	
// HOME PAGE
	'GET /' => array('name' => 'home', 'before' => 'facebook_user, trigger_reset', 'do' => function()
	{
		// Ottieni lista posts
		$posts = Post::with('fbuser')->order_by('created_at', 'desc')->take(5)->get();
		
		//Creo la vista di pagina
        $page = View::make('partials/row', array('posts' => $posts));
		
		$view = View::of_home()
		->bind('rows', $page);		
		
		return $view;
		
	}),
	
	
//Logout redirect with before filter
	'GET /logout' => array('name' => 'logout',  'before' => 'facebook_logout', 'do' => function()
	{
		
		return Redirect::to_home();
		
	}),
	
	
//POST new post
	'POST /' => array('before' => 'crsf, facebook_check, facebook_ban', 'after' => 'facebook_post', 'do' => function() {
		
		//Validation rules
        $rules = array(
            'nickname' => 'required|between:3,20',
            'text' => 'required'
        );
        
        $messages = array(
            'required' => 'ERRORE: Il campo non può essere vuoto.',
            'between' => 'ERRORE: usa un nick compreso tra :min e :max caratteri.',
        );
        
        //Check validations and set error messages text
        $validator = Validator::make(Input::get(), $rules, $messages);
		
		//If not valid, back to home with array errors
        if (!$validator->valid())
        {
            return Redirect::to_home()->with('errors', $validator->errors);
        }
		
		//New Model Post
		$post = new Post;
		
		//Set properties
		$post->fill(array(
						'fbuser_id'	=> Input::get('fbuser_id'),
						'nickname' 	=> HTML::entities(Input::get('nickname')),
						'text'		=> HTML::entities(Input::get('text'))
						));
		//Save
		$post->save();
		
		return Redirect::to_home();
		
	}),

);