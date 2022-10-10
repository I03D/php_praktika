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

				foreach ($attrs as $name => $value) {
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

		public function addClass($className) {
			if (isset($this->attrs['class'])) {
				$classNames = explode(' ', $this->attrs['class']);
				
				if (!in_array($className, $classNames)) {
					$classNames[] = $className;
					$this->attrs['class'] = implode(' ', $classNames);
				}
			} else {
				$this->attrs['class'] = $className;
			}
			
			return $this;
		}
	}
	// Выведет <input class="eee">:
	echo (new Tag('input'))
		->addClass('eee')
		->open();

	// Выведет <input class="eee bbb">:
	echo (new Tag('input'))
		->addClass('eee')
		->addClass('bbb')
		->open();

	// Выведет <input class="eee bbb kkk">:
	echo (new Tag('input'))
		->setAttr('class', 'eee bbb')
		->addClass('kkk')
		->open();

	// Выведет <input class="eee bbb">:
	echo (new Tag('input'))
		->setAttr('class', 'eee bbb')
		->addClass('eee') // такой класс уже есть и не добавится
		->open();
?>

