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
            'name' => 'SearchOfNumber', // 'usr_password',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'SearchOfNumber',

            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-7 control-label',
                ),
                'label' => 'За телефоном',
            ),
        ));

        $this->add(array(
            'name' => 'SearchOfCod', // 'usr_password',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'SearchOfCod',

            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-7 control-label',
                ),
                'label' => 'За трек кодом',
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