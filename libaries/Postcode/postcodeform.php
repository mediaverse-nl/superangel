<?php

require_once('postcodedataapi.php');

if (array_key_exists('plaats', $_REQUEST)){
	//succes, hier kunnen de gegevens opgeslagen of gemaild worden
	print "de volgende gegevens zijn (gesimuleerd) opgeslagen:<br><br>";
	foreach ($_POST as $name=>$value){
		print "$name: $value<br>";
	}
}elseif (array_key_exists('postcode', $_REQUEST) && array_key_exists('streetnumber', $_REQUEST)){
	//er is een postcode en huisnummer opgegeven
	if (!($_REQUEST['streetnumber'] > 0 && $_REQUEST['streetnumber'] <= 99999)){
		//ongeldig huisnummer, print het formulier voor postcode/huisnummer opnieuw
		print "helaas is er een ongeldige huisnummer ingevoerd";
		print_postcode_form($_REQUEST['postcode'], $_REQUEST['streetnumber']);
	}elseif (!preg_match("/^[0-9]{4}\s*?[a-z]{2}$/i", $_REQUEST['postcode'])){
		//ongeldige postcode, print het formulier voor postcode/huisnummer opnieuw
		print "helaas is er een ongeldige postcode ingevoerd";
		print_postcode_form($_REQUEST['postcode'], $_REQUEST['streetnumber']);
	}else{
		//haal de adres gegevens bij deze postcode en het huisnummer op

		$address=$_POST; //behoud de eerder opgeslagen postcode en huisnummer

		//haal het adres op:
		$json=get_address($_REQUEST['postcode'], $_REQUEST['streetnumber']);
		if ($json != false && array_key_exists('errormessage', $json) && $json['errormessage'] == 'no results'){
			//no results is de enige errormessage die output voor de gebruiker heeft (namelijk er is een ongeldige postcode/huisnummer combinatie
			print "Volgens onze gegevens bestaat dit adres niet, kunt u het nogmaals controleren?<br>";
			print "postcode: ".$_REQUEST['postcode']."<br>";
			print "huisnummer: ".$_REQUEST['streetnumber']."<br><br>";
			print "<a href=\"javascript:history.back()\">Terug (dit klopt inderdaad niet)</a><br><br>";
			print "<br>of vul handmatig uw overige gegevens in:<br>";
		}elseif(array_key_exists('details', $json) && count($json['details']) > 0){
			//voeg de nieuwe adres gegevens toe aan de postcode/huisnummer:
			$address=array_merge($address, $json['details'][0]);
		}
		//print het formulier met adres gegevens:
		print_address_form($address);
	}
}else{
	print 'Vul eerst svp uw postcode en huisnummer in:<br>';
	print_postcode_form();
}

function print_postcode_form($postcode='', $streetnumber=''){
	?>
	<form action="" method="post">
		Postcode: <input type="text" name="postcode" value="<?=$postcode?>" size="7">
		Nr: <input type="text" name="streetnumber" value="<?=$streetnumber?>" size="5">
		<br>
		<input type="submit" name="Verder">
	</form>
	<?php
}

function print_address_form($address){
	//vertaal de velden van postcodedata.nl in de velden zoals je deze wilt opslaan/mailen:
	$formfields=array('postcode'=>'postcode','streetnumber'=>'huisnummer', 'straat'=>'street', 'plaats'=>'city', 'gemeente'=>'municipality', 'provincie'=>'province', 'rd_x'=>'rd_x', 'rd_y'=> 'rd_y', 'lat'=> 'lat', 'lon'=> 'lon');
	$values=array();
	foreach ($formfields as $key=>$value){
		if (array_key_exists($value, $address)){
			$values[$key]=$address[$value];
		}else{
			$values[$key]='';
		}
	}
	//print het formulier (inclusief de eerder opgeslagen postcode/huisnummer hidden):
	?>
	<form action="#" method="post">
		<input type="hidden" name="postcode" value="<?=$values['postcode']?>">
		<input type="hidden" name="huisnummer" value="<?=$values['huisnummer']?>">
		<table>
			<tr><td>huisnummer:</td><td><input type="text" name="huisnummer" value="<?=$values['streetnumber']?>"></td></tr>
			<tr><td>Straat:</td><td><input type="text" name="straat" value="<?=$values['straat']?>"></td></tr>
			<tr><td>Plaats:</td><td><input type="text" name="plaats" value="<?=$values['plaats']?>"></td></tr>
			<tr><td>Gemeente:</td><td><input type="text" name="gemeente" value="<?=$values['gemeente']?>"></td></tr>
			<tr><td>Provincie:</td><td><input type="text" name="provincie" value="<?=$values['provincie']?>"></td></tr>
			<input type="submit" name="Verder">asdasd</td></tr>
		</table>
	</form>
	<?php
}

?>