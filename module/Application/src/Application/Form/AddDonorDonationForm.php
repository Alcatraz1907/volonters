<?php
namespace Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class AddDonorDonationForm extends Form {
    public function __construct($data = null,$name = null)
    {
        parent::__construct();
        parent::setAttribute('method', 'post');
        parent::setAttribute('class', 'navbar-form navbar-left');

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Назва',
            ),
        ));
        $this->add(array(
            'name' => 'image',
            'attributes' => array(
                'type' => 'file',
                'class' => 'form-control',
                'placeholder' => 'фото',
            ),
        ));
        $this->add(array(
            'name' => 'full_description',
            'attributes' => array(
                'type' => 'textarea',
                'class' => 'form-control',
                'placeholder' => 'опис',
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
                'value_options' => $data,
                'empty_option'  => 'caregory'
            )
        ));
        $this->add(array(
            'name'    => 'categories_sub_id',
            'type'    => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'value_options' => array(
                    '1' => '..1',
                    '2' => '..2',
                ),
                'empty_option'  => 'subcategory'
            )
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Надіслати',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}