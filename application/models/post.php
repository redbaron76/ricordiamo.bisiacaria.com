<?php

class Post extends Eloquent {

    public static $timestamps = true;
    
    public function fbuser()
    {
        return $this->belongs_to('Fbuser');
    }

}