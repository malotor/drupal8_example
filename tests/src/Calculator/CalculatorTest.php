<?php
/*
  #Add test
  2 + 5 = 7
  4 + 4 = 8

  #Subtract test
  5 - 2 = 3
  4 - 2 = 2
  
  #Multiply
  2 * 5 = 10
  
  #Division
  10 / 2 = 5
  3 / 0 = ERROR

  #Negative number accept
  2 - 5 = -3

*/
/**
 * @file
 * Contains Drupal\phpunit_example\Tests\CalculatorTest
 */

namespace Drupal\example\tests;

use Drupal\Tests\UnitTestCase;

use Drupal\example\Calculator\Calculator;
use Drupal\example\Calculator\CalculatorProxy;


/**
 * @ingroup Calculator
 * @group Calculator
 */
class CalculatorTest extends UnitTestCase {

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => 'Aritmethic Calculator Unit Test',
      'description' => 'Aritmethic Calculator  simple unit tests',
      'group' => 'Calculator',
    );
  }

  public function setUp() {
    parent::setUp();
  }

  public function testAdd() {
    $sut = new Calculator();

    $this->assertEquals(7, $sut->add(2,5));

    $this->assertEquals(8, $sut->add(4,4));

  }

  public function testSubstract() {
    $sut = new Calculator();
    
    $this->assertEquals(3, $sut->subtract(5,2));

    $this->assertEquals(2, $sut->subtract(4,2));


  }
  public function testDivision() {
    $sut = new Calculator();

    $this->assertEquals(5, $sut->division(10,2));

  }

  public function testMultiplication() {
    $sut = new Calculator();

    $this->assertEquals(10, $sut->multiplication(2,5));

  }

   public function testProxyOperations() {
    $calculator = new Calculator();
    $calculatorProxy = new CalculatorProxy($calculator);

    $this->assertEquals(7, $calculatorProxy->binaryOperation('add', 2,5));
    $this->assertEquals(-3, $calculatorProxy->binaryOperation('subtract', 2,5));
    $this->assertEquals(10, $calculatorProxy->binaryOperation('multiplication', 2,5));
    $this->assertEquals(2.5, $calculatorProxy->binaryOperation('division', 5,2));
  }
  
  /**
   * @expectedException Drupal\example\Calculator\CalculatorDivisionByZero
   */

  public function testDivisionByZero() {
    $calculator = new Calculator();
    $calculatorProxy = new CalculatorProxy($calculator);
    $result = $calculatorProxy->binaryOperation('division', 3,0);
  }
}
