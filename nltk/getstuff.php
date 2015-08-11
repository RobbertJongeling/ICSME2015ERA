<?php 
	$file = fopen(<<YOUR INPUT FILE HERE>>, "r"); //format id, text

	function httpPost($param) {		
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, "https://japerk-text-processing.p.mashape.com/sentiment/");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'X-Mashape-Key: <<YOUR API KEY HERE>>', 'Accept: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 2);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'language=english&text=' . urlencode($param));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$output = curl_exec($ch);
		
		$http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		curl_close($ch);
		
		if($http_status_code == 200) {		
			return $output;
		} else {
			return "error";
		}
	}
	
	$outputfile  = <<YOUR OUTPUT FILE HERE>>; //format id, label, neg, neu, pos
	$i = 0;
		
	while(! feof($file)) {
		$bug = fgetcsv($file);
		
		$response = httpPost($bug[1]);
		
		if($response == "error") {
			file_put_contents($outputfile, $bug[0] . "," . 
			"error" . "," . 
			"1" . "," . 
			"0" . "," . 
			"1" . "\r\n", FILE_APPEND);
		} else {
			$sentiment = json_decode($response);	
				
			file_put_contents($outputfile, $bug[0] . "," . 
			$sentiment->label . "," . 
			$sentiment->probability->neg . "," . 
			$sentiment->probability->neutral . "," . 
			$sentiment->probability->pos . "\r\n", FILE_APPEND);
		}
	}
	
	fclose($file);
	
	echo "done!";
?>
