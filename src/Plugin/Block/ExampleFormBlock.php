<?php
/**
 * @file
 * Contains \Drupal\example\Plugin\Block\ExampleFormBlock.
 */
namespace Drupal\example\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a simple block.
 *
 * @Block(
 *   id = "exampleformblock",
 *   admin_label = @Translation("My example form block")
 * )
 */
class ExampleFormBlock extends BlockBase {
  /**
   * Implements \Drupal\block\BlockBase::blockBuild().
   */
  public function build() {

    $form = \Drupal::formBuilder()->getForm('Drupal\example\Form\ExampleForm');

    $form_markup = \Drupal::service('renderer')->render($form);

    return array(

        '#markup' => $form_markup,

    );

  }
}