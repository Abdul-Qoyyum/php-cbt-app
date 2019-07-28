<?php
    class Input 
    {
        public static function exists($type = 'post'){
            switch($type){
                case 'post':
                    return (!empty($_POST)) ? true : false;
                break;
                case 'get':
                    return (!empty($_GET)) ? true : false;
                break;
                default:
                    return false;
                break;
            }
        }

        public static function get($item){
            if(isset($_POST[$item])){
                return $_POST[$item];
            } else if(isset($_GET[$item])){
                return $_GET[$item];
            }
            return '';
        }

        public static function errors($field = '')
        {
            if(Session::exists('inputs-errors')){
                if($field != ''){
                    if(array_key_exists($field, Session::get('inputs-errors'))){
                        return Session::get('inputs-errors')[$field];
                    }
                    return false;
                }else{
                    return Session::get('inputs-errors');
                }
            }
           
        }
    }