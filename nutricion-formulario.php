<?php
	require_once 'config.php';
    session_start();

	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	    header("location: login.php");
	    exit;
	}

	$idconsulta = $_SESSION["id"];

	$consulta="SELECT * FROM usuarios WHERE id = '$idconsulta'  LiMIT 1" ;
	$res=mysqli_query($con,$consulta);
	$fila=mysqli_fetch_row($res);
	$formEnviado= $fila [11]; 
	if($formEnviado == '1'){
		header('location: dietas');
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Selecciona a tu asesor nutricional.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="entrenador/blog/style/bootstrap.min.css">
	<link rel="stylesheet" href="entrenador/blog/style/style.css">

	<style type="text/css">
		.card-columns {
			column-count: 2;
		}
	</style>
	
</head>
<body>

	
	<div class="jumbotron jumbotron-fluid">
	<div class="container">

	</div>
	</div>
	
	<!--Blog Cards Starts Here-->
	<div class="main">
	<div class="container">
	

	<div class="row">
	<?php
	$sqlpg = "SELECT * FROM esp WHERE id_rol ='4' ";
		$resultpg = mysqli_query($con,$sqlpg);

		
		$result = mysqli_query($con,$sqlpg);
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id_A'];
			$nombre = $row['nombre'];
			$user = $row['user'];
			$foto = $row['foto'];
		
			
			$sqlauth = "SELECT * FROM `nutriologo_datos` WHERE id_A = '$id' ";
			$resultauth = mysqli_query($con,$sqlauth);
			while($authrow=mysqli_fetch_array($resultauth)){
				$post_content = $authrow['acerca'];
				$estudios = $authrow['estudios'];
				$especialidad = $authrow['especialidad'];
				$vive = $authrow['direccion'];
			
		
	?>
	<div class="col-md-4 mb-3">
			<div class="card">
				<img src="<?php echo $foto; ?>" class="card-img-top" alt=".">
				<div class="card-body">
					<h5 class="card-title"><?php echo $nombre; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?php echo $user; ?></h6>
					<p class="card-text"><?php echo substr(strip_tags($post_content),0,120)."..."; ?></p>
					<p class="card-text">Estudios: <?php echo substr(strip_tags($estudios),0,90); ?></p>
					<p class="card-text">Especialidad: <?php echo substr(strip_tags($especialidad),0,90); ?></p>
					<p class="card-text">Localidad: <?php echo substr(strip_tags($vive),0,90); ?></p>

					<a href="nutricion-datos.php?id=<?php echo $id ;?>" class="btn btn-primary">Escoger</a>
				</div>
		</div>		
	</div>

	
		<?php } }?>
		
	</div>	<br>
		<?php
			echo "<center>";
			for($i=1;$i<=2;$i++){
				?>
				<a href="?p=<?php echo $i;?>"><button class="btn btn-info"><?php echo $i;?></button></a>&nbsp;
				
				<?php
				}
			echo "</center>";
		?>
		
	</div>
	</div>

		
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scroll.js"></script>
</body>
</html>