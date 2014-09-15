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

  function execute(IBinaryOperation $binaryOperation, $arg1, $arg2) {
    return $binaryOperation->execute($arg1, $arg2);
  }

}