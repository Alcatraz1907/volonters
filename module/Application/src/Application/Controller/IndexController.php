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
use Application\Form\LoginVolunteersForm;
use Application\Form\SearchDonationsForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $formDonors = new LoginDonorsForm();
        $formVolunteers = new LoginVolunteersForm();
        $formSearch= new SearchDonationsForm();
        return new ViewModel(array(
            'data' => array("data"=>"test2"),
            'formDonors' => $formDonors,
            'formVolunteers' => $formVolunteers,
            'formSearch' => $formSearch
        ));

    }


}
