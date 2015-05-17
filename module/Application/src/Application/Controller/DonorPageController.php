<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 27.04.2015
 * Time: 15:30
 */

namespace Application\Controller;


use Application\Entity\Donors;
use Application\Form\DonorInfoForm;
use Application\Form\DonorInfoInputFilter;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DonorPageController extends AbstractActionController{
    public function indexAction(){         //my donations

        return new ViewModel();
    }

    public function createDonationAction() {
        return new ViewModel();
    }

    public function myDataAction() {
        $donor = new Donors();
        $form = new DonorInfoForm();
        $donor = $this->identity();
        $form->setData($donor->getArrayCopy());
        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setInputFilter(new DonorInfoInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());
            if($form->isValid()) {
                $data = $form->getData();
                $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                $query = $em->createQuery("UPDATE Application\Entity\Donors d
                                            SET d.mail = '".$data['mail']."',
                                                d.password = '".$data['password']."',
                                                d.name = '".$data['name']."',
                                                d.surname = '".$data['surname']."',
                                                d.secondname = '".$data['secondname']."',
                                                d.phone = '".$data['phone']."',
                                                d.skype = '".$data['skype']."',
                                                d.facebook = '".$data['facebook']."',
                                                d.vkontakte = '".$data['vkontakte']."'
                                            WHERE d.id ='".$donor->getId()."'");
                $donors = $query->getResult();
                $message = 'Дані збережено успішно';
            }
        }
        return new ViewModel(array(
            'form' => $form,
            'message' => $message));
    }
} 