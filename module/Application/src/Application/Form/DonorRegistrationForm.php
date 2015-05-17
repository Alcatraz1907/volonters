<?php

namespace Application\Form;
use Zend\Form\Element;
use Zend\Form\Form;

class DonorRegistrationForm extends Form {
    public function __construct($name = null)
    {
        parent::__construct();
        parent::setAttribute('method', 'post');
        parent::setAttribute('class', 'navbar-form navbar-left');
        parent::setAttribute('style','margin-right: 1px;');

        $this->add(array(
            'name' => 'mail',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'E-mail',
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Password',
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'confirm_password',
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Confirm password',
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Зареєструватись',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}