<?php

/* Create a new router */
$router = new SimpleRouter();
 
/* Add a Homepage route as a closure */
$router->add_route('/', function(){
    echo 'Hello World';
});
 
/* Add another route as a closure */
$router->add_route('/greetings', function(){
    echo 'Greetings, my fellow men.';
});
 
/* Add a route as a callback function */
$router->add_route('/callback', 'myFunction');
 
 
/* Callback function handler */
function myFunction(){
    echo "This is a callback function named '" .  __FUNCTION__ ."'";
}
 
 
/* Execute the router */
$router->execute();