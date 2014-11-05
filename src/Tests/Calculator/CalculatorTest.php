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

namespace Drupal\example\Tests\Calculator;

use Drupal\Tests\UnitTestCase;


use Drupal\example\Calculator\Calculator;


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


   public function testCalculator() {

    $this->assertEquals(7, Calculator::binaryOperation('add', 2,5));
    $this->assertEquals(-3, Calculator::binaryOperation('subtract', 2,5));
    $this->assertEquals(10, Calculator::binaryOperation('multiplication', 2,5));
    $this->assertEquals(2.5, Calculator::binaryOperation('division', 5,2));
  }
  
  /**
   * @expectedException \Drupal\example\Calculator\CalculatorException
   */

  public function testDivisionByZero() {

    $result = Calculator::binaryOperation('division', 3,0);
  }
}
