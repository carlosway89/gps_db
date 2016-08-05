<table class="hoverable centered responsive-table">
  <thead>
    <tr>
        <th data-field="placa">Placa</th>
        <th data-field="vel">Velocidad</th>
        <th data-field="lat">Latitud</th>
        <th data-field="long">Longitud</th>
        <th data-field="dir">Dirección</th>
        <th data-field="fecLoc">Fecha de Localizacion</th>
        <th data-field="transmition">Estado Transmision</th>
    </tr>
  </thead>
  <tbody>
    <?php



    if (isset($model)) {


      if(isset($_GET['placa'])){

        $filter=$_GET['placa'];
        
        if ($filter) {

          $model = array_filter((array)$model,function($object){
            return ($object->placa == $_GET['placa']);
          });
        }

      }

          

      foreach ($model as $key => $value) {  
        if (isset($value->placa)) {    

    ?>
        <tr>
          <td><?php echo $value->placa; ?></td>
          <td><?php echo $value->velocidad; ?></td>
          <td><?php echo $value->latitud; ?></td>
          <td><?php echo $value->longitud; ?></td>
          <td><?php echo $value->rumbo; ?></td>
          <td><?php echo $value->fecha; ?></td>
          <td><?php echo $value->estado!="-1"?"<i class='material-icons green-text'>my_location</i>":"<i class='material-icons red-text'>new_releases</i>"; ?></td>
        </tr>
    <?php
        }
      } 
    }
    ?>
  </tbody>
</table>