<?php

class Fbuser extends Eloquent {

    public static $timestamps = true;
    
    public function posts()
    {
        return $this->has_many('Post');
    }

}