<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 27.04.2015
 * Time: 15:31
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class VolunteersController extends AbstractActionController{
    public function  indexAction(){
        echo $_GET['id'];
        return new ViewModel();
    }

} 