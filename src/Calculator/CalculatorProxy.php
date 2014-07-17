<?php


namespace Drupal\example\Calculator;


class DivisionByZero extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'Division by zero';
      parent::__construct($message, $code, $previous);
   }
}


class CalculatorProxy {

	private $calculator;

	public function __construct($calculator) {
		$this->calculator = $calculator;
	}
	/*
	protected function validateArguments($operation, $arg1, $arg2) {
		if ($operation == 'division') && ($arg2 == 0) {
			throw new DivisionByZero();
		}
	}
	*/
	public function binaryOperation($operation, $arg1, $arg2) {
		
		//$this->validateArguments($operation, $arg1, $arg2);
		switch ($operation) {
			case 'add':
				$result = $this->calculator->add($arg1, $arg2);
				break;
			case 'subtract':
				$result = $this->calculator->subtract($arg1, $arg2);
				break;
			case 'multiplication':
				$result = $this->calculator->multiplication($arg1, $arg2);
				break;
			case 'division':
				$result = $this->calculator->division($arg1, $arg2);
				break;

		}
		return $result;
	}
}