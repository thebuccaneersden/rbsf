<?php

function __autoload( $class_name ) {

	$paths = array(
		// Project's controllers
		array(
			'type' => 'controller',
			'location' => 'controllers/'
		),
		// Project's models
		array(
			'type' => 'model',
			'location' => 'models/'
		),
		// Project's views
		array(
			'type' => 'view',
			'location' => 'views/'
		),
		// Core "vendor" classes, such as the web controller and view stuff
		array(
			'type' => 'core',
			'location' => 'core/'
		)
	);

	foreach( $paths as $path )
	{
		if( $path['type'] == matches( $class_name, $path['type'] ) )
		{
			if( file_exists( "../{$path['location']}{$class_name}.php" ) ) {
				require( "../{$path['location']}{$class_name}.php" );
			} else {
				throw new Exception( "Failed to find requested class [{$class_name}] from [{$path['location']}{$class_name}.php]" );
			}
		}
	}

}

function matches( $class_name, $type ) {
	return strtolower( substr( $class_name, strlen( $class_name ) - strlen( $type ), strlen( $class_name ) ) );
}