<?php
// load model and views

class Controller
{
    // Load Model
    public function model($model) // Product
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
    // Load views
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once('../app/views/' . $view . '.php');
        } else {
            die('View does not exist');
        }
    }
}
