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
    /**
     * @return \Zend\Http\Response|ViewModel
     */
    public function indexAction()
    {
        $form = new LoginDonorsForm();
        $formVolunteers = new LoginVolunteersForm();
        $formSearch= new SearchDonationsForm();


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
            $form->setInputFilter(new SearchDonationsInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $data = $form->getData();
                //die(print_r($data['search']));
                $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                $query = $em->createQuery("SELECT im.name,
                                                  im.tracking_code,
                                                  im.date,
                                                  im.full_description
                                                   FROM Application\Entity\IncomesMaterials AS im
                                                    WHERE
                                                        im.name
                                                        LIKE :name");
                $query->setParameter('name', '%' . $data['search'] . '%');

                //->setParameter('companyID', $companyID);
//                die(print_r($query->getResult()));
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

}
