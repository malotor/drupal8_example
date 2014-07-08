<?php
/*

  2 + 3 = 5
  4 + 4 = 8


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

    $this->assertEquals($sut->add(2,5) , 7);

    $this->assertEquals($sut->add(4,4) , 8);

  }

}
