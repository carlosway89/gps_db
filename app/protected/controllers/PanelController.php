<?php
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(0);
class PanelController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//layouts/panel';
	
	public function filters()
	{
		return array('accessControl');
	}

	//SI USAS ACCESS RULES DEBES ESPECIFICAR TODAS TUS ACCIONES, ES COMO TENER UNA FLACA
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','usuarios'),
				'users'=>array('@')
					// 'users'=>array('Yii::app()->user->checkAccess("administrador")')
					),
			// array('allow',
			// 	'actions'=>array('index'),
			// 		'users'=>array('*') 
			// 		),
			array('deny',
					'users'=>array('*'),
				)
			);
	}

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{	
		$this->render('index');

		// $var=new Pdf();

		// $var->test();
	}

	public function actionUsuarios()	
	{	


		

		// $usuarios=Usuarios::model()->findAll();
		$usuarios=new Usuarios('search');
		
		$usuarios->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios'])){
			$usuarios->attributes=$_GET['Usuarios'];	
						
		}

		$this->render('usuarios',array("usuarios"=>$usuarios));

	}




}