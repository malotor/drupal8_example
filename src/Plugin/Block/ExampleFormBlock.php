<?php
/**
 * @file
 * Contains \Drupal\example\Plugin\Block\ExampleFormBlock.
 */
namespace Drupal\example\Plugin\Block;

use Drupal\block\BlockBase;
use Drupal\Core\Session\AccountInterface;
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

    return array(
      '#children' => 'Form!',
    );
  }
}