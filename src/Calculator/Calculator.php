<?php

namespace Drupal\example\Calculator;


class Calculator {


	static public function binaryOperation($operation, $arg1, $arg2) {

    $operations['add'] = new AddOperation();
    $operations['subtract'] = new SubtractOperation();
    $operations['multiplication'] = new MultiplicationOperation();
    $operations['division'] = new DivisionOperation();

    $binaryOperation = $operations[$operation];
    return $binaryOperation->execute($arg1, $arg2);

	}

}