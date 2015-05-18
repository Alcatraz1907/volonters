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
        $formAddDonation =new AddDonationForm();
        return new ViewModel((array(
            'data' => array("data"=>"test2"),

            'formAddDonation' => $formAddDonation,

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