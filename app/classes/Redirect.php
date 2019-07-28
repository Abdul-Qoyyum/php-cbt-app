<?php
    class Redirect
    {
        public static function to($location = null){
            if($location){
                if(is_numeric($location)){
                    switch($location){
                        case 404:
                            header('HTTP/1.0 404 Not Found');
                            include 'app/includes/errors/404.php';
                            exit();
                        break;

                        case 403:
                            header('HTTP/1.0 403 Not Found');
                            include 'app/includes/errors/403.php';
                            exit();
                        break;
                    }
                }
                ob_end_clean();
                header('Location: ' . $location);
                exit();
            }
        }

        public static function back(){
            $location = $_SERVER['HTTP_REFERER'];
			ob_end_clean();
            header('Location:'. $location);
            exit();
        }
    }