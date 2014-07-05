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
  	/*
    return array(
      '#markup' => t('Hello World!'),
    );
    */
		return array(
		  '#type' => 'container',
		  '#attributes' => array('class' => array('test')),
		  'content' => array(
		    '#type' => 'markup',
		    '#markup' => t('This is my test markup'),
		    '#weight' => 0,
		  ),
		  'link' => array(
		    '#type' => 'link',
		    '#title' => t('My link'),
		    '#href' => 'node/1',
		    '#weight' => 1,
		  ),
		);
  }
}