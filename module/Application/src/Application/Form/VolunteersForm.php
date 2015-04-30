<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 30.04.2015
 * Time: 17:25
 */
namespace Application\Form;
use Zend\Form\Element;
use Zend\Form\Form;

class VolunteersForm extends Form {
    public function __construct($name = null)
    {
        parent::__construct('');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden',
        ));

        $this->add(array(
            'name' => 'name',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Name',
            ),
        ));

        $this->add(array(
            'name' => 'surname',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Surname',
            ),
        ));

        $this->add(array(
            'name' => 'secondname',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Second name',
            ),
        ));

        $this->add(array(
            'name' => 'image',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Image',
            ),
        ));

        $this->add(array(
            'name' => 'contactname',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Contact name',
            ),
        ));

        $this->add(array(
            'name' => 'phone',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Phone',
            ),
        ));


        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'E-mail',
            ),
        ));

        $this->add(array(
            'name' => 'address',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Address',
            ),
        ));

        $this->add(array(
            'name' => 'full_description',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Full description',
            ),
        ));

        $this->add(array(
            'name' => 'facebook',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Facebook',
            ),
        ));

        $this->add(array(
            'name' => 'vkontakte',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes' => array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Vkontakte',
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