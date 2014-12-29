<?php
/**
 * @file
 * Contains \Drupal\example\Form\ExampleForm.
 */
namespace Drupal\example\Form;

use Drupal\Core\Form\FormBase;

use Drupal\example\Calculator\Calculator;


use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements an example form.
 */
class ExampleForm extends FormBase implements FormInterface {
  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'example_form';
  }
  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['firts_number'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => $this->t('Firts number'),
    );
    $form['second_number'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => $this->t('Firts number'),
    );
    $form['operation'] = array(
      '#type' => 'select',
      '#title' => $this->t('Operation'),
      '#options' => array(
         'add'=>'+',
         'subtract'=>'-',
         'multiplication'=>'*',
         'division'=>'/',
       ),
       '#default_value' => '+',
       '#description' => t('Select the operation'),
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    $values = $form_state->getValues();

    if (!is_numeric($values['second_number'])) {
      $form_state->setErrorByName('second_number',  $this->t('Value must be a number'));
    }
    
    if (!is_numeric($values['firts_number'])) {
      $form_state->setErrorByName('firts_number', $this->t('Value must be a number'));
    }

  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $values = $form_state->getValues();

    $x = (double) $values['firts_number'];
    $y = (double) $values['second_number'];
    $op = $values['operation'];


    try {

      $result = Calculator::binaryOperation($op, $x, $y);
      drupal_set_message($this->t('The result is @number', array('@number' => $result)));

    } catch (\Exception $e) {

      drupal_set_message($e->getMessage(), 'error');
    }


  }
}
