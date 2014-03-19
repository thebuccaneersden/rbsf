<?php


class KittenModel {

	private $kittens = array();

	public function __construct() {

		$this->kittens = array (
			'snuffles', 'meuw', 'pickles', 'tickles'
		);
	}

	public function get( $id ) {
		if( isset( $this->kittens[$id-1] ) ) {
			return array(
				'id' => $id,
				'name' => $this->kittens[$id-1]
			);
		} else {
			throw new Exception( 'This kitten doesnt exist... yet...' );
		}
	}

	public function add( $kitten ) {
		$this->kittens[] = $kitten;
		return array(
			'id' => sizeof($this->kittens),
			'name' => $kitten
		);
	}

	public function getAll() {
		$response = array();
		foreach( $this->kittens as $id => $kitten ) {
			$response[] = array(
				'id' => $id+1,
				'name' => $kitten
			);
		}
		return $response;
	}


}