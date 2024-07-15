<?php
require __DIR__ . '/../vendor/autoload.php';

try
{
	$validatorFactory = new \UfoZone\Sepa\Validator\Factory();
	$sepa = new \UfoZone\Sepa\CreditTransfer($validatorFactory);
	$payment = new \UfoZone\Sepa\Payment($validatorFactory);
	$transaction = new \UfoZone\Sepa\Transaction($validatorFactory);
}
catch (\UfoZone\Sepa\Payment\Exception $e)
{
	// Payment-Fehler
}
catch (\UfoZone\Sepa\Transaction\Exception $e)
{
	// Transaction-Fehler
}
catch (\UfoZone\Exception $e)
{
	// Sonstiger Fehler
}
