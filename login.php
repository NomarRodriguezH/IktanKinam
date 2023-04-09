<?php
 require_once 'conexion.php';

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: bienvenida.php");
  exit;
}
 
 
$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }

    
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, user, contra FROM usuarios WHERE user = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){ 

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                // Revisa si el user exite, if yes verificar la pass.
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind  
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // pass correcta, so iniciar una nueva sesion.
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: bienvenida.php");
                        } else{
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
       mysqli_stmt_close($stmt);


    }
    
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Iniciar Sesión | IK</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: white;
            font-weight: bold;

        } 
        .contenedor {
            min-height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url(fondoN.png) no-repeat;
            background-size: cover;
            background-position: center; 
        }

        .contenedor form {
            height: 530px;
            width: 500px;
            background: rgba(255, 255, 255, .2);
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .3);
            border-top: 1px solid rgba(255, 255, 255, .3);
            border-bottom: 1px solid rgba(255, 255, 255, .3);
            /* From https://css.glass */

backdrop-filter: blur(18px);
-webkit-backdrop-filter: blur(18px);
border: 1px solid rgba(255, 255, 255, 0.3);

        }

        .contenedor form i {
            padding: 0 5px;
            font-size: 20px;
            color: white;
        }

        .contenedor form input {
            outline: none;
            border: none;
            height: 40px;
            width: 80%;
            background: rgba(0, 0, 0, .1);
            color: rgba(255, 255, 255, .7);
            box-shadow: 0 0 5px rgba(0, 0, 0, .5) inset;
            font-size: 17px;
            padding: 0 10px;
            margin: 15px 0;
        }
        .contenedor form button[type="submit"] {
            width: 27%;
            height: 40px;
            cursor: pointer;
            background:yellow;
            margin-top: 20px;
            border-radius: 50px;
        }

        .contenedor form button[type="submit"]:hover {
          letter-spacing: 5px;
         }

         #label 
        {
            font-size: 25px;
        }

         h3{
            margin-top: 10px;
            color: white;
            font-size: 50px;
            z-index: 1;
              -webkit-text-stroke: 1px blue;
         }
         .contenedor form .social {
            margin-bottom: 10px;
         }

    </style>    
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="contenedor">
        <form  id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>Login Usuario</h3>


<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
       <label id="label" for="username">Usuario:</label><br>
     <input type="text" name="username" id="username" class="form-control" value="<?php echo $username; ?>">

                <span class="help-block"><?php echo $username_err; ?></span>
            </div> <br><br><br> 
     
        <label id="label" for="password">Contraseña:</label>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="password" class="form-control" id="password">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <br><br>

        <button type="submit">Ingresar</button> <br><br>
        <div class="social">
          <a style="bottom: 10px; text-decoration: none;" href="register.php"><div  class="go">¿No tienes cuenta? Crea una</div> </a> 
        </div>
    </form>
    </div>

    <script type="text/javascript">
        var form = document.getElementById('form');
        form.addEventListener('mousemove', (e) => {
            var x = (window.innerWidth /2 -e.pageX) /12;
            var y = (window.innerWidth /2 -e.pageY) /12;
            form.style.transform = 'rotateX(' + x+ 'deg) rotateY('+y+'deg)' ;
        });

form.addEventListener ('mouseleave', function (){
    form.style.transform = 'rotateX(0deg) rotateY(0deg)'
});


    </script>

</body>
</html>
