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
        'name' => 'mail',
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
           array(
                'name'		=> 'DoctrineModule\Validator\ObjectExists',
                'options' => array(
                    'object_repository' => $sm->get('doctrine.entitymanager.orm_default')->getRepository('Application\Entity\Donors'),
                    'fields'            => 'mail'
                ),

           ),
        ),
    ));
    $this->add(array(
        'name' => 'password',
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
            /*array(
                'name'		=> 'DoctrineModule\Validator\ObjectExists',
                'options' => array(
                    'object_repository' => $sm->get('doctrine.entitymanager.orm_default')->getRepository('Application\Entity\Donors'),
                    'fields'            => 'password'
                ),

            ),*/
        ),
    ));
}
} 