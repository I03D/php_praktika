<?php
	class Tag
	{
		private $name; // свойство для хранения имени тега
		
		private $attrs;
		
		public function __construct($name, $attrs) {
			$this->name = $name;
			$this->attrs = $attrs;
		}

		public function open() {
			$this->getAttrsStr();
			return '<'.$this->name.$this->getAttrsStr().'>';
		}

		public function close() {
			return "</$this->name>";
		}

		private function getAttrsStr() {
			if (!empty($this->attrs)) {
			
			$result = '';

			foreach ($this->attrs as $name => $value) {
				$result = $result." $name=\"$value\"";
			}

			return $result;

			} else {
				return '';
			}
		}
	}

	$tag = new Tag('input', ['id' => 'test', 'class' => 'eee bbb']);

	echo $tag->open();

	// echo "<input id='test' class='eee bbb'>";

?>

