<?php




class WebControllerCore {

	protected $parameters = array();

	public function __construct() {
		$this->processRequestParameters();
	}

	private function processRequestParameters() {
		if( !empty( $_GET ) ) {
			$this->parameters['get'] = $_GET;
		}
		if( !empty( $_POST ) ) {
			$this->parameters['post'] = $_POST;
		}
	}

	protected function getParam( $id, $type = null ) {
		if( empty( $type ) ) {
			$results = array();
			if( !empty( $this->parameters['get'][$id] ) ) {
				$results[] = array (
					'type' => 'get',
					'value' => $this->parameters['get'][$id]
				);
			}
			if( !empty( $this->parameters['post'][$id] ) ) {
				$results[] = array (
					'type' => 'post',
					'value' => $this->parameters['post'][$id]
				);
			}
			return ( !empty( $results ) ) ? $results : false;
		} else {
			return ( !empty( $this->parameters[$type][$id] ) ) ?
				array (
					'type' => $type,
					'value' => $this->parameters[$type][$id]
				) :
				false;
		}
	}

	protected function setParam( $id, $value, $type ) {
		$this->parameters[$type][$id] = $value;
		return true;
	}

}