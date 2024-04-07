<?php 
class SuperController{
	public static function callPage($page) {
		$controllerName =  "Controller" . ucfirst($page);
		include_once("pages/" . $page . "/" . $controllerName . ".php");
		new $controllerName;
	}
}