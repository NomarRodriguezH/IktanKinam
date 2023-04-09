<?php
	require_once "conexion.php";

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			height: 100vh;
			position: relative;
		}


		.contenedor {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			height: 50px;
		}

		.contenedor .to {
			position: absolute;
			top: 0;
			left: 0;
			width: 90px;
			height: 50px;
			background: black;
			border-radius: 30px;
			transition: 0.3s;
		}


		.contenedor .to .to-button {
			position: absolute;
			top: 5px;
			left: 5px;
			width: 40px;
			height: 40px;
			background: white;
			border-radius: 50%;
			cursor: pointer;
			transition: 0.3s;

		}


		.contenedor .to.active {
			background: blue;
		} 


		.contenedor .to.active .to-button {
			left: 45px;		}



		.contenedor .to.des {
			background: red;
		} 


		.contenedor .to.des .to-button {
			right: 45px;		}
 
	</style>

</head>
<body>



	<form name="form1" method="POST">
		<input type="text" name="inpu" value="" onchange="x()">
	</form>

	<form name="form2" method="POST">
		<input type="text" name="inpu2" value="" onchange="z()">
	</form>


	<div class="contenedor">
		<div class="to">
			<div class="to-button" onclick="xx()" > </div>
		</div>
	</div>

	<div class="txt"></div>

	<script type="text/javascript">

		let to = document.querySelector(".to");

		let tx = document.querySelector(".txt");
		
		function xx(){
			to.classList.toggle("active");

				if (to.classList.contains("active")){
					document.form1.inpu.value = '1';
					document.form2.inpu2.value = '';

				}
				else {
					document.form2.inpu2.value = '0';
					document.form1.inpu.value = '';
				}
		}


		function x(){
			form1.action='en.php';
			form1.submit();
		}


		function z (){
			form2.action='en.php';
			form2.submit();
		}

	</script>

</body>
</html>