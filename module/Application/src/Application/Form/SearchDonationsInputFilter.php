<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 05.05.2015
 * Time: 17:18
 */

namespace Application\Form;
use Zend\InputFilter\InputFilter;

class SearchDonationsInputFilter extends InputFilter {
    public function __construct($sm)
    {
        $this->add(array(
            'name' => 'direction', // 'usr_name'
            'required' => true
        ));
        $this->add(array(
            'name' => 'search', // usr_password
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

                    ),
                ),
            ),
        ));
    }

} 