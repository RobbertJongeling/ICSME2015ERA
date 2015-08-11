<?php 
	$file = fopen("exampleInput.csv", "r");//input already classified by SentiStrength

	$url = "http://access.alchemyapi.com/calls/text/TextGetTextSentiment";
	$key = "<<YOUR KEY>>";
	
	while(! feof($file)) {
		$bug = fgetcsv($file);
		$title = $bug[2];
		//$description = $bug[13];

		$getTitleSentiment = file_get_contents($url . "?apikey=" . $key . "&text=" . urlencode($title));
		$titleResponse = simplexml_load_string($getTitleSentiment);	
		
		/*$getDescriptionSentiment = file_get_contents($url . "?apikey=" . $key . "&text=" . urlencode($description));
		$descResponse = simplexml_load_string($getDescriptionSentiment);	*/
		
		print_r("\"". $bug[0] . "\"," . "\"". $bug[1] . "\"," . 
			"\"". $bug[2] . "\"," . "\"". $bug[3] . "\"," . 
			"\"". $bug[4] . "\"," . "\"". $bug[5] . "\"," . 
			"\"". /*$bug[6] . "\"," . "\"". $bug[7] . "\"," . 
			"\"". $bug[8] . "\"," . "\"". $bug[9] . "\"," . 
			"\"". $bug[10] . "\"," . "\"". $bug[11] . "\"," . 
			"\"". $bug[12] . "\"," . "\"". $bug[13] . "\"," . 
			"\"". $bug[14] . "\"," . "\"". $bug[15] . "\"," . 
			"\"". $bug[16] . "\"," . "\"". $bug[17] . "\"," . 
			"\"". $bug[18] . "\"," . "\"". $bug[19] . "\"," . 
			"\"". $bug[20] . "\"," . "\"". $bug[21] . "\"," . 
			"\"". $bug[22] . "\"," . "\"". $bug[23] . "\"," . 
			"\"". $bug[24] . "\",\"" . 		*/
			$titleResponse->status . "\",\"" . $titleResponse->language . "\",\"" . $titleResponse->docSentiment->score . "\",\"" . $titleResponse->docSentiment->type . "\"" /* . "\",\"" . 
			$descResponse->status . "\",\"" . $descResponse->language . "\",\"" . $descResponse->docSentiment->score . "\",\"" . $descResponse->docSentiment->type . "\""*/
		);
		
		/*print_r("\"". $bug[0] . "\"," . "\"". $bug[1] . "\"," . 
			"\"". $bug[2] . "\"," . "\"". $bug[3] . "\"," . 
			"\"". $bug[4] . "\"," . "\"". $bug[5] . "\"," . 
			"\"". $bug[6] . "\"," . "\"". $bug[7] . "\"," . 
			"\"". $bug[8] . "\"," . "\"". $bug[9] . "\"," . 
			"\"". $bug[10] . "\"," . "\"". $bug[11] . "\"," . 
			"\"". $bug[12] . "\"," . "\"". $bug[13] . "\"," . 
			"\"". $bug[14] . "\"," . "\"". $bug[15] . "\"," . 
			"\"". $bug[16] . "\"," . "\"". $bug[17] . "\"," . 
			"\"". $bug[18] . "\"," . "\"". $bug[19] . "\"," . 
			"\"". $bug[20] . "\"," . "\"". $bug[21] . "\"," . 
			"\"". $bug[22] . "\"," . "\"". $bug[23] . "\"," . 
			"\"". $bug[24] . "\",\"" . 		
			$titleResponse->status . "\",\"" . $titleResponse->language . "\",\"" . $titleResponse->docSentiment->score . "\",\"" . $titleResponse->docSentiment->type . "\",\"" . 
			$descResponse->status . "\",\"" . $descResponse->language . "\",\"" . $descResponse->docSentiment->score . "\",\"" . $descResponse->docSentiment->type . "\""
		);*/
		echo "<br>";
	}
	fclose($file);
?>
