<?php

	function get_address($postcode, $streetnumber){
		//geen kleine letters en spaties in postcodes:
		$postcode=strtoupper(preg_replace("/\s+/", '', $postcode));
		//ref=host, zorgt ervoor dat er bijna geen request limieten zijn:
		$host=$_SERVER['HTTP_HOST'];
		//userip=ip adres, zorgt ervoor dat er bijna geen request limieten zijn:
		if (array_key_exists('REMOTE_ADDR', $_SERVER)){
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		//localhost test:
		if (!preg_match("/^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+$/", $ip)){
			print '<!--warning: geen ip adres, request limiet beperkt-->';
			$ip='';
		}
		$url="http://www.postcodedata.nl/v1/postcode/?postcode=$postcode&streetnumber=$streetnumber&ref=$host";
		if ($ip != ''){
			$url.="&userip=$ip";
		}

		//haal deze data op met curl:
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$result = curl_exec($ch);
		curl_close($ch);

		//print $result;
		//decodeer de data met json_decode tot een array
		$json = json_decode($result, true);

		//debug doeleinden, kijk in de broncode als de api geen adres toont
		if (!is_array($json) || !count($json) > 0){
			print "<!--\n";
			print "wrong url request or response for: $url\n";
			print "-->\n";
		}elseif(array_key_exists('errormessage', $json)){
			print "<!--\nerror response:\n";
			print_r($json);
			print "-->\n";
		}

		return $json;
	}

?>