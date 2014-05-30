<?php
/**
 * @file
 * Contains \Drupal\example\Controller\ExampleController.
 */
namespace Drupal\example\Controller;
/**
 * Example page controller.
 */
class ExampleController {
  /**
   * Generates an example page.
   */
  public function content() {
    return array(
      '#markup' => t('Hello world!'),
    );
  }
}