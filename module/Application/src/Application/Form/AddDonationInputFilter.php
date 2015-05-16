<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 15.05.2015
 * Time: 2:24
 */

namespace Application\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class AddDonationInputFilter implements InputFilterAwareInterface
{
    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();


            $inputFilter->add($factory->createInput([
                'name' => 'Sum',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'image',
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'Description',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'Category',
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'InArray',
                        'options' => array(
                            'haystack' => array(0,1),
                        'messages' => array(
            'notInArray' => 'undefined'
        ),
                    ),
                ),

            ),
        ]));

        $inputFilter->add($factory->createInput([
            'name' => 'Subcategory',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array (
                    'name' => 'InArray',
                    'options' => array(
                        'haystack' => array(0,1),
                        'messages' => array(
            'notInArray' => 'undefined'
        ),
                    ),
                ),

            ),
        ]));

        $inputFilter->add($factory->createInput([
            'name' => 'Project',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array (
                    'name' => 'InArray',
                    'options' => array(
                        'haystack' => array(0,1),
                        'messages' => array(
            'notInArray' => 'undefined'
        ),
                    ),
                ),

            ),
        ]));

        $inputFilter->add($factory->createInput([
            'name' => 'Number',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array (
                    'name' => 'digits',
                ),

            ),
        ]));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
} 