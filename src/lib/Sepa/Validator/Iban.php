<?php
// $Id: Iban.php 7087 2017-07-04 18:46:53Z markus $
declare(strict_types=1);

namespace MG\Sepa\Validator;

/**
 * Validates IBAN (international)
 * 
 * @author Markus
 * @since      2017-06-15
 */
class Iban implements \MG\Sepa\Validator
{
	use Checksum;
	
	public function isValid($subject) : bool
	{
		if (!preg_match("/^[A-Z]{2}[0-9]{2}[a-zA-Z0-9]{1,30}$/", $subject))
		{
			return false;
		}
		// Stelle 5-34, Stelle 1-2 (Laendercode; numerisch konvertiert), Stelle 3-4 (Pruefziffer)
		$checkSum = substr($subject, 4) . strval(ord($subject[0]) - 55) . strval(ord($subject[1]) - 55) . substr($subject, 2, 2);
		
		return ($this->calculateCheckDigit($checkSum) === 97);
	}
}