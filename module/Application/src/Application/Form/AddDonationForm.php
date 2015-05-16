<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 15.05.2015
 * Time: 2:23
 */

namespace Application\Form;

use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Form;

class AddDonationForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('');

        $this->setAttribute('method', 'post');


        $this->add(array(
            'name' => 'Sum',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => 'Сума',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Сума',
            ),
        ));

        $this->add(array(
            'name' => 'image',
            'type' => 'file',
            'attributes' => array(
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Фото',
            ),
        ));

        $this->add(array(
            'name' => 'Description',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'placeholder' => 'Опис',
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Опис',
            ),


        ));

        $this->add(array(
            'name' => 'Category',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Категорія',
                'value_options' => array(
                    '0' => 'Dropdown',
                    '1' => 'Dropdown',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'Subcategory',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Субкатегорія',
                'value_options' => array(
                    '0' => 'Dropdown',
                    '1' => 'Dropdown',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'Project',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Проект',
                'value_options' => array(
                    '0' => 'Dropdown',
                    '1' => 'Dropdown',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'Number',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'placeholder' => '+380*********',
            ),
            'options' => array(
                'label' => 'Номер телефону',
            ),
        ));

        $this->add(array(
            'name' => 'csrf',
            'type' => 'Zend\Form\Element\Csrf',
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