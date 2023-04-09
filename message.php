<?php
$conn = mysqli_connect("localhost", "root", "", "iktam_db") or die("Database Error");

$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

$check_data = "SELECT respuestas FROM botsimple WHERE preguntas LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");


if (mysqli_num_rows($run_query) > 0) {
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['respuestas'];
    echo $replay;
} else {
    echo "¡Lo siento, no puedo <br>ayudarte con este <br> inconveniente! Favor <br>comunícate con el <br>administrador nomarchess
";
}
