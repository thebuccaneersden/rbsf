<?php


class RouterControllerCore {

	public function __construct() {}


	public function route( $uri ) {

		$uriParsed = parse_url( $uri );
		$explodedUri = explode( '/', $uriParsed['path'] );

		$result = array(
			'controller' => null,
			'action' => null
		);

		// set the controller
		if( !empty( $explodedUri[1] ) ) {
			$result['controller'] = $explodedUri[1];
		} else {
			$result['controller'] = 'index';
		}

		//set the action
		if( !empty( $explodedUri[2] ) ) {
			$result['action'] = $explodedUri[2];
		} else {
			$result['action'] = 'index';
		}

		return $result;

	}

	public function dispatch( $controllerName, $actionName ) {

		// Todo: Pre-dispatch here

		$controller = new $controllerName;
		$controller->$actionName();

		// Todo: Post-dispatch here
	}

}