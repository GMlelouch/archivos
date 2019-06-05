 <div class="card blue-grey darken-1" style="width: 50%;margin: 0 auto; 
text-align: left;margin-top: 1%;">
        <div class="card-content white-text">
          <div id="mensaje_error"></div>

            <form class="form-signin" id="formulario_login" method="post">
      <center>
        <img class="mb-4" src="materialize/img/logo2.fw.png" alt="" width="200" height="200">
      </center>
      <center>
        <h4 class="h3 mb-3 font-weight-normal">Inicie Sesion</h4>
      </center>
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password">
      <div class="checkbox mb-3">
        <!--<label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>-->
      </div>
      <center><button class="btn btn-lg btn-primary btn-block" type="button" id="ingresar">Ingresar</button></center>
      <center><p class="mt-5 mb-3 text-muted">&copy;- 2019</p></center>
            </form>

            <div class="prueba"></div>
<!--Modal-->
        </div>
      </div>
    

<script type="text/javascript">
   $(document).ready(function(){ 
       $('#ingresar').click(function(){        
      
           console.log($("#formulario_login").serialize());
           $.ajax({                        
           type: "POST",                 
           url: "controlador/login_controlador.php",                     
           data: $("#formulario_login").serialize(), 
           success: function(data)             
           {
            $("#mensaje_error").html(data);                
           }
       })        
    });
    });     
</script>
