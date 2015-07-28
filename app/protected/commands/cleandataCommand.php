<?php

class cleandataCommand extends CConsoleCommand {
	

    public function delete($id){

        $model = Mensajes::model()->findByPk($id);

        $num = $model->delete();

        if($num>0)
            return "Mensaje $id deleted";
        else
            return "Error deleting Mensaje $id";
    }

 	public function run() {

        $criteria = new CDbCriteria;    

        $criteria->condition=" fecha BETWEEN '".date('Y-m-d H:i:s', strtotime('-3 Month'))."' AND '".date('Y-m-d H:i:s', strtotime('-1 Month'))."' ";
        // $criteria->condition=" fecha BETWEEN '".date('Y-m-d', strtotime('-3 Month'))."' AND '" . date('Y-m-d') . "' ";

        $models=Mensajes::model()->findAll($criteria);

        $rows = array();
        
        foreach($models as $model){
           // print_r($model->id);
           $this->delete($model->id);
        }
	
 	}


} 

?>