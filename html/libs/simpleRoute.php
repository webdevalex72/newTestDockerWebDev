<?php
namespace MVC\Libs;

class SimpleRouter {
 
 /* Routes array where we store the various routes defined. */
 private $routes;

 /* The methods adds each route defined to the $routes array */
 function add_route($route, callable $closure) {
     $this->routes[$route] = $closure;
 }

 /* Execute the specified route defined */
 function execute() {
     //$path = $_SERVER['PATH_INFO'];
     $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

     /* Check if the given route is defined,
      * or execute the default '/' home route.
      */
     if(array_key_exists($path, $this->routes)) {
         $this->routes[$path]();
     } else {
         $this->routes['/']();
     }
 }   
}