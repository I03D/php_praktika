<?php
	class Tag
	{
		private $name; // свойство для хранения имени тега
		
		private $attrs;
		
		public function __construct($name) {
			$this->name = $name;
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

		public function setAttr($name, $value) {
			$this->attrs[$name] = $value;
			return $this; // возвращаем $this чтобы была цепочка
		}

		public function removeAttr($name) {
			unset($this->attrs[$name]);
			return $this;
		}

		public function setAttrs($attrs) {

		foreach ($attrs as $name => $value) {
			$this->setAttr($name, $value);
		}
		
		return $this;
	}
	
	}

	$tag = new Tag('input');
	
	echo $tag
		->setAttrs(['id' => 'test', 'class' => 'eee'])
		->setAttr('type', 'text')
		->open(); // выведет <input id="test" class="eee" type="text">
?>

