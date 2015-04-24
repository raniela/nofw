<?php
ini_set ( 'display_errors', 1 );
ini_set ( 'error_reporting', 30719 );
ini_set ( 'default_charset', 'UTF-8' );

if (isset ( $_GET ['controller'] )) {
	$classe = $_GET ['controller'];
	
	if (file_exists ( 'controller/' . $classe . 'Controller.php' )) {
		require_once 'controller/' . $classe . 'Controller.php';
		$classe = $_GET ['controller'] . "Controller";
		$controller = new $classe ();
		
		if (is_object ( $controller )) {
			if (isset ( $_GET ['action'] )) {
				$action = $_GET ['action'];
				$controller->$action ();
			}
		}
	} else {
		die ( "Voc� est� acessando uma controller inexistente" );
	}
} else {
	require_once 'controller/IndexController.php';
	$controller = new IndexController ();
	$controller->index ();
}