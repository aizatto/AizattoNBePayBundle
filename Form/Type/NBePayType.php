<?php

namespace Aizatto\Bundle\NBePayBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilder;

class NBePayType extends FormType {

  public function buildForm(FormBuilder $builder, array $options = array()) {
    parent::buildForm($builder, $options);

    $builder
      ->add('amount', 'text')
      ->add('orderid', 'text')
      ->add('appcode', 'text')
      ->add('tranID', 'number')
      ->add('domain', 'text')
      ->add('status', 'text')
      ->add('currency', 'text')
      ->add('paydate', 'datetime', array(
        'widget' => 'single_text',
      ))
      ->add('skey', 'text')
      ->add('channel', 'text');
  }

  public function getDefaultOptions(array $options) {
    $defaultOptions = parent::getDefaultOptions($options);
    $dfeaultOptions['csrf_protection'] = false;
    return $defaultOptions;
  }

}
