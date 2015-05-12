<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 05.05.2015
 * Time: 17:16
 */

namespace Application\Form;
use Zend\InputFilter\InputFilter;


class LoginDonorsInputFilter extends InputFilter{
    public function __construct($sm)
{
    $this->add(array(
        'name' => 'mail', // 'usr_name'
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