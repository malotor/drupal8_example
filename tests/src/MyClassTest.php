<?php

/**
 * @file
 * Contains Drupal\phpunit_example\Tests\AddClassTest
 */

namespace Drupal\example\Tests;

use Drupal\Tests\UnitTestCase;

use Drupal\example\MyPackage\MyClass;
/**
 * @ingroup MyExample
 * @group MyExample
 */
class MyClassTest extends UnitTestCase {

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => 'MyClass Unit Test',
      'description' => 'Show some simple unit tests',
      'group' => 'MyExample',
    );
  }

  public function setUp() {
    parent::setUp();
  }

  public function testMyClass() {
    $sut = new MyClass();
    $this->assertEquals($sut->myMethod() , TRUE);
  }

}
