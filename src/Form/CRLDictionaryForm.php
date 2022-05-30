<?php

namespace Drupal\crl_dictionary\Form;

use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;

/**
 * Implements an example form.
 */
class CRLDictionaryForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'crl_dictionary_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['field_word'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter word here'),
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
      '#ajax' => [
        'callback' => '::getDefinitions'
      ]
    ];

    $form['field_definitions'] = [
      '#type' => 'markup',
      '#markup' => '<div class="result_message"></div>'
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getDefinitions(array &$form, FormStateInterface $form_state) {
    $word = $form_state->getValue('field_word');
    $build = [
      '#theme' => 'crl_dictionary_results',
      '#word' => $word
    ];

    $response = new AjaxResponse();
    $response->addCommand(
      new ReplaceCommand(
        '.result_message', $build
      ),
    );

    return $response;
  }


  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
