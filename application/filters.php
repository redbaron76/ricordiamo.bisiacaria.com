<?php

return array(

	'before' => function($method, $uri)
	{		
		// Do stuff after every request to your application.		
	},


	'after' => function($response, $method, $uri)
	{
		
		/*//FB object
		$facebook = new Facebook(array(
			'appId'  => '301870346508580',
			'secret' => 'a725aa9a06b29df85a616a6d6cf64c45'
		));
		
		//Is there user?
		$user = $facebook->getUser();
		
		//
		echo Utility::printr($user);*/
		
		
	},


	'auth' => function()
	{
		return ( ! Auth::check()) ? Redirect::to_login() : null;
	},


	'csrf' => function()
	{
		return (Input::get('csrf_token') !== Form::raw_token()) ? Response::error('500') : null;
	},
	
	
	
	/*
	|--------------------------------------------------------------------------
	| Custom Filters
	|--------------------------------------------------------------------------
	*/
	
	
	//Facebook user login filter
	'facebook_user' => function() {
		
		// If FB user doesn't exist...
		if(!Session::has('$user_profile')) {
			
			//FB object
			$facebook = new Facebook(array(
				'appId'  => '301870346508580',
				'secret' => 'a725aa9a06b29df85a616a6d6cf64c45',
			));
			
			//Is there user?
			$user = $facebook->getUser();
			
			//Save user in session
			Session::put('$user', $user);
			
			//Is user valid?
			if (is_numeric($user)) {
				
				try {
					// User valid -> get data from FB
					$user_profile = $facebook->api('/me');
					//Metto in dati in sessione
					Session::put('$user_profile', $user_profile);					
					
					if(isset($user_profile)) {
						
						//Already in db?
						$fbuser = Fbuser::where('id', '=', $user)->first();
						//Not in db -> insert
						if(!isset($fbuser)) {
							$fbuser = new Fbuser();
							$fbuser->id  = $user;
							$fbuser->name   = $user_profile['name'];
							$fbuser->email  = $user_profile['email'];
							if(isset($user_profile['location']['name'])) $fbuser->city = $user_profile['location']['name'];
							if(isset($user_profile['gender'])) $fbuser->gender = $user_profile['gender'];
							$fbuser->save();                        
						}
						
					}
					
				} catch (FacebookApiException $e) {
					//Not logged -> user is null
					error_log($e);			  
					$user = null;					
				}
			}
			
			if (!empty($user_profile)) {
				
				//Create link logout
				$fburl = $facebook->getLogoutUrl(array('next' => URL::to_logout()));
				
			} else {
				
				//Create link login
				$params = array(
					'scope' => 'publish_stream, email',
					'redirect_uri' => URL::to_home()
				);
				$fburl = $facebook->getLoginUrl($params);
				
			}
			
			//Link in session
			Session::put('$fburl', $fburl);
			
		}		
		
	},
	
	// On logout reset session data
	'facebook_logout' => function()
	{
		//Delete $user session
		Session::forget('$user');
		//Set $user_profile empty
		Session::put('$user_profile', '');
		//Delete FB button URL
		Session::forget('$fburl');
		
	},
	
	//Fb User esiste altrimenti torna home
	'facebook_check' => function() {
		
		//FB object
		$facebook = new Facebook(array(
			'appId'  => '301870346508580',
			'secret' => 'a725aa9a06b29df85a616a6d6cf64c45',
		));
		
		//Is there user?
		$user = $facebook->getUser();
		
		if(!is_numeric($user)) {
			return Redirect::to_home();
		}		
		
	},
	
	//FB BAN LIST
	'facebook_ban' => function() {
	    
	    $user = Session::get('$user');
	    
	    //BAN CB1957
		if($user == 100003033295126) return Redirect::to_home();
	    
	},
	
	// After POST, post to Facebook
	'facebook_post' => function()
	{
		
		//FB object
		$facebook = new Facebook(array(
			'appId'  => '301870346508580',
			'secret' => 'a725aa9a06b29df85a616a6d6cf64c45',
		));
		
		//Get user
		$user = Session::get('$user');
		
		$publishStream = $facebook->api("/$user/feed", 'post', array(
			'message' => "Ho appena lasciato un ricordo dei bei tempi passati su Bisiacaria.com",
			'link'    => 'http://ricordiamo.bisiacaria.com',
			'picture' => 'http://ricordiamo.bisiacaria.com/img/logofb.gif',
			'name'    => 'Bisiacaria.com',
			'description'=> 'Hai anche tu dei bei ricordi di Bisiacaria.com? In questo sito li stiamo raccogliendo tutti per non dimenticarli più. Entra con il tuo account Facebook! E\' facile.'
			)
		);
		
	},
	
	//Active GET / to reset cookie
	'trigger_reset' => function()
	{
		//Reset trigger loadStop (view/partial/row)
		Cookie::forget('loadStop');
	},

);