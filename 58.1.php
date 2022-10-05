<?php
	interface iFile
	{
		public function __construct($filePath);
		
		public function getPath(); // путь к файлу
		public function getDir();  // папка файла
		public function getName(); // имя файла
		public function getExt();  // расширение файла
		public function getSize(); // размер файла
		
		public function getText();          // получает текст файла
		public function setText($text);     // устанавливает текст файла
		public function appendText($text);  // добавляет текст в конец файла
		
		public function copy($copyPath);    // копирует файл
		public function delete();           // удаляет файл
		public function rename($newName);   // переименовывает файл
		public function replace($newPath);  // перемещает файл
	}

	class File implements iFile {
		public function __construct($filePath = '') {
			if ($filePath != '') {
				$this->path = "./$filePath";
				
				if (!file_exists(dirname($this->path))) {
					mkdir(dirname($this->path), 0777, true);
				}

				if (!file_exists($filePath)) {
					file_put_contents($filePath, '');
				}
			}
		}

		public function getPath() {
			return $this->path;
		}

		public function getDir() {
			return dirname($this->path);
		}

		public function getName() {
			return basename($this->path);
		}

		public function getExt() {
			return pathinfo($this->path, PATHINFO_EXTENSION);
		}

		public function getSize() {
			return filesize($this->path);
		}

		public function getText() {
			return file_get_contents($this->path);
		}

		public function setText($text) {
			// unlink($this->path);
			/*return*/file_put_contents($this->path, $text);
		}

		public function appendText($text) {
			file_put_contents($this->path, $text, FILE_APPEND);
		}
		//Максименко И-03
		public function copy($copyPath) {
			copy($this->path, $copyPath);
		}

		public function delete() {
			unlink($this->path);
		}

		public function rename($newName) {
			// Аргумент - не путь!!!

			rename($this->path, dirname($this->path)."newName");
		}
		
		public function replace($newPath) {
			rename($this->path, $newPath);
			$this->path = $newPath;
		}
	}

	$php = new File('dir/oneMoreDir/phpText.txt');
	echo $php->getPath().'<br>';
	echo $php->getDir().'<br>';
	echo $php->getExt().'<br>';
        echo $php->getText().'<br>';
	$php->setText('test1');   
        echo $php->getText().'<br>';
	// $php->replace('phpReplaced.txt');


        echo $php->getName().'<br>';
        echo $php->getExt().'<br>';
        // echo $php->setText('test').'<br>';   
        echo $php->getSize().'<br>';

        $php->appendText('Appended').'<br>';
	echo $php->getText().'<br>';

        $php->copy('copied.txt.').'<br>';  
        // $php->delete().'<br>';         
        // echo $php->rename('renamed').'<br>'; 
?>
