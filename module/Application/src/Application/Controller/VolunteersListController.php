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

class VolunteersListController extends AbstractActionController{
    public function  indexAction(){
        return new ViewModel();
    }
} 