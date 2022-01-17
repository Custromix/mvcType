<?php

require_once('models/View.php');

class Router
{

    private $controller;
    private $view;

    public function routeRequest(){

        try {
            if (isset($_GET['action']) && !empty($_GET['action'])){
                $actionBrut = str_replace('.php', '', $_GET['action']);
                $action = explode('/', filter_var($actionBrut, FILTER_SANITIZE_URL));
                if (count($action) == 1 || empty($action[1])){
                    $action[1] = 'default';
                }
                $controllerClass = ucfirst(strtolower($action[0]))."Controller";
                $controllerFile = "controllers/".$controllerClass.".php";
                if (file_exists($controllerFile)){
                    require_once($controllerFile);
                    $this->controller = new $controllerClass($action);
                    $methode = $action[1];
                    return $this->controller->$methode();
                }else{
                    throw new Exception('Page introuvable');
                }
            }else{
                require_once('controllers/IndexController.php');
                $this->controller = new IndexController(array('index','default'));
                return $this->controller->default();
            }

        }catch (Exception $e){
            $vue = ['errorMsg' => $e->getMessage()];
            $this->view = new View('error/error404');
            return $this->view->generate($vue);
        }

    }
}