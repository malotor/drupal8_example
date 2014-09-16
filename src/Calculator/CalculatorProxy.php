<?php

namespace Drupal\example\Calculator;


class CalculatorProxy {

  private $operations;

	public function __construct() {

    $this->operations['add'] = new AddOperation();
    $this->operations['subtract'] = new SubtractOperation();
    $this->operations['multiplication'] = new MultiplicationOperation();
    $this->operations['division'] = new DivisionOperation();
	}

	public function binaryOperation($operation, $arg1, $arg2) {

		return Calculator::execute($this->operations[$operation], $arg1, $arg2);

	}
}