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
        parent::setAttribute('class', 'form-horizontal');

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Назва підкатегорії',
                'required' => 'required',
            ),'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Назва підкатегорії',
            ),
        ));
        $this->add(array(
            'name' => 'institution_id',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Institution',
                'value_options' => array(
                    '1' => 'School',
                    '2' => 'University',
                ),
            ),
        ));
        $this->add(array(
            'name'    => 'categories_main_id',
            'type'    => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label'         => 'Категорія',
                'value_options' => $data,
                'empty_option'  => '--- please choose ---'
            )
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