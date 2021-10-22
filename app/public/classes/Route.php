<?php

class Route{

    public static $routes = Array();

    public static function set($route, $function){
         self::$routes[] = $route;
         $parsedRoute = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

         if($parsedRoute == '/'.$route){
            $function->__invoke();
         }
    }
}

?>