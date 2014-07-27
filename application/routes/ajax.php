<?php

return array(

    'POST /ajax/more' => array('do' => function() {
        
        //Recupero ID
        $id = Input::get('id');
        
        //Check stop trigger
        if(Cookie::get('loadStop')) return null;
        
        // Ottieni lista posts
		$posts = Post::with('fbuser')->where('id', '<', $id)->order_by('id', 'desc')->take(2)->get();
		
		//Creo la vista di pagina
        $page = View::make('partials/row', array('posts' => $posts));
        
        return $page;
        
    }),

);