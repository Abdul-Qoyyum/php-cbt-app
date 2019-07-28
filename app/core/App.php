<?php
Class App
{

    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        $router = $GLOBALS['route'];
        if(array_key_exists($url[0], $router)){
            $controller_name = $router[$url[0]];
            if(file_exists('app/controllers/' . $controller_name . '.php'))
            {  
                $this->controller = $controller_name;
                unset($url[0]);
            }else{
                Redirect::to(404);
            }   
        }
        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        
        if(isset($url[1]))
        {  
            $url[1] = str_replace('-', '_', $url[1]);
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }else{
                Redirect::to(404);
            }
        }

        $this->params = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if(isset($_GET['url'])) 
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}