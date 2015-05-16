<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 05.05.2015
 * Time: 17:17
 */
namespace Application\Form;
use Zend\Form\Element;
use Zend\Form\Form;


class LoginVolunteersForm extends  Form {
    public function __construct($name = null)
{
// we want to ignore the name passed
    parent::__construct('login');
    $this->setAttribute('method', 'post');
    $this->setAttribute('class', 'navbar-form navbar-right');
    $this->setAttribute('style','margin-right: 1px;');

    $this->add(array(
        'name' => 'login', // 'usr_name',
        'attributes' => array(
            'type' => 'text',
            'class' => 'form-control',
            'placeholder' => 'Login',
            'required' => 'required',
        ),
        'options' => array(
            'label_attributes'=> array(
                'class' => 'col-lg-7 control-label',
            ),
            'label' => 'Логін',
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
        'options' => array(
            'label_attributes'=> array(
                'class' => 'col-lg-7 control-label',
            ),
            'label' => 'Пароль',
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