<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Gestion de Expedientes',
	'preload'=>array('log','bootstrap'), 
	'theme' =>'bootstrap',

	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.controllers.*',
	    'application.widgets.bootstrap.*',
	),

	'modules'=>array(
					'gii'=>array(
								'class'=>'system.gii.GiiModule',
								'password'=>'1234',
								'ipFilters'=>array('127.0.0.1','::1'),
								'generatorPaths'=>array('bootstrap.gii',),
								),
					),
	// application components
	'components'=>array('authManager'=>array("class"=>"CDbAuthManager","connectionID"=>"db" ,),
		'user'=>array('allowAutoLogin'=>true,),
		'urlManager'=>array(
							'urlFormat'=>'path',
							'showScriptName'=>false,
							'urlSuffix'=>'.html',
							'rules'=>array( '/'=>'/view', '//'=>'/', '/'=>'/',
											'<controller:\w+>/<id:\d+>'=>'<controller>/view',
											'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
											'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
											),
							),
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=dbgestionexp',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '1234',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array('adminEmail'=>'webmaster@example.com',),
);