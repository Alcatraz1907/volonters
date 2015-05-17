<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 16.05.2015
 * Time: 19:05
 */

namespace Application\Form;


use Zend\Form\Element;
use Zend\Form\Form;

class AddCategoriesMainForm extends Form {
    public function __construct($name = null)
    {
// we want to ignore the name passed
        parent::__construct();
        parent::setAttribute('method', 'post');
        parent::setAttribute('class', 'form-horizontal');

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Назва',
                'required' => 'required',
            ),'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Назва',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Додати',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
} 