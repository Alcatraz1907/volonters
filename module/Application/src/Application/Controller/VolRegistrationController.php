<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 27.04.2015
 * Time: 16:34
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VolRegistrationController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
} 