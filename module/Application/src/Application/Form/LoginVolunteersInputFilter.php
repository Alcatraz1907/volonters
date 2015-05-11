<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 05.05.2015
 * Time: 17:17
 */
namespace Application\Form;
use Zend\InputFilter\InputFilter;
class VolunteersInputFilter extends InputFilter{
    public function __construct($sm)
    {
        $this->add(array(
            'name' => 'login', // 'usr_name'
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ),
                ),
            ),
        ));
        $this->add(array(
            'name' => 'password', // usr_password
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 34,
                    ),
                ),
            ),
        ));
    }
}