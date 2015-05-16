<?php
namespace Application\Controller;

use Application\Entity\CategoriesMain;
use Application\Entity\CategoriesSub;
use Application\Form\AddCategoriesMainForm;
use Application\Form\AddCategoriesMainInputFilter;
use Application\Form\AddCategoriesSubForm;
use Application\Form\AddCategoriesSubInputFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function addCategoriesMainAction(){
        $form = new AddCategoriesMainForm();

        $request = $this->getRequest();
        if($request->isPost())
        {
            $formValidator = new AddCategoriesMainInputFilter();
            {
                $form->setInputFilter($formValidator->getInputFilter());
                $form->setData($request->getPost());
            }

            if($form->isValid() )
            {
                $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                $categories_main = new CategoriesMain();
                $categories_main->exchangeArray($form->getData());
                $objectManager->persist($categories_main);
                $objectManager->flush();

                $message = 'Institutions succesfully saved!';
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
    public function addCategoriesSubAction(){
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
        $form = new AddCategoriesSubForm($selectData);


        $request = $this->getRequest();
        if($request->isPost())
        {

            $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $categories_sub = new CategoriesSub();
            $categories_sub->exchangeArray($request->getPost());
            $objectManager->persist($categories_sub);
            $objectManager->flush();

                $message = 'Institutions succesfully saved!';
                $this->flashMessenger()->addMessage($message);

                $message = 'Error while saving blogpost';
                $this->flashMessenger()->addErrorMessage($message);
        }
        return new ViewModel(array(
            'form' => $form,

        ));

    }

}