<?php
	$_usuarios=$usuarios->search()->getData();
?>
<br>
<!-- <h1>Panel<small> administracion</small></h1> -->
<div class="row">
	<div class="col s10 offset-s1">
		<div class="panel">
			<table class="responsive-table">
              <thead>
                <tr>
                    <th data-field="user">User</th>
                    <th data-field="password">Password</th>
                    <th data-field="email">Email</th>
                    <th data-field="estado">Estado</th>
                    <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
              	<?php foreach ($_usuarios as $key => $value) {
              	?>
                <tr>
                  <td><?=$value->user?></td>
                  <td><?=$value->password?></td>
                  <td><?=$value->email?></td>
                  <td><?=$value->estado?></td>
                  <td>
                  	<ul class="list-inline">
                  		<li><i>eliminar</i></li>
                  		<li><i>actualizar</i></li>
                  	</ul>
                  </td>
                </tr>
                <?php
              	}
              	?>
              </tbody>
            </table>
		</div>
	</div>
</div>

        
            
