<?php

namespace Drupal\example\Calculator;


class CalculatorDivisionByZero extends \Exception {
  public function __construct($message = null, $code = 0, Exception $previous = null)
  {
    $message = 'Division by zero';
    parent::__construct($message, $code, $previous);
  }
}


class Calculator {

	function add($arg1, $arg2) {
		return $arg1 + $arg2;
	}

	function subtract($arg1, $arg2) {
		return $arg1 - $arg2;
	}

	function multiplication($arg1, $arg2) {
		return $arg1 * $arg2;
	}

	function division($arg1, $arg2) {
    if ( $arg2 == 0  ) {
			throw new CalculatorDivisionByZero();
		}
		return $arg1 / $arg2;
	}

}