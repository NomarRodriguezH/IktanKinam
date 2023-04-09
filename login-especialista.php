<?php 

    session_start();
    
    if(isset($_SESSION["loggedinESP"]) && $_SESSION["loggedinESP"] === true){
        header("location: controller-esp.php");
        exit;
    }

require_once "conexion.php";
  
$correo = $password = "";
$correo_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["correo"]))){
        $correo_err = "Por favor ingrese su correo.";
    } else{
        $correo = trim($_POST["correo"]);
    }

    
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty($correo_err) && empty($password_err)){
        // select statement
        $sql = "SELECT id_A, correo, contra FROM esp WHERE correo = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){ 

            mysqli_stmt_bind_param($stmt, "s", $param_correo);
            
            $param_correo = $correo;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                // Revisa si el user exite, if yes verificar la pass.
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind  
                    mysqli_stmt_bind_result($stmt, $id, $correo, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // pass correcta, so iniciar una nueva sesion.
                            session_start();
                            $_SESSION["loggedinESP"] = true;
                            $_SESSION["idESP"] = $id;
                            $_SESSION["correoESP"] = $correo; 
					                              
                            
                            header("location: controller-esp.php");
                        } else{
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    $correo_err = "No existe cuenta registrada con esta direccion de email.";
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
    <meta charset="UTF-8">
    <title>Login</title>
    <style type="text/css">
       



    </style>
</head>
<body>
    <div class="wrapper">
        <form  id="formLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

            <div class="form-group <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>">
                <span class="help-block"><?php echo $correo_err; ?></span>
            </div>    

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <p>Si no tienes una cuenta debes de solicitar un permiso <a href="solicitar-ingreso.php">Aqui</a>.</p>
        </form>
    </div>    
</body>
</html>