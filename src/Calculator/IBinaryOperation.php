<?php

namespace Drupal\example\Calculator;

interface IBinaryOperation {

  public function execute($arg1, $arg2);
}