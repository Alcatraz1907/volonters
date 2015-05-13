<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 05.05.2015
 * Time: 17:18
 */

namespace Application\Form;
use Zend\Form\Element;
use Zend\Form\Form;

class SearchDonationsForm extends Form {
    public function __construct($name = null)
    {
// we want to ignore the name passed
        parent::__construct('login');
        parent::setAttribute('method', 'post');
        parent::setAttribute('class', 'navbar-form navbar-left');
        parent::setAttribute('style','margin-right: 1px;');


        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'direction',
            'options' => array(
                'label' => 'Пошук за',
                'value_options' => array(
                    'number' => 'Номером',

                    'name' => 'Ім’ям',
                ),
            ),
            'attributes' => array(
                'value' => 'number' //set checked to '1'
            )
        ));

        $this->add(array(
            'name' => 'search', // 'usr_password',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Search',
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