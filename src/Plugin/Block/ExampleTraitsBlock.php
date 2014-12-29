<?php
/**
 * @file
 * Contains \Drupal\example\Plugin\Block\ExampleTraitsBlock.
 */

namespace Drupal\example\Plugin\Block;

use Drupal\Core\Block\BlockBase;

use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Routing\UrlGeneratorTrait;
use Drupal\Core\StringTranslation\StringTranslationTrait;


use Drupal\Core\Url;

/**
 * Provides a Example Traits Block.
 *
 * @Block(
 *   id = "exampletraitsblock",
 *   subject = @Translation("Example Traits block"),
 *   admin_label = @Translation("Example Traits block")
 * )
 */

class ExampleTraitsBlock extends BlockBase {

  use LinkGeneratorTrait;
  use UrlGeneratorTrait;

  public function build() {

    $items = array(
      $this->l($this->t('Form Example') , Url::fromRoute('example.form')),
      $this->l($this->t('User info') , Url::fromRoute('example.user_info')),
      $this->l($this->t('Demo Custom Service') , Url::fromRoute('example.demo_service')),
      $this->l($this->t('Secret page') , Url::fromRoute('example.secret')),
    );

    return array(
      'menu_links' => array(
        '#theme' => 'item_list',
        '#items' => $items,
      ),
    );

  }

}