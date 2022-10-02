<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	class Date
	{
		public function __construct($date = null)
		{
			if ($date == null) {
				$this->date = strtotime('now');
			} else {
				$this->date = strtotime($date);
			}
		}
		
		public function getDay()
		{
			return date('d', $this->date);
		}
		
		public function getMonth($lang = null)
		{
			return date('m', $this->date);
		}
		
		public function getYear()
		{
			return date('Y', $this->date);
		}
		
		public function getWeekDay($lang = null)
		{
			$answer = date('l', $this->date);

			if ($lang == null) {
				$dateArray = getdate($this->date);

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
			$this->date = strtotime('+' . $value . ' day ', $this->date);//' . $value . ' day');
			return $this;
		}
		
		public function subDay($value)
		{
			$this->date = strtotime('-' . $value . ' day ', $this->date);//' . $value . ' day');
			return $this;
		}
		
		public function addMonth($value)
		{
			$this->date = strtotime('+' . $value . ' month ', $this->date);//' . $value . ' day');
			return $this;
		}
		
		public function subMonth($value)
		{
			$this->date = strtotime('-' . $value . ' month ', $this->date);//' . $value . ' day');
			return $this;
		}
		
		public function addYear($value)
		{
			$this->date = strtotime('+' . $value . ' year ', $this->date);//' . $value . ' day');
			return $this;
		}
		
		public function subYear($value)
		{
			$this->date = strtotime('-' . $value . ' year ', $this->date);//' . $value . ' day');
			return $this;
		}
		
		// Максименко И-03
		public function format($format = null)
		{
			// выведет дату в указанном формате
			// ЕСЛИ НЕ УКАЗАН, ТОГДА
			// формат пусть будет такой же, как в функции date

			if ($format == null) {
				return date('Y-m-d', $this->date);
			} else {
				return date($format, $this->date);
			}
		}
		
		public function __toString()
		{
			return date('Y-m-d', $this->date);
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
	echo (new Date('2025-12-31'))->subDay(3)->addYear(1).'<br>'; // '2026-12-28'
?> 
