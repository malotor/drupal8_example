<?php
/*
  #Add test
  2 + 3 = 5
  4 + 4 = 8

  #Subtract test
  5 - 2 = 3
  4 - 2 = 2
  
  #Negative number accept
  2 - 5 = -3

*/
/**
 * @file
 * Contains Drupal\phpunit_example\Tests\CalculatorTest
 */

namespace Drupal\example\Tests;

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

}
