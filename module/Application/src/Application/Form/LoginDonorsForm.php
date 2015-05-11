<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 05.05.2015
 * Time: 17:16
 */

namespace Application\Form;
use Zend\Form\Element;
use Zend\Form\Form;


class LoginDonorsForm extends  Form  {
    public function __construct($name = null)
    {
// we want to ignore the name passed
        parent::__construct('login');
        parent::setAttribute('method', 'post');
        parent::setAttribute('class', 'navbar-form navbar-left');
        parent::setAttribute('style','margin-right: 1px;');

        $this->add(array(
            'name' => 'login', // 'usr_name',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Login',
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'password', // 'usr_password',
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Password',
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Sign In',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}