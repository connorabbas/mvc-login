<?php
class Route{

	private $_listUri = array();
	private $_listCall = array();
	private $_trim = '/\^$';
	

	public function add($uri, $function){
		$uri = trim($uri, $this->_trim);
		$this->_listUri[] = $uri;
		$this->_listCall[] = $function;
	}

	public function listen(){

		$uri = isset($_REQUEST['uri']) ? $_REQUEST['uri'] : '/';
		$uri = trim($uri, $this->_trim);

		$replacementValues = array();

		foreach ($this->_listUri as $listKey => $listUri){
			if (preg_match("#^$listUri$#", $uri)){

				$realUri = explode('/', $uri);
				$fakeUri = explode('/', $listUri);

				foreach ($fakeUri as $key => $value){
					if ($value == '.+'){
						$replacementValues[] = $realUri[$key];
					}
				}

				call_user_func_array($this->_listCall[$listKey], $replacementValues);
			} 
		}
	}
}
