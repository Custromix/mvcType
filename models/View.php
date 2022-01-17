<?php

class View
{

    private $file;
    private $t;

    public function __construct($action)
    {
        $this->file = 'views/'.$action.'.php';
    }

    /**
     * @param mixed $t
     */
    public function setT($t)
    {
        $this->t = $t;
    }


    public function generate($data){

        $content = $this->generateFile($this->file, $data);

        $vue = $this->generateFile('views/base.php', ['title' => $this->t,'content' => $content]);

        return $vue;

    }

    private function generateFile($file, $data){


        if (file_exists($file)){
            extract($data);

            ob_start();
            require $file;
            return ob_get_clean();
        }
        else{
            throw new Exception('Fichier introuvable');
        }
    }


}