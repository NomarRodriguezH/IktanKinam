<?php 

	$uno = $_POST['inpu'];
	$dos = $_POST['inpu2'];


	$s = "UPDATE esp SET statusA = '$uno' WHERE id_A = '1' ";
	$R = mysqli_query($link,$s);

	$s2 = "UPDATE esp SET statusA = '$dos' WHERE id_A = '1' ";
	$R2 = mysqli_query($link,$s2);

?>