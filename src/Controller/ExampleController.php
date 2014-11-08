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
  public function content($name) {

    return array(
      '#markup' => t("Hello @name", array('@name' => $name)),
    );
  }

  /**
   * Generates an example page.
   */
  public function secret() {

    return array(
      '#markup' => t("This is a secret place"),
    );
  }
}