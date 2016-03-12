<?php
	class WeatherStation {
		public static $weatherData;
		public static $currentConditionsDisplay;

		public static function run() {
			self::$weatherData = new WeatherData;
			self::$currentConditionsDisplay = new CurrentConditionsDisplay(self::$weatherData);
			self::$weatherData->setMeasurements(90, 65, 30);
		}
	}
?>
