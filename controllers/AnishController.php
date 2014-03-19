<?php


class AnishController extends WebControllerCore {

	public function kittensAction() {

		$kitten = new KittenModel();

		$kittenName = $this->getParam( 'kittenName', 'post' );

		if( !empty( $kittenName ) ) {

			echo "This is how many kittens we have now:<br/>";
			$items = $kitten->getAll();
			var_dump( $items );
			echo "<hr/>";

			echo "Let's add a kitten!<br/>";
			$newKitten = $kitten->add( $kittenName['value'] );
			echo "Added a new kitten, {$newKitten['name']}, with an ID of [{$newKitten['id']}]!<br/>";
			echo "<hr/>";

			echo "Let's look at how many kittens we now have!:<br/>";
			$items = $kitten->getAll();
			var_dump( $items );


		} else {
			
			$kittenId = $this->getParam( 'id', 'get' );
			
			if( !empty( $kittenId ) ) {
				// show one kitten
				echo "You requested to view kitten with ID [ {$kittenId['value']} ]!<br>";
				echo "<hr/>";
				$item = $kitten->get( $kittenId['value'] );
			} else {
				// list all kittens
				echo "You requested to list all kittens!<br>";
				echo "<hr/>";
				$item = $kitten->getAll();
			}

			var_dump( $item );

		}
	}

	public function spacemanAction() {
		echo "I love sublime";
	}

}