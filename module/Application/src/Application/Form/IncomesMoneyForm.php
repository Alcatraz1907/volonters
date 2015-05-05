<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 30.04.2015
 * Time: 17:06
 */


namespace Application\Form;
use Zend\Form\Element;
use Zend\Form\Form;

class IncomesMoneyForm extends  Form {
    public function __construct($name = null)
    {
        parent::__construct('');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden',
        ));

        $this->add(array(
            'name' => 'date',
            'type' => 'Zend\Form\Element\Date',
            'options' => array(
                'label' => 'Date',
            ),
        ));
        $this->add(array(
            'name' => 'sum',
            'type' => 'Zend\Form\Element\Number',
            'options' => array(
                'label' => 'sum',
            ),
        ));
        $this->add(array(
            'name' => 'donor',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'donor',
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