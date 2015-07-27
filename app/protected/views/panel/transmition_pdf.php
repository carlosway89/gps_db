<img src="<?php echo $_SERVER["DOCUMENT_ROOT"]; ?>/gps_db/app/img/logo.png" alt="gsavt_logo" style="height: 65px;margin-top: 14px;">
<br>
<h2 style="text-align:center;color:#2196F3">Reporte de Transmision</h2>
<br>
<table class="striped" style="text-align:center">
  <thead>
    <tr>
        <th data-field="placa">Placa</th>
        <th data-field="vel">Velocidad</th>
        <th data-field="lat">Longitud</th>
        <th data-field="long">Latitud</th>
        <th data-field="dir">Direccion</th>
        <th data-field="fecLoc">Fecha</th>
        <th data-field="transmition">Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php



    if (isset($model)) {


      if(isset($placa)){

        $filter=$placa;
        
        if ($filter) {

          $model = array_filter((array)$model,function($object){
            return ($object->placa == $_GET['Reporte']['placa']);
          });
        }

      }

          

      foreach ($model as $key => $value) {  
        if (isset($value->placa)) {    

    ?>
        <tr>
          <td style="<?php echo $key%2==0?'':'background-color: #F2F2F2;'; ?>" ><?php echo $value->placa; ?></td>
          <td style="<?php echo $key%2==0?'':'background-color: #F2F2F2;'; ?>"><?php echo $value->vel; ?></td>
          <td style="<?php echo $key%2==0?'':'background-color: #F2F2F2;'; ?>"><?php echo $value->lat; ?></td>
          <td style="<?php echo $key%2==0?'':'background-color: #F2F2F2;'; ?>"><?php echo $value->lon; ?></td>
          <td style="<?php echo $key%2==0?'':'background-color: #F2F2F2;'; ?>"><?php echo $value->dir; ?></td>
          <td style="<?php echo $key%2==0?'':'background-color: #F2F2F2;'; ?>"><?php echo $value->fecLoc; ?></td>
          <td style="<?php echo $key%2==0?'':'background-color: #F2F2F2;'; ?>"><?php echo $value->ack=="Y"?"Transmitido":"No Transmitido"; ?></td>
        </tr>
    <?php
        }
      } 
    }
    ?>
  </tbody>
</table>