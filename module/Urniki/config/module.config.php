<?php
namespace Urniki;

use DoctrineORMModule;
use DoctrineModule;
return array(
    'controllers' => array(
        'invokables' => array(
            'Urniki\Controller\Urniki' => 'Urniki\Controller\UrnikiController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'urniki' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),
    'router' => array(
        'routes' => array(
            'urniki' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/urniki[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Urniki\Controller\Urniki',
                        'action' => 'index',
                    ),
                ),
            ),
            'get-smeri' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/urniki/get-smeri/:program',
                    'constraints' => array(
                        'program' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Urniki\Controller\Urniki',
                        'action' => 'getSmeri'
                    )
                )
            ),
            'get-urniki' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/urniki/get-urniki/:program/:letnik/:smer/:datum',
                    'constraints' => array(
                        'program' => '[0-9]+',
                        'letnik' => '[0-9]+',
                        'smer' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Urniki\Controller\Urniki',
                        'action' => 'getUrnik'
                    )
                )
            )
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_urniki' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        ),
        // urniki entity manager
        
    ),
    
);
