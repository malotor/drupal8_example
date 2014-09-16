<?php

namespace Drupal\example\Calculator;




class Calculator {

  static function execute(IBinaryOperation $binaryOperation, $arg1, $arg2) {
    return $binaryOperation->execute($arg1, $arg2);
  }

}