<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 27.04.2015
 * Time: 15:30
 */

namespace Application\Controller;


use Application\Entity\Donors;
use Application\Entity\Images;
use Application\Entity\IncomesMaterials;
use Application\Form\AddDonorDonationForm;
use Application\Form\AddDonorDonationInputFilter;
use Application\Form\DonorInfoForm;
use Application\Form\DonorInfoInputFilter;
use Doctrine\ORM\EntityManager;
use DoctrineORMModuleTest\Assets\Entity\Date;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DonorPageController extends AbstractActionController{
    public function indexAction(){         //my donations
        $donor = new Donors();
        $donor = $this->identity();
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $incomes = $em->createQuery("SELECT im.id,
                                            im.name,
                                            im.date,
                                            im.visible
                                      FROM Application\Entity\IncomesMaterials  im
                                      WHERE im.donor_id = '".$donor->getId()."'")
                ->getResult();
        return new ViewModel(array(
            'incomes' => $incomes
        ));
    }

    public function createDonationAction() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $categories_main  = $em->createQuery("SELECT  cm.id,
                                                      cm.name
                                              FROM Application\Entity\CategoriesMain cm
                                    ")
            ->getResult();
        $selectData = array();
        foreach ($categories_main as $res) {
            $selectData[$res['id']] = $res['name'];
        }
        $form = new AddDonorDonationForm($selectData);
        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setInputFilter(new AddDonorDonationInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());
            if($form->isValid()) {
                $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                $data = $form->getData();
                $donor = new Donors();
                $donor = $this->identity();
                $image = new Images();
                $data_images = array('path'=>$data['image']);
                $image->exchangeArray($data_images);
                $objectManager->persist($image);
                $objectManager->flush();



                $image = $em->createQuery("SELECT  COUNT(i)
                                              FROM Application\Entity\Images i
                                    ")
                    ->getResult();
                $data['image_id'] = $image[0][1] + 1;
                $data['date'] = date('Y-m-d');
                $data['tracking_code'] = '55646';
                $data['donor_id'] = $donor->getId();
                $incomes_materials = new IncomesMaterials();
                $incomes_materials->exchangeArray($data);
                $objectManager->persist($incomes_materials);
                $objectManager->flush();

                $message = 'Donation succesfully saved!';
                $this->flashMessenger()->addMessage($message);
            }else{
                $message = 'Error while saving blogpost';
                $this->flashMessenger()->addErrorMessage($message);
            }
        }
        return new ViewModel(array(
            'form' => $form,
        ));
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

    public function hideDonationAction() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $id = $this->getEvent()->getRouteMatch()->getParam('id');
            $query = $em->createQuery("UPDATE Application\Entity\IncomesMaterials im
                                            SET im.visible = 0
                                            WHERE im.id = '" . $id . "'")
                ->getResult();
        return new ViewModel();
    }
} 