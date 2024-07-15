<?php
// $Id: Factory.php 7657 2019-04-12 21:26:58Z markus $
declare(strict_types=1);

namespace UfoZone\PhpSepa\Sepa\Validator;

use \UfoZone\PhpSepa\Sepa\Validator;

/**
 * Validator Factory
 * 
 * @author Markus
 * @since      2017-06-16
 */
class Factory
{
	public function getValidator(string $type) : Validator
	{
		/**
		 * @var Validator[]
		 */
		static $validators = [];
		$validatorName = '\\UfoZone\PhpSepa\\Sepa\\Validator\\' . $type;
		if (!class_exists($validatorName))
		{
			throw new \UfoZone\PhpSepa\Exception('Unknown type: ' . $type);
		}
		if (!isSet($validators[$type]))
		{
			$validators[$type] = new $validatorName();
		}
		return $validators[$type];
	}
}