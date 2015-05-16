<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\IncomesMaterials;
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


}
