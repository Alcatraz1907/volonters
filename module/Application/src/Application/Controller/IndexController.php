<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel(array(
            'data' => array("data"=>"test2"),

        ));

    }

    public function donorLoginAction()
    {
        $form = new DonorLoginForm();
        $form->get('submit')->setValue('Login');
        $messages = null;

        $request = $this->getRequest();
        if ($request->isPost()) {
            //- $authFormFilters = new User(); // we use the Entity for the filters
            // TODO fix the filters
            //- $form->setInputFilter($authFormFilters->getInputFilter());
            // Filters have been fixed
            $form->setInputFilter(new DonorLoginFilter($this->getServiceLocator()));
            $form->setData($request->getPost());
            // echo "<h1>I am here1</h1>";
            if ($form->isValid()) {
                $data = $form->getData();
                $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

                $adapter = $authService->getAdapter();
                $adapter->setIdentityValue($data['username']);
                $adapter->setCredentialValue($data['password']);
                $authResult = $authService->authenticate();

                if ($authResult->isValid()) {
                    $identity = $authResult->getIdentity();
                    $authService->getStorage()->write($identity);
                    //$time = 1209600; // 14 days 1209600/3600 = 336 hours => 336/24 = 14 days
					//if ($data['rememberme']) $authService->getStorage()->session->getManager()->rememberMe($time); // no way to get the session
                    //if ($data['rememberme']) {
                    //    $sessionManager = new \Zend\Session\SessionManager();
                    //    $sessionManager->rememberMe($time);
                    //}
                    //- return $this->redirect()->toRoute('home');
                }
                foreach ($authResult->getMessages() as $message) {
                    $messages .= "$message\n";
                }
                /*
                        $identity = $authenticationResult->getIdentity();
                        $authService->getStorage()->write($identity);
                        $authenticationService = $this->serviceLocator()->get('Zend\Authentication\AuthenticationService');
                        $loggedUser = $authenticationService->getIdentity();
                */
            }
        }
        return new ViewModel(array(
            'error' => 'Your authentication credentials are not valid',
            'form'	=> $form,
            'messages' => $messages,
        ));
    }

    public function authTestAction()
    {
        if ($donors = $this->identity()) { // controller plugin
            // someone is logged !
        } else {
            // not logged in
        }
    }
}
