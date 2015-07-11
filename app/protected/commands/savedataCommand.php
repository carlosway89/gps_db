<?php

class savedataCommand extends CConsoleCommand {
	

 	public function run() {

 		header('Content-type: application/json');
        $user="jhoana";
        $password="jh12345";
        $file="http://gps.gsavt.com/services/history.php?xml=true&login=$user&password=$password&datetime_from=2015-06-23%2002:00:00&datetime_to=2015-06-24%2010:25:59";

        $c = curl_init($file);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $page = curl_exec($c);
        curl_close($c);
        $xml=simplexml_load_string($page);
        
        $point_current='';

        if ($xml->point) {
            
            foreach ($xml->point as $key => $value) {

                $vehiculo=new Vehiculo();
                $mensaje=new Mensajes();

                // $modelo=Mensajes::model()->findByAttributes(array("coordinate_id"=>$value->coordinate_id)); 

                // if (!$modelo) {
                
                    $vehicle_current=Vehiculo::model()->findByAttributes(array("placa"=>$value->object)); 
                    if (!$vehicle_current) {

                        $vehiculo->placa=$value->object;
                        $vehiculo->nombre=$value->object;

                        $point_current=$value->object;

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
                            $this->_sendResponse(500, $msg );
                        }
                    }

                    $mensaje->placa=$value->object;

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
                        $this->_sendResponse(500, $msg );
                    }
                // }

                
            }

            echo "success";
        }
 	}

} 

?>