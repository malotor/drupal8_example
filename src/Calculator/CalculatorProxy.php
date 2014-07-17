<?php


namespace Drupal\example\Calculator;


class DivisionByZero extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'Division by zero';
      parent::__construct($message, $code, $previous);
   }
}

interface ibinaryOperation {
	public function execute($arg1, $arg2);
}


class binaryOperation {
	public function __construct($binaryCalculator) {
		$this->binaryCalculator = $binaryCalculator;
	}

}

class binaryOperationAdd extends binaryOperation implements ibinaryOperation {
		public function execute($arg1, $arg2) {
		return $this->binaryCalculator->add($arg1, $arg2);
	}
}

class binaryOperationSubtract extends binaryOperation implements ibinaryOperation {
	public function execute($arg1, $arg2) {
		return $this->binaryCalculator->subtract($arg1, $arg2);
	}
}
class binaryOperationMultiplication extends binaryOperation implements ibinaryOperation {
	public function execute($arg1, $arg2) {
		return $this->binaryCalculator->multiplication($arg1, $arg2);
	}
}
class binaryOperationDivision extends binaryOperation implements ibinaryOperation {
	public function execute($arg1, $arg2) {
		return $this->binaryCalculator->division($arg1, $arg2);
	}
}

class binaryOperatorFactory {

  public static function GetOperation($operation, $calculator) {
    switch ($operation) {
      case 'add': 
      	return new binaryOperationAdd($calculator); 
      break;
      case 'subtract': 
      	return new binaryOperationSubtract($calculator);
      break;
      case 'multiplication': 
      	return new binaryOperationMultiplication($calculator);
      break;
      case 'division': 
      	return new binaryOperationDivision($calculator);
      break;
    }
  }
}

class CalculatorProxy {

	private $calculator;

	public function __construct($binaryCalculator) {
		$this->calculator = $binaryCalculator;
	}
	/*
	protected function validateArguments($operation, $arg1, $arg2) {
		if ($operation == 'division') && ($arg2 == 0) {
			throw new DivisionByZero();
		}
	}
	*/
	public function binaryOperation($operation, $arg1, $arg2) {
		
		
		$binaryOperation = binaryOperatorFactory::GetOperation($operation, $this->calculator);
		$result = $binaryOperation->execute($arg1,$arg2);
		

		return $result;
	}
}