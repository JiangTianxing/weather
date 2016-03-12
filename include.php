<?php
	define('PATH', dirname(__FILE__));
	set_include_path('.'.PATH_SEPARATOR.PATH.'/interface'.PATH_SEPARATOR.PATH.'../interface'.PATH_SEPARATOR.get_include_path());
	$path = array('interface'=>array('DisplayElement', 'Observer', 'Subject'), 'class'=>array('CurrentConditionsDisplay','WeatherStation','WeatherData'));
	foreach ($path['interface'] as $row) {
		$include = $row.'.interface.class.php';
		require_once("$include");
	}
	foreach ($path['class'] as $row) {
		$include = $row.'.class.php';
		require_once("$include");
	}
?>