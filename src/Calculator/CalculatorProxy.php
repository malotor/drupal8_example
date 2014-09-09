<?php


namespace Drupal\example\Calculator;


class CalculatorProxy {

	private $calculator;

	public function __construct($binaryCalculator) {
		$this->calculator = $binaryCalculator;
	}

	public function binaryOperation($operation, $arg1, $arg2) {
		
		return  $this->calculator->{$operation}($arg1, $arg2);

	}
}