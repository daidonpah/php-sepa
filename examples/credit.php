<?php
require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../vendor/autoload.php';

try
{
	$validatorFactory = new \MG\Sepa\Validator\Factory();
	
	$sepa = new \MG\Sepa\CreditTransfer($validatorFactory);
	$sepa->setInitiator('Max Mustermann'); // Einreicher
	//$sepa->setId($msgId); // Nachrichtenreferenz
	
	$payment = new \MG\Sepa\Payment($validatorFactory);
	$payment->setPriority('HIGH'); // Prioritaet NORM oder HIGH
	$payment->setAccount('Max Mustermann', 'DE02370501980001802057', 'COLSDE33'); // Auftraggaber
	//$payment->setAccountCurrency($currency); // Kontowaehrung
	//$payment->disableBatchBooking(); // deaktiviere Sammelbuchung
	//$payment->setDate($date); // Faelligkeitsdatum
	
	$transaction = new \MG\Sepa\Transaction($validatorFactory);
	$transaction->setEndToEndId('R2017742-1')	// Transaktions-ID (End-to-End)
		->setName('Karl Kümmel')				// Name des Zahlungspflichtigen
		->setIban('DE02300209000106531065')		// IBAN des Zahlungspflichtigen
		->setBic('CMCIDEDD')					// BIC des Zahlungspflichtigen
		->setAmount(123.45)						// abzubuchender Betrag
		->setPurpose('SALA')					// (optional) Zahlungstyp
		->setReference('Rechnung R2017742 vom 17.06.2017'); // Verwendungszweck (eine Zeile, max. 140 Zeichen))
	$payment->addTransaction($transaction);
	
	$transaction = new \MG\Sepa\Transaction($validatorFactory);
	$transaction->setEndToEndId('R2017742-1')
		->setName('Doris Dose')
		->setIban('DE02500105170137075030')
		->setAmount(234.56)
		->setPurpose('SALA')
		->setReference('Kinderfahrrad');
	$payment->addTransaction($transaction);
	
	$sepa->addPayment($payment);
	
	header("Content-Type: text/xml");
	header("Content-Disposition: attachment; filename=\"sepa.xml\"");
	header("Pragma: no-cache");
	
	$xml = new \MG\Sepa\Xml($sepa);
	echo $xml->get();
}
catch (\MG\Exception $e)
{
	print_r($e);
	exit;
}
