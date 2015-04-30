<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities'
                )
            )
        )
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'project' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/project[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\project',
                        'action'     => 'index',
                    ),
                ),
            ),


            'admin-log' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin-log[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\adminlog',
                        'action'     => 'index',
                    ),
                ),
            ),
            'pay-form' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/pay-form[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\payform',
                        'action'     => 'index',
                    ),
                ),
            ),
            'admin' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\admin',
                        'action'     => 'index',
                    ),
                ),
            ),

            'add-report' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/add-report[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\addreport',
                        'action'     => 'index',
                    ),
                ),
            ),
            'manage-funds' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/manage-funds[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\managefunds',
                        'action'     => 'index',
                    ),
                ),
            ),
            'vol-login' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/vol-login[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\vollogin',
                        'action'     => 'index',
                    ),
                ),
            ),
            'add-donation' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/add-donation[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\adddonation',
                        'action'     => 'index',
                    ),
                ),
            ),
            'translation' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/translation[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\translation',
                        'action'     => 'index',
                    ),
                ),
            ),
            'vol-registration' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/vol-registration[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\volregistration',
                        'action'     => 'index',
                    ),
                ),
            ),
            'donations' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/donations[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\donations',
                        'action'     => 'index',
                    ),
                ),
            ),

            'volunteers' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/volunteers[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\volunteers',
                        'action'     => 'index',
                    ),
                ),
            ),
            'about' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/about[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\about',
                        'action'     => 'index',
                    ),
                ),
            ),
            'vacancy' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/vacancy[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\vacancy',
                        'action'     => 'index',
                    ),
                ),
            ),
            'partners' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/partners[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\partners',
                        'action'     => 'index',
                    ),
                ),
            ),
            'group-reg' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/group-reg[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\group-reg',
                        'action'     => 'index',
                    ),
                ),
            ),
            'group-reg-action' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/group-reg-action[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\group-reg-action',
                        'action'     => 'index',
                    ),
                ),
            ),
            'volunteers-list' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/volunteers-list[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\volunteers-list',
                        'action'     => 'index',
                    ),
                ),
            ),
            'donor-page' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/donor-page[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\donor-page',
                        'action'     => 'index',
                    ),
                ),
            ),
            'donor-reg' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/donor-reg[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\donor-reg',
                        'action'     => 'index',
                    ),
                ),
            ),
            'donor-login' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/donor-login[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\donor-login',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Project' => 'Application\Controller\ProjectController',
            'Application\Controller\Volunteers' => 'Application\Controller\VolunteersController',

             'Application\Controller\AddProject' => 'Application\Controller\AddProjectController',
             'Application\Controller\AddReport' => 'Application\Controller\AddReportController',
             'Application\Controller\Translation' => 'Application\Controller\TranslationController',
             'Application\Controller\VolLogin' => 'Application\Controller\VolLoginController',
             'Application\Controller\AddDonation' => 'Application\Controller\AddDonationController',
             'Application\Controller\Donations' => 'Application\Controller\DonationsController',
             'Application\Controller\ManageFunds' => 'Application\Controller\ManageFundsController',
             'Application\Controller\VolRegistration' => 'Application\Controller\VolRegistrationController',


            'Application\Controller\Admin' => 'Application\Controller\AdminController',
            'Application\Controller\AdminLog' => 'Application\Controller\AdminLogController',
            'Application\Controller\PayForm' => 'Application\Controller\PayFormController',
            'Application\Controller\About' => 'Application\Controller\AboutController',
            'Application\Controller\Vacancy' => 'Application\Controller\VacancyController',
            'Application\Controller\Partners' => 'Application\Controller\PartnersController',
            'Application\Controller\GroupReg' => 'Application\Controller\GroupRegController',
            'Application\Controller\GroupRegAction' => 'Application\Controller\GroupRegActionController',
            'Application\Controller\VolunteersList' => 'Application\Controller\VolunteersListController',
            'Application\Controller\DonorPage' => 'Application\Controller\DonorPageController',
            'Application\Controller\DonorReg' => 'Application\Controller\DonorRegController',
            'Application\Controller\DonorLogin' => 'Application\Controller\DonorLoginController'

        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),

);
