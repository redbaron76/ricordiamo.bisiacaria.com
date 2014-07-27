<?php

class Date {
        
        /**
        * Generate date from db datetime - 01 Nov 20011 alle dd:mm
        *
        * @param  string
        * @return string
        */
        public static function db2date_short($date)
        {        
            return strftime('%d %b %Y '.Lang::line('utility.at')->get(Config::get('application.language')).' %H:%M', strtotime($date));
        }
        
        /**
        * Generate date from db datetime - 01 November 20011 alle dd:mm
        *
        * @param  string
        * @return string
        */
        public static function db2date_long($date)
        {        
            return strftime('%d %B %Y '.Lang::line('utility.at')->get(Config::get('application.language')).' %H:%M', strtotime($date));
        }

}