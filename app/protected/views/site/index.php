<div class="container">    
    <div class="row">
      <div class="col s12 m5 offset-m3">
        <div class="card-panel " style="margin-top:50px">
        	<img src="img/logo.png" class="center-block" style="height:60px">
          	<h6 class="center-align"><small>Inciar Sesion al Panel</small></h6>
            <div class="row">
			    <form class="col s12" method="POST">
			      <div>
 					<?php if(Yii::app()->user->hasFlash('error')){ ?>
                    <div class="red-text">
                        <?php echo Yii::app()->user->getFlash('error'); ?>
                    </div>
                    <?php } ?>
			      </div>
			      <div class="row">
			        <div class="input-field col s11">		        	

			          <i class="material-icons prefix">perm_identity</i>
			          <input id="icon_prefix" type="text" class="" name="LoginForm[username]">
			          <label for="icon_prefix">User Name</label>
			        </div>
			      </div>
			      <div class="row">
			        <div class="input-field col s11">
			          <i class="material-icons prefix">vpn_key</i>
			          <input id="password" type="password" class="" name="LoginForm[password]">
			          <label for="password">Password</label>
			        </div>
			      </div>
			      <div class="row">
			      	<div class="col s11">
			      		<input type="checkbox" class="filled-in" id="filled-in-box" name="LoginForm[rememberMe]" />
      					<label for="filled-in-box">Recordarme por 30 dias</label>
      				</div>
			      </div>
			      <div class="button">
			      	<button class="waves-effect waves-light btn fluid amber accent-4" type="submit">Iniciar Sesion</button>
			      </div>
			      
			    </form>
			</div>

        </div>
      </div>
    </div>


</div>

