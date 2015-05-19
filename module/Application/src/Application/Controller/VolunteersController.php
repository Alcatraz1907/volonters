<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 27.04.2015
 * Time: 16:32
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\AddDonationForm;


class AddDonationController extends AbstractActionController
{
    public function addDonationAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $categories_main  = $em->createQuery("SELECT cm.id,
                                                                       cm.name

                                      FROM Application\Entity\CategoriesMain  cm
                                    ")
            ->getResult();
        $selectData = array();
        foreach ($categories_main as $res) {
            $selectData[$res['id']] = $res['name'];
        }
        $formAddDonation = new AddDonationForm($selectData);

        $request = $this->getRequest();
        if($request->isPost())
        {

            $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $add_donation = new AddDonation();
            $add_donation->exchangeArray($request->getPost());
            $objectManager->persist($add_donation);
            $objectManager->flush();

            $message = 'Institutions succesfully saved!';
            $this->flashMessenger()->addMessage($message);

            $message = 'Error while saving blogpost';
            $this->flashMessenger()->addErrorMessage($message);
        }


        return new ViewModel((array(
            'data' => array("data"=>"test2"),
            'categories_main' => $categories_main,
            'formAddDonation'    => $formAddDonation,

        )));
    }
    public function indexAction(){



                $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

                    $users = $em->createQuery("SELECT im.name

                                      FROM Application\Entity\CategoriesMain im

                                    ")


                        ->getResult();

        return new ViewModel(
            array(
                'users'	=> $users
            )
        );
    }
} 