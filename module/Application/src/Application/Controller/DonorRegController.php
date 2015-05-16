<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 27.04.2015
 * Time: 15:30
 */

namespace Application\Controller;


use Application\Entity\Donors;
use Application\Form\DonorRegistrationForm;
use Application\Form\DonorRegistrationInputFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class DonorRegController extends AbstractActionController{
    public function  indexAction(){
        $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $donor = new Donors;
        $form = new DonorRegistrationForm();
        $form->get('submit')->setValue('Register');
        $form->bind($donor);
        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setInputFilter(new DonorRegistrationInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());
            if($form->isValid()) {
                $entityManager->persist($donor);
                $entityManager->flush();
                return $this->redirect()->toRoute('site/donor-reg', array('action'=>'success'));
            }
        }
        return new ViewModel(array('form' => $form));
    }

    public function successAction() {
        return new ViewModel();
    }
} 