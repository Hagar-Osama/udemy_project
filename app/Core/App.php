<?php


class App
{
    private $controller = 'Home';
    private $method     = 'index';

    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitURL();

        /** select controller **/
        $filename = "../app/Controllers/" . ucfirst($URL[0]) . "Controller.php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]) . "Controller";
            unset($URL[0]);
        } else {

            $filename = "../app/Controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        $controller = new $this->controller;

        /** select method **/
        if (!empty($URL[1])) {
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }

        $URL = array_values($URL);
        call_user_func_array([$controller, $this->method], $URL);
    }
}
