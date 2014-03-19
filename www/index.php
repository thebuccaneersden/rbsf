<?php

require( 'bootstrap.php' );


try
{

	$router = new RouterControllerCore();
	$route = $router->route( "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}" );

	$controllerName = $route['controller'].'Controller';
	$actionName = $route['action'].'Action';

	$router->dispatch( $controllerName, $actionName );

} catch( Exception $e ) {

 	echo "<b>Error:</b> " . $e->getMessage();

}