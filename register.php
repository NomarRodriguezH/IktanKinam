<?php 
    
    include 'code-register.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="stylesregistro.css">
    <link rel="stylesheet" href="santa.css">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>
<div class="area" >
    <div class="containerSanta">
        <div class="santa-container">
            <div class="santa"></div>
            <div class="santa-eyes"></div></div>
        <div class="snow foreground"></div>
        <div class="snow foreground layered"></div>
        <div class="snow middleground"></div>
        <div class="snow middleground layered"></div>
        <div class="snow background"></div>
        <div class="snow background layered"></div>
    </div>
        <div class="container-all">
        <div class="ctn-form">
            <h1 class="gradient-text">Registrarse</h1>
            <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <br><br>
                <input type="text" name="nombre" placeholder="Nombre" class="Textos"

                       style="
                       border-radius: 20px;
                       background-color: rgba(255,255,255,0.3);
                       border:none;
                       outline: none;
                       width: 300px;
                       height: 30px;
                       box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
                       padding-left: 15px">
                <br>
                <span class="msg-error"><?php echo $nombre_err; ?></span>
                <br><br><br>

                <input type="text" name="username" placeholder="Nombre de Usuario"class="Textos"
                       style="
                       border-radius: 20px;
                       background-color: rgba(255,255,255,0.3);
                       border:none;
                       outline: none;
                       width: 300px;
                       height: 30px;
                       box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
                       padding-left: 15px">
                <br>
                <span class="msg-error"><?php echo $username_err; ?></span>
                <br><br><br>

                <input type="text" name="email" placeholder="Email"class="Textos"
                       style="
                       border-radius: 20px;
                       background-color: rgba(255,255,255,0.3);
                       border:none;
                       outline: none;
                       width: 300px;
                       height: 30px;
                       box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
                       padding-left: 15px">
                <br>
                <span class="msg-error"> <?php echo $email_err; ?></span>
                <br><br><br>

                <input type="text" name="telefono" placeholder="Telefono"class="Textos"
                       style="
                       border-radius: 20px;
                       background-color: rgba(255,255,255,0.3);
                       border:none;
                       outline: none;
                       width: 300px;
                       height: 30px;
                       box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
                       padding-left: 15px">
                <br>
                <span class="msg-error"><?php echo $telefono_err; ?></span>
                <br><br><br>

                <fieldset style="border-color: transparent">
                    <legendc style=" font-family: 'Archivo Black', sans-serif; color: #FFFFFF">Elige tu sexo</legendc>
                    <label style="color: black; font-family: 'Archivo Black', sans-serif;margin-left: 15px;">
                        <input type="radio"  id="mujer" name="sexo" value="mujer"> Mujer
                    </label>
                    <label style="color: black; font-family: 'Archivo Black', sans-serif;margin-left: 15px;">
                        <input type="radio"  id="hombre" name="sexo" value="Hombre" checked > Hombre
                    </label>
                    <span class="msg-error"><?php echo $sexo_err; ?></span>
                </fieldset>
                <br><br><br>

                <input type="password" name="password" placeholder="Contraseña"class="Textos"
                       style="
                       border-radius: 20px;
                       background-color: rgba(255,255,255,0.3);
                       border:none;
                       outline: none;
                       width: 300px;
                       height: 30px;
                       box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
                       padding-left: 15px;">
                <br>
                <span class="msg-error"> <?php echo $password_err; ?></span>
                <br><br><br><br>
                <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">

                <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <filter id="gooey">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />
                            <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="highContrastGraphic" />
                            <feComposite in="SourceGraphic" in2="highContrastGraphic" operator="atop" />
                        </filter>
                    </defs>
                </svg>

                <button id="gooey-button" type="submit">
                 Registrarse
                    <span class="bubbles">
            <span class="bubble"></span>
            <span class="bubble"></span>
            <span class="bubble"></span>
            <span class="bubble"></span>
            <span class="bubble"></span>
            <span class="bubble"></span>
            <span class="bubble"></span>
            <span class="bubble"></span>
            <span class="bubble"></span>
            <span class="bubble"></span>
        </span>
                </button>

            </form>
            <br><br>
            <span class="text-footer" style=" font-family: 'Archivo Black', sans-serif;">¿Ya tienes cuenta?
                <a href="index.php" style=" font-family: 'Archivo Black', sans-serif; color: blue; text-decoration: underline">Iniciar Sesión</a>
            </span>


    </div>
        </div>
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div >
</body>

</html>
