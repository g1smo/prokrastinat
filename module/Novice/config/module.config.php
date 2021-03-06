<?php
namespace Novice;
return array(
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Novica' => 'Novice\Controller\NovicaController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'novice' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'index'
                    ),
                ),
            ),
            'novice_index' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/[stran/:page]',
                    'constraints' => array(
                        'page'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'index',
                        'page' => 1
                    ),
                ),
            ),
            'novice_dodaj' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/dodaj/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'dodaj'
                    ),
                ),
            ),
            'novice_parse' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/parse/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'parse'
                    ),
                ),
            ),
            'novice_view' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/pregled/[:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'pregled'
                    ),
                ),
            ),
            'novice_uredi' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/uredi/[:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'uredi'
                    ),
                ),
            ),
            'novice_ostale' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/ostale/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'ostale'
                    ),
                ),
            ),
            'novice_studentske' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/ostale/studentske/[stran/:page]',
                    'constraints' =>array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'studentske',
                        'page' => 1,
                    ),
                ),
            ),
            'novice_brisi' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/brisi/[:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'brisi'
                    ),
                ),
            ),
            'novice_pregled' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/pregled/[:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'pregled'
                    ),
                ),
            ),
            'novice_extreme' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/ostale/extreme/',
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'extreme'
                    ),
                ),
            ),
            'novice_extreme_pregled' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/ostale/extreme/pregled/[:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'extremepregled',
                    ),
                ),
            ),
            'novice_iw' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/novice/ostale/infoworld/[stran/:page]',
                    'constraints' =>array(
                        'stran'     => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Novica',
                        'action' => 'infoworld',
                        'page' => 1,
                    ),
                ),
            ),
        ),
    ),
    
    'view_helpers' => array(
        'factories' => array(
                'Requesthelper' => function($sm){
                    $helper = new \Novice\View\Helper\Requesthelper;
                    $request = $sm->getServiceLocator()->get('Request');
                    $helper->setRequest($request);
                    return $helper;
                }
        )
    ),
    
    'view_manager' => array(
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
);