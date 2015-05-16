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

class AddCategoriesSubForm extends Form {
    public function __construct($data = null,$name = null)
    {
        parent::__construct();
        parent::setAttribute('method', 'post');
        parent::setAttribute('class', 'navbar-form navbar-left');
        parent::setAttribute('style','margin-right: 1px;');

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Назва',
                'required' => 'required',
            ),'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-7 control-label',
                ),
                'label' => 'Назва',
            ),
        ));
        $this->add(array(
            'name'    => 'categories_main_id',
            'type'    => 'Zend\Form\Element\Select',
            'options' => array(
                'label'         => 'Dynamic DbAdapter Select',
                'value_options' => $data,
                'empty_option'  => '--- please choose ---'
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Add',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
} 