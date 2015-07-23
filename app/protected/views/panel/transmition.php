<table class="hoverable centered">
  <thead>
    <tr>
        <th data-field="placa">Placa</th>
        <th data-field="vel">Velocidad</th>
        <th data-field="lat">Longitud</th>
        <th data-field="long">Latitud</th>
        <th data-field="dir">Dirección</th>
        <th data-field="fecLoc">Fecha de Localizacion</th>
        <th data-field="transmition">Estado Transmicion</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    if (isset($model)) {
      foreach ($model as $key => $value) {  
        if (isset($value->placa)) {       
    ?>
        <tr>
          <td><?php echo $value->placa; ?></td>
          <td><?php echo $value->vel; ?></td>
          <td><?php echo $value->lat; ?></td>
          <td><?php echo $value->lon; ?></td>
          <td><?php echo $value->dir; ?></td>
          <td><?php echo $value->fecLoc; ?></td>
          <td><?php echo $value->ack=="Y"?"<i class='material-icons green-text'>my_location</i>":"<i class='material-icons red-text'>new_releases</i>"; ?></td>
        </tr>
    <?php
        }
      } 
    }
    ?>
  </tbody>
</table>