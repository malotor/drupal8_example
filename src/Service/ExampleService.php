<?php

/**
 * @file
 * Contains \Drupal\example\Service\ExampleService.
 */
namespace Drupal\example\Service;

class ExampleService {

  protected $text;

  public function __construct() {
    $this->text = 'Hello World';
  }

  public function getText() {
    return $this->text;
  }

}