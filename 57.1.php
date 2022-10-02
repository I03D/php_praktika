<?php
	include '56.1.php';

	echo '___<br>';

	class Interval
	{
		public function __construct(Date $date1, Date $date2)
		{
			$this->date1 = new DateTime($date1);
			$this->date2 = new DateTime($date2);
		}
		
		public function toDays()
		{
			$diff = $this->date1->diff($this->date2);
			return $diff;
		}
		
		public function toMonths()
		{
			$diff = $this->date1->diff($this->date2);
			return $diff;
		}
		
		public function toYears()
		{
			$diff = $this->date1->diff($this->date2);
			return $diff;
		}
		
		public function __toString()
		{
			return $this->days;
			// return (string) ['years' => $this->toYears, 'months' => $this->toMonths, 'days' => $this->toDays];
			// выведет результат в виде массива
			// ['years' => '', 'months' => '', 'days' => '']
		}
	}

	$date1 = new Date('2025-12-31');
	$date2 = new Date('2026-11-28');

	$interval = new Interval($date1, $date2);

	echo $interval->toDays().'<br>';   // выведет разницу в днях
	echo $interval->toMonths().'<br>'; // выведет разницу в месяцах
	echo $interval->toYears().'<br>';  // выведет разницу в годах

 	var_dump($interval); // массив вида ['years' => '', 'months' => '', 'days' => '']

?>

