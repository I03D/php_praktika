<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	class Date
	{
		public function __construct($date = null)
		{
			if ($date == null) {
				$this->date = date('Y-m-d');
			} else {
				$this->date = $date;
			}
		}
		
		public function getDay()
		{
			return substr($this->date, 8, 2);
		}
		
		public function getMonth($lang = null)
		{
			return substr($this->date, 5, 2);
		}
		
		public function getYear()
		{
			return substr($this->date, 0, 4);
		}
		
		public function getWeekDay($lang = null)
		{
			$answer = date('l', strtotime($this->date));

			if ($lang == null) {
				$dateArray = getdate(strtotime($this->date));

				$answer = "$dateArray[wday]";
				
				// Максименко И-03
				if ($answer == '0') {
					$answer = '7';
				}

				return $answer ;
			} elseif ($lang == 'en') {
				return $answer;
			} else {
				switch ($answer) {
				case 'Monday':
					return 'Понедельник';
					break;
				case 'Tuesday':
					return 'Вторник';
					break;
				case 'Wednesday':
					return 'Среда';
					break;
				case 'Thursday':
					return 'Четверг';
					break;
				case 'Friday':
					return 'Пятница';
					break;
				case 'Saturday':
					return 'Суббота';
					break;
				case 'Sunday':
					return 'Воскресенье';
					break;
				}
			}
		}
		
		public function addDay($value)
		{
			$this->date = date('Y-m-d', strtotime($this->date. " + " . $value . " day"));
			return $this->date;
		}
		
		public function subDay($value)
		{
			$this->date = date('Y-m-d', strtotime($this->date. " - " . $value . " day"));
			return $this->date;
		}
		
		public function addMonth($value)
		{
			$this->date = date('Y-m-d', strtotime($this->date. " + " . $value . " month"));
			return $this->date;
		}
		
		public function subMonth($value)
		{
			$this->date = date('Y-m-d', strtotime($this->date. " - " . $value . " month"));
			return $this->date;
		}
		
		public function addYear($value)
		{
			$this->date = date('Y-m-d', strtotime($this->date. " + " . $value . " year"));
			return $this->date;
		}
		
		public function subYear($value)
		{
			$this->date = date('Y-m-d', strtotime($this->date. " - " . $value . " year"));
			return $this->date;
		}
		
		// Максименко И-03
		public function format($format)
		{
			// выведет дату в указанном формате
			// формат пусть будет такой же, как в функции date
		}
		
		public function __toString()
		{
			// выведет дату в формате 'год-месяц-день'
		}
	}

	$date = new Date('2025-12-31');
	
	echo $date->getYear().'<br>';  // выведет '2025'
	echo $date->getMonth().'<br>'; // выведет '12'
	echo $date->getDay().'<br>';   // выведет '31'

	echo '<br>';

	echo $date->getWeekDay().'<br>';     // выведет '3'
	echo $date->getWeekDay('ru').'<br>'; // выведет 'среда'
	echo $date->getWeekDay('en').'<br>'; // выведет 'wednesday'

	echo '<br>';

	echo (new Date('2025-12-31'))->addYear(1).'<br>'; // '2026-12-31'
	echo (new Date('2025-12-31'))->addDay(1).'<br>';  // '2026-01-01'
?> 
