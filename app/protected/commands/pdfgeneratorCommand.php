<?php

class pdfgeneratorCommand extends CConsoleCommand {
	


 	public function run() {

        $pdf=new Pdf();
        
        $sql=new Sqlite();

        $ccc = new CController('context');
        
        $db="../ClienteCCMF2_5/log".strtoupper(date("Md")).".db";               

        $root=$_SERVER['DOCUMENT_ROOT'];

        $sentence="SELECT * FROM vLog;";
        
        $model=$sql->execute($db,$sentence);


        $html = $ccc->renderInternal($root."protected/views/panel/transmition_pdf.php", array('model'=>$model), true);

        $file=$pdf->create($html);

        $this->sendMail($file);
 		
 	}

    public function sendMail($file="")
    {
        $mail=new Mailer();
        $file=$file!=""?$file:null;

        $to="gsavtecnologia@gmail.com";
        
        $message= (object) array(
            "subject"=>"Reporte de transmision GPS",
            "body"=>"Esto es un email autogenerado, se ha adjuntado el reporte como <b>PDF!</b>"
        );

        $mail->send($to,$message,$file);
    }

} 

?>