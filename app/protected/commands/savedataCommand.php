<?php

class savedataCommand extends CConsoleCommand {
	

    public function saveVehicle($value){

        $vehiculo=new Vehiculo();

        $placa=strtoupper(str_replace(" ","",$value->object));
        $vehicle_current=Vehiculo::model()->findByAttributes(array("placa"=>$placa)); 

        if (!$vehicle_current) {

            $vehiculo->placa=$placa;
            $vehiculo->nombre=$value->object;


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

        $mensaje->placa=strtoupper(str_replace(" ","",$value->object));
        $mensaje->coordinate_id=$value->coordinate_id;
        $mensaje->longitud=$value->longitude;
        $mensaje->latitud=$value->latitude;
        $mensaje->velocidad=$value->speed;
        $mensaje->fecha=$value->datetime;
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
        $date_from=date("Y-m-d H:i:s", time() - 86400); //1 day ago

        // $date_to="2015-06-24%2010:25:59";

        $date_to=date("Y-m-d H:i:s");

        $file="http://gps.gsavt.com/services/history.php?xml=true&login=$user&password=$password&datetime_from=$date_from&datetime_to=$date_to";

        $c = curl_init($file);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $page = curl_exec($c);
        curl_close($c);
        $xml=simplexml_load_string($page);
        
        // var_dump($xml);

        if ($xml->point) {
            
            foreach ($xml->point as $key => $value) {

                $placa=strtoupper(str_replace(" ","",$value->object));
                
                $modelo=Mensajes::model()->findByAttributes(array("fecha"=>$value->datetime,"placa"=>$placa)); 

                if ($modelo==null) {
                
                    $this->saveVehicle($value);

                    $this->saveMensajes($value);
                }

                
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
            $this->conexion($value['user'],$value['password']);
        }

 		
 	}

} 

?>