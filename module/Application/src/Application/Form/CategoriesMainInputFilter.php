<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 30.04.2015
 * Time: 16:53
 */
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
class CategoriesMinInputFilter implements InputFilterAwareInterface {
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


            $inputFilter->add($factory->createInput(array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            )));


            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

} 