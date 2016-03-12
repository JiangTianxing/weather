<?php
	class WeatherData implements Subject {
		private $observers;
		private $temperature;
		private $humidity;
		private $pressure;
		public function registerObserver($observer) { 
			if (!isset($this->observers)) {
				$this->observers = array();
			}
			if (!in_array($observer, $this->observers)) {
				$this->observers[] = $observer;
			}
		}

		public function removeObserver($observer) {
			reset($this->observers);
			while (list($key, $val) = each($this->observers)) {
				if ($observer == $val) {
					unset($this->observers[$key]);
				}
			}
		}

		public function notifyObservers() {
			reset($this->observers);
			while (list($key, $val) = each($this->observers)) {
				$object = strtolower($val[0]).substr($val, 1);
				eval('$val = WeatherStation::$'.$object.';');
				$val->update($this->temperature, $this->humidity, $this->pressure);
			}
		}

		public function measurementsChanged() {
			$this->notifyObservers();
		}

		public function setMeasurements($temperature, $humidity, $pressure) {
			$this->temperature = $temperature;
			$this->humidity = $humidity;
			$this->pressure = $pressure;
			$this->measurementsChanged();
		}
	}
?>