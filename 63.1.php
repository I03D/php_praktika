<?php
	class Tag {
		private $name;

		private $attrs = [];

		public function __construct($name)
		{
			$this->name = $name;
		}

		public function setAttr($name, $value = true)
		 {
			$this->attrs[$name] = $value;
			return $this;
		}

		public function open()
		{
			$name = $this->name;
			$attrsStr = $this->getAttrsStr($this->attrs);

			return "<$name$attrsStr>";
		}

		public function close()
		{
			$name = $this->name;
			return "</$name>";
		}

		private function getAttrsStr($attrs)
		{
			if (!empty($attrs)) {
				$result = '';

				foreach ($attrs as $name =>
					$value) {
		 			if ($value === true) {
						$result .= " $name";
					} else {
						$result .= " $name=\"$value\"";
		 			}
				}

				return $result;
			} else {
				return '';
			}
		}
	}

	$tag = new Tag('input');

	echo $tag
		->setAttr('id', 'test')
		->setAttr('disabled', true) // создаем атрибут без значения
		 ->open(); // выведет <input id="test" disabled>
?>

