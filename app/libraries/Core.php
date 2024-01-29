<?php

// define url
class Core
{
    // App core class
    // create url & load controllers
    // URL method -/controller/method/params

    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->getURL();
        //print_r($url);
        // exit;

        // check the first value of URL in controllers
        if (isset($url[0])) { // pages/ Category
            // ucwords means change lowercase to uppercase 
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->currentController = ucwords($url[0]); // Pages
                unset($url[0]);
            }
        }

        require_once('../app/controllers/' . $this->currentController . '.php');

        // create new object
        $this->currentController = new $this->currentController;
        // $Pages = new Pages();
        // $Category = new Category();

        // Check there is any method in controller
        
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
            // print_r($this->currentMethod);
        }

        // Get params
        $this->params = $url ? array_values($url) : [];
        // print_r($this->params);
        // exit();

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        // print_r($this->params);
        // print_r($url);
        // exit();
        // echo $this->currentMethod;
    }

    public function getURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            // FILTER_SANITIZE_URL filter removes all illegal URL characters from a string.
            // This filter allows all letters, digits and $-_.+!*'(),{}|\\^~[]`"><#%;/?:@&=
            $url = filter_var($url, FILTER_SANITIZE_URL); //remove illegal
            $url = explode('/', $url); //Break a string into an array
            return $url;
        }
    }
}
