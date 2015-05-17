<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 27.04.2015
 * Time: 16:35
 */

namespace Application\Controller;


use Application\Form\SearchDonationsForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DonationsController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function detailAction(){
        $form = new SearchDonationsForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = $form->getData();

                $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                if($data['name']) {
                    $users = $em->createQuery("SELECT im.name,
                                          im.date,
                                          im.categories_main_id,
                                          im.categories_sub_id,
                                          im.categories_sub_id,
                                          im.donor_id,
                                          im.full_description,
                                          im.image_id,
                                          im.tracking_code
                                      FROM Application\Entity\IncomesMaterials  im
                                      WHERE im.name LIKE :name
                                    ")
                        ->setParameter('name', $data['name'])
                        ->getResult();
                }else{
                    $users = $em->createQuery("SELECT im.name,
                                          im.date,
                                          im.categories_main_id,
                                          im.categories_sub_id,
                                          im.categories_sub_id,
                                          im.donor_id,
                                          im.full_description,
                                          im.image_id,
                                          im.tracking_code
                                      FROM Application\Entity\IncomesMaterials  im
                                      WHERE im.tracking_code LIKE :code
                                    ")
                        ->setParameter('code', $data['tracking_code'])
                        ->getResult();
                }

                $categories_main = $em->createQuery("SELECT cm.name

                                      FROM Application\Entity\CategoriesMain  cm
                                      WHERE cm.id = " . $users[0]['categories_main_id'] . "
                                    ")
                    ->getResult();

                $categories_sub  = $em->createQuery("SELECT cs.name

                                      FROM Application\Entity\CategoriesSub  cs
                                      WHERE cs.id = " . $users[0]['categories_sub_id'] . "
                                    ")
                    ->getResult();

                $donors  = $em->createQuery("SELECT d.mail

                                      FROM Application\Entity\Donors  d
                                      WHERE d.id = " . $users[0]['donor_id'] . "
                                    ")
                    ->getResult();
                $image  = $em->createQuery("SELECT i.path

                                      FROM Application\Entity\Images  i
                                      WHERE i.id = " . $users[0]['image_id'] . "
                                    ")
                    ->getResult();
            }
        }
        return new ViewModel(array(
            'users'	=> $users[0],
            'categories_main' => $categories_main[0],
            'categories_sub' => $categories_sub[0],
            'donors' => $donors[0],
            'image' => $image[0],
        ));
    }


} 