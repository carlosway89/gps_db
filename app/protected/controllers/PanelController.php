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
				'actions'=>array('index','usuarios','transmition'),
				'users'=>array('@')
					// 'users'=>array('Yii::app()->user->checkAccess("administrador")')
					),
			// array('allow',
			// 	'actions'=>array('transmition'),
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
		
        // if(isset($_GET['placa'])){
        // 	$filter=$_GET['placa'];
        // 	if (!$filter) {
        // 		$sentence="SELECT * FROM vLog;";
        // 	}else{
        // 		$sentence="SELECT * FROM vLog where placa='".$filter."';";
        // 	}
        	
        // }else{
        // 	$sentence="SELECT * FROM vLog;";
        // }
        $sentence="SELECT * FROM vLog;";
        // $model=$sql->execute($db,$sentence);

		$this->render('index',array("sentence"=>$sentence));
	}

	public function actionTransmition($sentence="")
	{	
		$criteria = new CDbCriteria;

        $criteria->condition='estado!="0"';
        $criteria->order = 'id DESC';

        $criteria->limit = 200;

		$model=Mensaje::model()->findAll($criteria);
		// $sql=new Sqlite();
		
		// $months=array("01"=>"ENE","02"=>"FEB","03"=>"MAR","04"=>"ABR","05"=>"MAY","06"=>"JUN","07"=>"JUL","08"=>"AGO","09"=>"SEP","10"=>"OCT","11"=>"NOV","12"=>"DIC");
		// $month=$months[date("m")];
		// $day=date("d");

		// $db="../ClienteCCMF2_5/log".$month.$day.".db";		        

        // if(isset($_GET['placa'])){
        // 	$filter=$_GET['placa'];
        // 	if (!$filter) {
        // 		$sentence="SELECT * FROM vLog;";
        // 	}else{
        // 		$sentence="SELECT * FROM vLog where placa='".$filter."';";
        // 	}
        	
        // }else{
        // 	$sentence="SELECT * FROM vLog;";
        // }
        
        // $sentence="SELECT * FROM vLog order by fecLoc DESC;";
        
        // $model=$sql->execute($db,$sentence);

		echo $this->renderPartial('transmition', array('model'=>$model));
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