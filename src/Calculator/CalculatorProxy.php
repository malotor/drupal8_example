<?php


namespace Drupal\example\Calculator;


class CalculatorDivisionByZero extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'Division by zero';
      parent::__construct($message, $code, $previous);
   }
}

class CalculatorProxy {

	private $calculator;

	public function __construct($binaryCalculator) {
		$this->calculator = $binaryCalculator;
	}
	
	protected function validateArguments($operation, $arg1, $arg2) {
		if ( ($operation == 'division') && ($arg2 == 0) ) {
			throw new CalculatorDivisionByZero();
		}
	}
	
	public function binaryOperation($operation, $arg1, $arg2) {
		
		$this->validateArguments($operation, $arg1, $arg2);

		$result = $this->calculator->{$operation}($arg1, $arg2);

		return $result;
	}
}