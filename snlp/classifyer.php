<?php
$dir = new DirectoryIterator("<<YOUR INPUT FOLDER HERE>>"); //input containing of files <id>.txt.xml containing parsed snlp sentences

foreach($dir as $fileinfo) {
	if (!$fileinfo->isDot()) {
		$path = $fileinfo->getPath() . '\\' . $fileinfo->getFilename();
        $file = simplexml_load_file($path); 	
		$sentences = $file->document->sentences->children();

		$vneg=0;
		$neg=0;
		$pos=0;
		$neu=0;
		$vpos=0;

		foreach($sentences as $sentence) {
			$sentiment = $sentence->attributes()->sentimentValue;
			if($sentiment == 0) {
				$vneg++;
			} else if ($sentiment == 1) {
				$neg++;
			} else if ($sentiment == 2) {
				$neu++;
			} else if ($sentiment == 3) {
				$pos++;
			} else {
				$vpos++;
			}
		}

		echo basename($path, ".txt.xml") . "," . $vneg . "," . $neg . "," . $neu . "," . $pos . "," . $vpos . "<br>";
	}
}

	
?>