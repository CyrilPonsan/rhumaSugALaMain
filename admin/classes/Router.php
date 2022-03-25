<?php

require_once CLASSES . './Controller.php';

class Router
{
    public function routing(): void
    {
        var_dump($_SERVER['PATH_INFO']);
        $page = DEFAULT_ROUTES;
        if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] !== "/") {
            if (array_key_exists($_SERVER['PATH_INFO'], ROUTES)) {
                $page = ROUTES[$_SERVER['PATH_INFO']];
            } else {
                $page = NO_ROUTES_DEFAULT;
            }
        }
        $controller = new Controller();
        if (method_exists($controller, $controller->$page())) {
            $controller->$page();
        }
    }
}
