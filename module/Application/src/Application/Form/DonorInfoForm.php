<?php
namespace Application\Form;
use Zend\Form\Element;
use Zend\Form\Form;

class DonorInfoForm extends Form
{
    public function __construct($name = null)
    {
// we want to ignore the name passed
        parent::__construct();
        parent::setAttribute('method', 'post');
        parent::setAttribute('class', 'navbar-form navbar-left');
        parent::setAttribute('style', 'margin-right: 1px;');

        $this->add(array(
            'name' => 'mail',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Mail',
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Password',
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Name',
            ),
        ));
        $this->add(array(
            'name' => 'surname',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Surname',
            ),
        ));
        $this->add(array(
            'name' => 'secondname',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Second name',
            ),
        ));
        $this->add(array(
            'name' => 'phone',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Phone',
            ),
        ));
        $this->add(array(
            'name' => 'skype',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Skype',
            ),
        ));
        $this->add(array(
            'name' => 'facebook',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Facebook',
            ),
        ));
        $this->add(array(
            'name' => 'vkontakte',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Vkontakte',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Зберегти',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}