<?php
/**
 * @file
 * Contains \Drupal\example\Plugin\Block\ExampleBlock.
 */
namespace Drupal\example\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a simple block.
 *
 * @Block(
 *   id = "exampleblock",
 *   admin_label = @Translation("My example block")
 * )
 */

class ExampleBlock extends BlockBase {
  /**
   * Implements \Drupal\block\BlockBase::blockBuild().
   */
  public function build() {

    //Retrieve existing configuration for this block.
    $config = $this->getConfiguration();

    return array(
      '#markup' => 'Hellow ' .$config['example_block_name']. '. This is a block!',
    );
  }

  /*
  public function access(AccountInterface $account) {
    return $account->hasPermission('access content');
  }
  */
  
  public function blockForm($form, FormStateInterface $form_state) {
    //Get basic form block from the parent
    $form = parent::blockForm($form, $form_state);
    //Retrieve existing configuration for this block.
    $config = $this->getConfiguration();
    // Add a form field to the existing block configuration form.
    $form['example_block_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Your name'),
      '#default_value' => isset($config['example_block_name']) ? $config['example_block_name'] : '',
    );
    return $form;
  }
  
  public function blockSubmit($form, FormStateInterface $form_state) {
    // Save our custom settings when the form is submitted.
    $values = $form_state->getValues();
    $this->setConfigurationValue('example_block_name', $values['example_block_name']);
  }

}