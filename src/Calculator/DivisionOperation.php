<?php

namespace Drupal\example\Calculator;


class DivisionOperation implements IBinaryOperation {

  function execute($arg1, $arg2) {

    if ( $arg2 == 0  ) {
      throw new CalculatorException('Division by zero');
    }

    return $arg1 / $arg2;
  }
}
