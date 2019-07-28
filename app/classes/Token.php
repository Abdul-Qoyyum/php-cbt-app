<?php

    class Token
    {
        public static function generate() {
            return Session::put(Config::get('session/token_name'), md5(uniqid()));
        }

        public static function check($token){
            $tokenName = Config::get('session/token_name');

            if(Session::exists($tokenName) && $token === Session::get($tokenName)){
                Session::delete($tokenName);
                return true;
            }

            return false;
        }

        public static function csrf() {
            $tokenGen = self::generate();
            return '<input type="hidden" name="token" value=' . $tokenGen . '>';
        }

        public static function rand()
        {
            return rand(100000, 999999);
        }
    }