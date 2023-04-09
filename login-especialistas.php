<?php
  session_start();
    if(isset($_SESSION["loggedinESP"]) && $_SESSION["loggedinESP"] === true){
        header("location: controller-esp.php");
        exit;
    }
    require_once "conexion.php";

        	$correo_err='';
        	$password_err='';


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


		$consulta="SELECT * FROM esp WHERE correo = '$correo' AND contra = '$password' " ;
		$res=mysqli_query($link, $consulta);

		$fila=mysqli_fetch_row($res);
		$id =$fila[0];
		$user =$fila[8];
		$status = $fila[9];

		if (!empty($fila [3]) || !empty($fila [5])  ){
					$tipoESP= $fila [7]; 	
					if($tipoESP == 2 ){
						session_start();
            $_SESSION["psicologoLOG"] = true;
						$_SESSION['psicologoID'] = $id;
						$_SESSION['userPsicologo'] = $user;
						$_SESSION['statusP'] = $status;
						echo $_SESSION['psicologoID'];
						header ('location: psicologo/panel-psicologo.php');
						exit;
					}
					else if($tipoESP== 3) {
						session_start();
            $_SESSION["entrenadorLOG"] = true;
						$_SESSION['entrenadorID'] = $id;
						$_SESSION['userEntrenador'] = $user;
						$_SESSION['statusE'] = $status;
						echo $_SESSION['entrenadorID'];
						header ('location: entrenador/index.php');
						exit;
					}
					else if($tipoESP ==4) {
						session_start();
             $_SESSION["nutriLOG"] = true;
						$_SESSION['nutriID'] = $id;
						$_SESSION['userNutri'] = $user;
						$_SESSION['statusN'] = $status;
						echo $_SESSION['nutriID'];
						header ('location: nutriologo/index.php');
						exit;
					}
		}

		else {
			echo "No existe una cuenta registrada con estos datos.";
		}
	 }
 }
?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	  <script type="text/javascript" src="ja.js"></script>


	<style type="text/css">
		

html, body, html *, body *{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #fff;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body{
	-webkit-perspective: 500px;
	-moz-perspective: 500px;
	perspective: 500px;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

h2{
	font-family: 'Marketing Script', serif;
	font-size: 47px;
	text-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
	line-height: 0.4;
	text-align: center;
}

h4{
	font-size: 19px;
	text-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
	font-weight: normal;
	margin: 10px 0;
	text-align: center;
}

.button-wrapper{
	padding: 10px 8px;
	color: rgba(0, 0, 0, 0.3);
	font-size: 12px;
	font-style: italic;
}

.button-wrapper a{
	color: rgba(0, 0, 0, 0.4);
	font-size: 12px;
	font-style: italic;
	text-decoration: none;
}

.button-wrapper a:hover{
	color: rgba(255, 255, 255, 0.7);
}

.login-btn{
	font-family: 'Marketing Script', serif;
	font-size: 24px;
	color: rgba(255, 255, 255, 0.9);
	text-shadow: 0 2px 3px rgba(0, 0, 0, 0.3);
	opacity: 1;
	margin-top: -5px;
	cursor: pointer;
	float: right;
}

.login-wrapper{
	width: 400px;
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
	perspective: 500px;
}

.x-wrapper{
	width: 100%;
	transform: rotateX(0deg);
	perspective: 500px;
}

.y-wrapper{
	width: 100%;
	transform: rotateY(0deg);
}

.input-box{
	border-radius: 5px;
	position: relative;
	padding: 30px 50px;
	border: 1px solid rgba(221, 221, 221, 0.8);
	box-shadow: 0 5px 11px rgba(0, 0, 0, 0.2);
	background: rgba(255, 255, 255, 0.8);
	background: -moz-linear-gradient(bottom, rgba(221, 221, 221, 0.8) 0%, rgba(255, 255, 255, 0.8) 100%);
	background: -webkit-linear-gradient(bottom, rgba(221, 221, 221, 0.8) 0%, rgba(255, 255, 255, 0.8) 100%);
	background: linear-gradient(to top, rgba(221, 221, 221, 0.8) 0%, rgba(255, 255, 255, 0.8) 100%);
}

.input-box input{
	width: 100%;
	border: none;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.5);
	border-radius: 5px;
	background: rgba(255, 255, 255, 0.6);
	font-size: 19px;
	padding: 8px 12px;
	color: rgba(0, 0, 0, 0.8);
	font-weight: bold;
}

.input-box input:first-child{
	margin-bottom: 12px;
}

.input-box .show-pass{
	right: 60px;
	font-size: 21px;
	bottom: 33px;
	text-shadow: 0 0 3px #fff;
	cursor: pointer;
	color: rgba(0, 0, 0, 0.2);
	position: absolute;
}

.input-box .show-pass.showing{
	color: rgba(0, 0, 0, 0.7);
}


.bg-grad{
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	opacity: 0;
	-webkit-transition: opacity 5s linear;
	transition: opacity 5s linear;
	background: #f17009;
}

.bg-grad.active{
	opacity: 1;
}

.bg-grad.orange{
	background: #f17009;
	background: -moz-linear-gradient(30deg, #f17009 0%, #ee620d 24%, #f19109 74%, #f17009 100%);
	background: -webkit-linear-gradient(30deg, #f17009 0%, #ee620d 24%, #f19109 74%, #f17009 100%);
	background: linear-gradient(60deg, #f17009 0%, #ee620d 24%, #f19109 74%, #f17009 100%);
}

.bg-grad.red{
	background: #f1093f;
	background: -moz-linear-gradient(30deg, #f1093f 0%, #ee0d2d 24%, #f10960 74%, #f1093f 100%);
	background: -webkit-linear-gradient(30deg, #f1093f 0%, #ee0d2d 24%, #f10960 74%, #f1093f 100%);
	background: linear-gradient(60deg, #f1093f 0%, #ee0d2d 24%, #f10960 74%, #f1093f 100%);
}

.bg-grad.purple{
	background: #a709f1;
	background: -moz-linear-gradient(30deg, #a709f1 0%, #8c09f1 24%, #d309f1 74%, #a709f1 100%);
	background: -webkit-linear-gradient(30deg, #a709f1 0%, #8c09f1 24%, #d309f1 74%, #a709f1 100%);
	background: linear-gradient(60deg, #a709f1 0%, #8c09f1 24%, #d309f1 74%, #a709f1 100%);
}

.bg-grad.blue{
	background: #097bf1;
	background: -moz-linear-gradient(30deg, #097bf1 0%, #0971f1 24%, #09a2f1 74%, #097bf1 100%);
	background: -webkit-linear-gradient(30deg, #097bf1 0%, #0971f1 24%, #09a2f1 74%, #097bf1 100%);
	background: linear-gradient(60deg, #097bf1 0%, #0971f1 24%, #09a2f1 74%, #097bf1 100%);
}

.bg-grad.green{
	background: #1eb65e;
	background: -moz-linear-gradient(30deg, #1eb65e 0%, #19a83e 24%, #1bcd66 74%, #1eb65e 100%);
	background: -webkit-linear-gradient(30deg, #1eb65e 0%, #19a83e 24%, #1bcd66 74%, #1eb65e 100%);
	background: linear-gradient(60deg, #1eb65e 0%, #19a83e 24%, #1bcd66 74%, #1eb65e 100%);
}

.bg-grad.yellow{
	background: #ffc000;
	background: -moz-linear-gradient(30deg, #ffc000 0%, #ffa200 24%, #ffde00 74%, #ffc000 100%);
	background: -webkit-linear-gradient(30deg, #ffc000 0%, #ffa200 24%, #ffde00 74%, #ffc000 100%);
	background: linear-gradient(60deg, #ffc000 0%, #ffa200 24%, #ffde00 74%, #ffc000 100%);
}
	</style>


</head>
<body>
	<div class="bg-wrapper">
		<div class="bg-grad orange active"></div>
		<div class="bg-grad red"></div>
		<div class="bg-grad purple"></div>
		<div class="bg-grad blue"></div>
		<div class="bg-grad green"></div>
		<div class="bg-grad yellow"></div>
	</div>
	<div class="login-wrapper">
		<div class="x-wrapper">
			<div class="y-wrapper">
				<div class="title-wrapper">
					<h2>Iniciar Sesión</h2>
					<h4>Como Especislista.</h4>
				</div>

				<div class="input-box">

						<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
							 <input id="username" placeholder="Correo" type="text" name="correo"><br><br>

							 <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					        <input type="password" id="password" name="password"  placeholder="Contraseña" class="form-control"><br>
					        <span class="help-block"><?php echo $password_err; ?></span>
					      </div><br>

							<input type="submit" name="" value="Ingresar">	
						</form>


					<span class="show-pass icon-eye" title="show characters"></span>
				</div>
				<div class="button-wrapper">
					<a href="#">Olvide mi contraseña</a>
					<a href="especialistas/solicitud-especialista"><span class="login-btn" >Solicitar Acceso&raquo;</span></a>
				</div>
			</div>
		</div>
	</div>


</body>
</html>