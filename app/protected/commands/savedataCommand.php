<?php

class savedataCommand extends CConsoleCommand {
	
	/* Declaramos propiedades, etc */
 	public function run() {
 	/* lo que necesitamos hacer */
 		
 		$valor=Mensajes::model()->findAll();

 		print_r($valor);
 	}

} 

?>