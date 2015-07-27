<?php

class ReporteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/panel';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','pdf'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('pdf'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionPdf()
	{
		$mi_pdf=$_GET['pdf'];
		$mi_pdf = "pdf/$mi_pdf";
							
		header('Content-type: application/pdf');
		// header('Content-Disposition: attachment; filename="'.$mi_pdf.'"');
		readfile($mi_pdf);
	}

	public function actionIndex()
	{
		
		$dir = '../ClienteCCMF2_5/';

		$files=array();
        foreach(glob($dir.'*.db') as $file) {
          
          $files[]=str_replace("../ClienteCCMF2_5/","",$file);

        }

        $pdf_file="";
        $vehicle=Vehiculo::model()->findAll();
        
        $rows = array();
        foreach($vehicle as $model){
            $rows[] = $model->attributes;
        }

        if (isset($_GET['Reporte']['file'])) {
        	$pdf=new Pdf();
        
	        $sql=new Sqlite();
	        
	        $log=$_GET['Reporte']['file'];

	        $placa="";

	        if (isset($_GET['Reporte']['placa'])) {
	        	$placa=$_GET['Reporte']['placa'];
	        }
	        

	        $db="../ClienteCCMF2_5/".$log;   

	        // $db="../ClienteCCMF2_5/logJUL24.db";               

	        $sentence="SELECT * FROM vLog order by fecLoc DESC;";
	        
	        $model=$sql->execute($db,$sentence);


	        $html=$this->renderPartial('/panel/transmition_pdf', array('model'=>$model,'placa'=>$placa),true,true);

	        
	        $pdf_file=$pdf->create($html);
	        Yii::app()->user->setState('pdf_file',$pdf_file);

        }
        if (isset($_GET['mail'])) {
        	$mail=new Mailer();
        	$pdf_file=Yii::app()->user->getState('pdf_file');
	        $file=$pdf_file!=""?"pdf/".$pdf_file:null;

	        $to=$_GET['mail'];
	        
	        $message= (object) array(
	            "subject"=>"Reporte de transmision GPS",
	            "body"=>"<h1>Reporte transmision</h1><br>Esto es un email autogenerado, se ha adjuntado el reporte como <b>PDF!</b>"
	        );
	        // echo $file.$to;

	        Yii::app()->user->setState('pdf_file',null);

	        $mail->send($to,$message,$file);

	        
        }
        


		$this->render('index',array(
			'files'=>$files,
			'vehicle'=>(object)$rows,
			'pdf_file'=>$pdf_file
		));

	}


}
