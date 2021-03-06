<?php

class savedataCommand extends CConsoleCommand {
	

    public function saveVehicle($value){

        $vehiculo=new Vehiculo();

        $_placa=strtoupper(str_replace(" ","",$value->object_name));
        $vehicle_current=Vehiculo::model()->findByAttributes(array("placa"=>$_placa)); 

        if (!$vehicle_current) {

            $vehiculo->placa=$_placa;
            $vehiculo->nombre=$value->object_name;


            if (!$vehiculo->save()){
                // Errors occurred
                $msg = "<h1>Error</h1>";
                $msg .= sprintf("Couldn't create model <b>%s</b>");
                $msg .= "<ul>";
                foreach($vehiculo->errors as $attribute=>$attr_errors) {
                    $msg .= "<li>Attribute: $attribute</li>";
                    $msg .= "<ul>";
                    foreach($attr_errors as $attr_error) {
                        $msg .= "<li>$attr_error</li>";
                    }        
                    $msg .= "</ul>";
                }
                $msg .= "</ul>";
                // $this->_sendResponse(500, $msg );

                $this->saveVehicle($value);
            }
        }
    }

    public function saveMensajes($value){

        $mensaje=new Mensajes();

        $mensaje->placa=strtoupper(str_replace(" ","",$value->object_name));
        // $mensaje->coordinate_id=$value->coordinate_id;
        $mensaje->coordinate_id=0;
        $mensaje->longitud=$value->longitude;
        $mensaje->latitud=$value->latitude;
        $mensaje->velocidad=$value->Speed;
        $mensaje->fecha=date('Y-m-d H:i:s',strtotime('-5 Hours', strtotime($value->datetime)));
        $mensaje->rumbo=$value->direction;


        if (!$mensaje->save()) {
            // Errors occurred
            $msg = "<h1>Error</h1>";
            $msg .= sprintf("Couldn't create model <b>%s</b>");
            $msg .= "<ul>";
            foreach($mensaje->errors as $attribute=>$attr_errors) {
                $msg .= "<li>Attribute: $attribute</li>";
                $msg .= "<ul>";
                foreach($attr_errors as $attr_error) {
                    $msg .= "<li>$attr_error</li>";
                }        
                $msg .= "</ul>";
            }
            $msg .= "</ul>";
            // $this->_sendResponse(500, $msg );

            $this->saveMensajes($value);
        }
    }

    public function conexion($user,$password){
        header('Content-type: application/json');
        // $user="jhoana";
        // $password="jh12345";

        // $date_from="2015-06-23%2002:00:00";
        $date_from=date("Y-m-d H:i:s", time() - 7200); // 86400 -> 1 day ago; 3600 -> 1 hour ago; 60 -> 1 minute ago
        //

        // $date_to="2015-06-24%2010:25:59";

        $date_to=date("Y-m-d H:i:s",time() + 7200);

        $file="http://gps.gsavt.com/services/history.php?xml=true&login=$user&password=$password&datetime_from=$date_from&datetime_to=$date_to";

        $c = curl_init($file);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $page = curl_exec($c);
        curl_close($c);
        $xml=simplexml_load_string($page);
        
        // var_dump($xml);

        if ($xml->point) {
            
            foreach ($xml->point as $key => $value) {

                $placa=strtoupper(str_replace(" ","",$value->object_name));
                
                $fecha=date('Y-m-d H:i:s',strtotime('-5 Hours', strtotime($value->datetime)));

                $modelo=Mensajes::model()->findByAttributes(array("fecha"=>$fecha,"placa"=>$placa)); 

                if ($modelo==null) {
                
                    $this->saveVehicle($value);

                    $this->saveMensajes($value);
                }
                // print_r($value);

                
            }
        }
    }

    public function status($user,$password)
    {
        $file="http://gps.gsavt.com/services/status.php?xml=false&login=$user&password=$password";

        $c = curl_init($file);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $page = curl_exec($c);
        curl_close($c);
        $json=json_decode($page);
        
        // print_r($json->data->items);
        if (isset($json->data)) {
            
            foreach ($json->data->items as $key => $value) {

                
                $placa=strtoupper(str_replace(" ","",$value->object_name));

                $fecha=date('Y-m-d H:i:s',strtotime('-5 Hours', strtotime($value->datetime)));
                
                $modelo=Mensajes::model()->findByAttributes(array("fecha"=>$fecha,"placa"=>$placa));

                if ($modelo==null) {
                
                    $this->saveVehicle($value);

                    $this->saveMensajes($value);
                }

                // print_r($value);

                
            }
        }


    }

 	public function run() {

        $models=Usuarios::model()->findAll();

        $rows = array();
         foreach($models as $model){
            $rows[] = $model->attributes;
         }

         
        foreach ($rows as $value) {
            // print_r($value);
            $this->status($value['user'],$value['password']);
        }

 		
 	}

} 

?>