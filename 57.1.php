<?php
	require_once '56.1.php';

	echo '___<br>';

	class Interval
	{
		public string $days = '';
		public string $months = '';
		public string $years = '';

		public function __construct(Date $date1 = null, Date $date2 = null)
		{
			$this->date1 = new DateTime($date1);
			$this->date2 = new DateTime($date2);
		}
		
		public function toDays()
		{
			$this->days = $this->date1->diff($this->date2)->format('%d');
			return $this->days;
		}
		
		public function toMonths()
		{
			$this->months = $this->date1->diff($this->date2)->format('%m');
			return $this->months;
		}
		
		public function toYears()
		{
			$this->years = $this->date1->diff($this->date2)->format('%y');
			return $this->years;
		}
		
		public function __toString()
		{
			if ($this->years == '') {
				$this->years = '';
			} else {
				$prm = (int)$this->years + 1;
				$this->years = (string)$prm;
			}

			return implode(' ', ['years' => $this->years, 'months' => $this->months, 'days' => $this->days]);

			// return $this->diff->format('%d');
			// выведет результат в виде массива
			// ['years' => '', 'months' => '', 'days' => '']
		}
	}

	$date1 = new Date('2024-12-31');
	$date2 = new Date('2027-11-28');

	$interval = new Interval($date1, $date2);

	echo $interval->toDays().'<br>';   // выведет разницу в днях
	echo $interval->toMonths().'<br>'; // выведет разницу в месяцах
	echo $interval->toYears().'<br>';  // выведет разницу в годах

	echo '<br>';

 	var_dump($interval); // массив вида ['years' => '', 'months' => '', 'days' => '']

?>

