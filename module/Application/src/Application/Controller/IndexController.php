<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Form\LoginDonorsForm;
use Application\Form\LoginDonorsInputFilter;
use Application\Form\LoginVolunteersForm;
use Application\Form\SearchDonationsForm;
use Application\Form\SearchDonationsInputFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new LoginDonorsForm();
        $formVolunteers = new LoginVolunteersForm();
        $formSearch = new SearchDonationsForm();

        $messages = null;
        $request = $this->getRequest();
        if ($request->isPost()) {
            // TODO fix the filters
            $form->setInputFilter(new LoginDonorsInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $data = $form->getData();
                $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

                $adapter = $authService->getAdapter();
                $adapter->setIdentityValue($data['mail']);
                $adapter->setCredentialValue($data['password']);
                $authResult = $authService->authenticate();

                if ($authResult->isValid()) {
                    $identity = $authResult->getIdentity();
                    $authService->getStorage()->write($identity);

                    foreach ($authResult->getMessages() as $message) {
                        $messages .= "$message\n";
                    }
                    return $this->redirect()->toRoute('site/donor-page');
                }
            }

        }
        return new ViewModel(array(
            'data' => array("data"=>"test2"),
            'formDonors' => $form,
            'formVolunteers' => $formVolunteers,
            'formSearch' => $formSearch,
            'messages' => $messages
        ));
    }

    public function loginAction()
    {
        /*$form = new LoginDonorsForm();
        $messages = null;
        $request = $this->getRequest();

        if ($request->isPost()) {
            // TODO fix the filters
            $form->setInputFilter(new LoginDonorsInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $data = $form->getData();
                $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

                $adapter = $authService->getAdapter();
                $adapter->setIdentityValue($data['mail']);
                $adapter->setCredentialValue($data['password']);
                $authResult = $authService->authenticate();

                if ($authResult->isValid()) {
                    $identity = $authResult->getIdentity();
                    $authService->getStorage()->write($identity);

                    foreach ($authResult->getMessages() as $message) {
                        $messages .= "$message\n";
                    }
                    return $this->redirect()->toRoute('donor-page');
                }
            }
            return new ViewModel(array(
                'error' => 'Your authentication credentials are not valid',
                'form' => $form,
                'messages' => $messages,
            ));
        }*/
    }

    public function authTestAction()
    {
        if ($donors = $this->identity()) { // controller plugin
            // someone is logged !
        } else {
            // not logged in
        }
    }
    public  function searchAction(){
        $u = $_GET['u'];
        $form = new SearchDonationsForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            // TODO fix the filters
      //  die(print_r($request->getPost()));
            //$form->setInputFilter(new SearchDonationsInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $data = $form->getData();
                //die(print_r($data));
                $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                $query = $em->createQuery("SELECT im.name,
                                                  im.tracking_code,
                                                  im.date,
                                                  im.full_description,
                                                  CM.name AS name_cm,
                                                  CS.name AS name_cs
                                                   FROM Application\Entity\IncomesMaterials AS im
                                                    INNER JOIN Application\Entity\CategoriesMain AS CM ON CM.id = im.id
                                                    INNER JOIN Application\Entity\CategoriesSub AS CS ON CS.id = im.id
                                                   WHERE
                                                        im.name
                                                        LIKE ".$data['search'].";");
                $query->setParameter('name',$data['search']);

                $incomes_materials = $query->getResult();

            }
        }
        return new ViewModel(
            array(
                'form' => $form,
                'incomes_materials' => $incomes_materials,
            )
        );
    }

    public function testAction(){
        $form = new SearchDonationsForm();

        $users_array = array();
        $categories_main_array = array();
        $categories_sub_array = array();
        $name = 0;
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = $form->getData();

                $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                $qb = $em->createQueryBuilder();
                // $users = $em->getRepository('Application\Entity\IncomesMaterials')->findAll();
                if($data['name']) {
                    $users = $em->createQuery("SELECT im.name,
                                          im.date,
                                          im.categories_main_id,
                                          im.categories_sub_id,
                                          im.categories_sub_id,
                                          im.donor_id,
                                          im.full_description,
                                          im.image_id
                                      FROM Application\Entity\IncomesMaterials  im
                                      WHERE cm.name = " . $data['name'] . "
                                    ")
                        ->getResult();
                }else{
                    $users = $em->createQuery("SELECT im.name,
                                          im.date,
                                          im.categories_main_id,
                                          im.categories_sub_id,
                                          im.categories_sub_id,
                                          im.donor_id,
                                          im.full_description,
                                          im.tracking_code
                                      FROM Application\Entity\IncomesMaterials  im
                                      WHERE cm.name = " . $data['name'] . "
                                    ")
                        ->getResult();
                }
                $users = $em->createQuery("SELECT cm.name

                                      FROM Application\Entity\CategoriesMain  cm
                                      WHERE cm.id = " . $users[0]['categories_main_id'] . "
                                    ");

                $users = $em->createQuery("SELECT cs.name

                                      FROM Application\Entity\CategoriesSub  cs
                                      WHERE cs.id = " . $users[0]['categories_sub_id'] . "
                                    ");
//        $users = $qb->select('u')
//            ->from('Application\Entity\IncomesMaterials', 'u')
//            ->where('u.id = ?1')
//            ->orderBy('u.name', 'ASC')
//            ->getQuery()
//            ->getResult();
//        echo $qb;
//        $users = $em->createQuery($qb);
                //   $message = $this->params()->fromQuery('message', 'foo');

//        $entityManager        = $this->getEntityManager();
//        $repository           = $entityManager->getRepository('Application\Entity\IncomesMaterials');
//        $categories           = $repository->findBy(array(), array('path' => 'asc'));
            }
        }
        return new ViewModel(array(
        //    'message' => $message,
            'users'	=> $users->getResult(),
//			'myUsers' => $myUsers
        ));
    }

}
