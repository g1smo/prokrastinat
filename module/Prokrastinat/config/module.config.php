<?php
namespace Prokrastinat;
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
			'Prokrastinat\Controller\Index' => 'Prokrastinat\Controller\IndexController',
		),
	),
	'router' => array(
		'routes' => array(
			'home' => array(
				'type' => 'literal',
				'options' => array(
					'route' => '/',
					'defaults' => array(
						'controller' => 'Prokrastinat\Controller\Index',
						'action' => 'index',
					),
				),
			),
			'index' => array(
				'type' => 'segment',
				'options' => array(
					'route' => '/index[/:action]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9]*'
					),
					'defaults' => array(
						'controller' => 'Prokrastinat\Controller\Index',
						'action' => 'index',
					),
				),
			),
		),
	),
	'view_manager' => array(
		'template_map' => array(
			'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
);