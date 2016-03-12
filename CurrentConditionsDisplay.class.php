<?php
	class CurrentConditionsDisplay implements Observer,DisplayElement {
		private $temperature;
		private $humidity;
		private $weatherData;

		public function __construct($weatherData) {
			$this->weatherData = $weatherData;
			$this->weatherData->registerObserver('CurrentConditionsDisplay');
		}

		public function update($temperature, $humidity, $pressure) {
			$this->temperature = $temperature;
			$this->humidity = $humidity;
			$this->pressure = $pressure;
			$this->display(); 
		}

		public function display() {
			echo "当前:温度->{$this->temperature},湿度->{$this->humidity}";
		}
	}
?>