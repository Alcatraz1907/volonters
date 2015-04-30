<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 30.04.2015
 * Time: 17:25
 */
namespace Application\Form;
use Zend\Form\Element;
use Zend\Form\Form;

class RequestForm extends Form {
    public function __construct($name = null)
    {
        parent::__construct('');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden',
        ));

        $this->add(array(
            'name' => 'phone',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Phone',
            ),
        ));

        $this->add(array(
            'name' => 'full_description',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Full description',
            ),
        ));



        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Add',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }

}