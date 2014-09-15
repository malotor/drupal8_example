<?php

namespace Drupal\example\Calculator;


class AddOperation implements IBinaryOperation {

  function execute($arg1, $arg2) {
    return $arg1 + $arg2;
  }
}
