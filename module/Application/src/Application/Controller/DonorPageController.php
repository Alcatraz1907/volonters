<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 27.04.2015
 * Time: 15:30
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DonorPageController extends AbstractActionController{
    public function indexAction(){         //my donations

        return new ViewModel();
    }

    public function createDonationAction() {
        return new ViewModel();
    }

    public function myDataAction() {
        return new ViewModel();
    }
} 