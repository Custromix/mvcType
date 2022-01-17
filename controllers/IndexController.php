<?php

class IndexController
{
    private $view;

    public function __construct($action){

       /* if($action[1] != 'index' ){
            throw new Exception('Page introuvable');
        }*/

        switch ($action[1]){
            case 'default':
                break;
            default:
                    throw new Exception('Page introuvable');
                break;
        }
    }

    public function default()
    {
        $vue = ['controllerName' => 'IndexController'];

                      /* Nom du dossier, Nom du template */
        $this->view = new View('index/index');
        return $this->view->generate($vue);
    }

}