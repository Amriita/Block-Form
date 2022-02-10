<?php
/**
 * @file
 * Contains \Drupal\form_block\Form\FormBlockForm
 */
namespace Drupal\block_form\Form;
use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class BlockForm extends FormBase{
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
   return 'block_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['name'] = array(
      '#title'=>'Name',
      '#type'=> 'textfield',
      '#required'=> TRUE,
    );
    $form['rating'] = array(
      '#title'=> 'Rating',
      '#type'=> 'radios',
      '#options'=>array(
        'Bad'=>'Bad',
        'Average'=>'Average',
        'Ok'=>'Ok',
        'Good'=>'Good',
        'Excellent'=>'Excellent'
      ),
      '#required'=> TRUE,
    );
    $form['save'] = array(
      '#type'=> 'submit',
      '#value'=> 'Send Feedback',
      '#button_type'=> 'primary'
    );
      return $form;
  }
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $postData = $form_state->getValues();

    unset($postData['save'],$postData['form_build_id'],$postData['form_token'],$postData['form_id'],$postData['op']);
    $query = \Drupal::database();
    $query->insert('nameandrating')->fields($postData)->execute();
    $this->messenger()->addMessage('feedback Saved');
  }
}
