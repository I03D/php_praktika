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

		public function getName() {
			return $this->name;
		}

		public function getText() {
			return $this->attrs['text'];
		}

		public function getAttrs() {
			$answer = '';

			foreach ($this->attrs as $key=>$item) {
				$answer .= "$key $item<br>";
			}

			return $answer;
		}

		public function getAttr($attr) {
			if (isset($this->attrs[$attr])) {
				return $this->attrs[$attr];
			} else {
				return null;
			}
		}
	}

	echo (new Tag('input'))->getName();

	echo '<br>';

	echo (new Tag('input'))->setAttr('text', 'aoa')->getText();

	echo '<br>';
	echo '<br>';

	echo (new Tag('input'))->setAttr('f', 'g')->setAttr('a', 'o')->getAttrs();

	echo '<br>';

	echo (new Tag('input'))->setAttr('f', 'g')->setAttr('a', 'o')->getAttr('a');

?>

