<?php
/**
 * @file
 * Contains \Drupal\example\Form\ExampleForm.
 */
namespace Drupal\example\Form;
use Drupal\Core\Form\FormBase;

use Drupal\example\Calculator\Calculator;
use Drupal\example\Calculator\CalculatorProxy;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Implements an example form.
 */
class ExampleForm extends FormBase {
  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'example_form';
  }
  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, array &$form_state) {
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
  public function validateForm(array &$form, array &$form_state) {

    if (!is_numeric($form_state['values']['second_number'])) {
      $this->setFormError('second_number', $form_state, $this->t('Value must be a number'));
    }
    
    if (!is_numeric($form_state['values']['firts_number'])) {
      $this->setFormError('firts_number', $form_state, $this->t('Value must be a number'));
    }

  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, array &$form_state) {
    
    $x = (double) $form_state['values']['firts_number'];
    $y = (double) $form_state['values']['second_number'];
    $op = $form_state['values']['operation'];

    //Integrate Calculator
    $calculator = new Calculator();
    $calculatorProxy = new CalculatorProxy($calculator);

    try {
      $result = $calculatorProxy->binaryOperation($op, $x, $y);
      drupal_set_message($this->t('The result is @number', array('@number' => $result)));
    } catch (\Exception $e) {
      drupal_set_message($e->getMessage(), 'error');
    }


  }
}
