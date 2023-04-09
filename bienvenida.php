<?php 
require_once 'seguridad.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="sb.css">
  <style type="text/css">
.wrapper {
            visibility: hidden; 
        }
        #no {
            -webkit-appearence: none;
            border: 1px solid green;
            position:  fixed;
            bottom: 50px;
            right: 50px;
            cursor: pointer;
        }
        #no:hover {
            border-radius: 30px;
        }
       
        #no:checked~ .wrapper {
            visibility: visible;
            position:  fixed;
            bottom: 90px;
            right: 45px;
        }

        .bot {
          z-index: 2;overflow: hidden;
        }

  </style>
</head>
<body>

<div class="dashboard-river">

  <div class="dashboard-container">

    <div class="dashboard">

      <div class="ui-row-1">

        <div class="logo-comp">
          <div><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 297 297" xml:space="preserve">
              <g>
                <path d="M48.523,73.196h18.131c5.597,0,10.137-4.536,10.137-10.134c0-5.6-4.54-10.137-10.137-10.137H48.523 c-5.599,0-10.137,4.537-10.137,10.137C38.387,68.66,42.925,73.196,48.523,73.196z" />
                <path d="M47.628,123.657c0-5.598-4.54-10.137-10.137-10.137H19.357c-5.599,0-10.135,4.539-10.135,10.137 c0,5.597,4.536,10.135,10.135,10.135h18.134C43.088,133.792,47.628,129.254,47.628,123.657z" />
                <path d="M277.643,95.387h-18.135c-5.597,0-10.137,4.539-10.137,10.135c0,5.601,4.54,10.137,10.137,10.137h18.135 c5.599,0,10.135-4.536,10.135-10.137C287.777,99.926,283.241,95.387,277.643,95.387z" />
                <path d="M140.148,203.69v83.173c0,5.598,4.54,10.137,10.137,10.137c5.599,0,10.137-4.539,10.137-10.137V203.69h93.406 c5.597,0,10.137-4.539,10.137-10.136c0-5.598-4.54-10.137-10.137-10.137H227.05c3.911-8.197,5.898-17.617,5.898-28.209 c0-29.299-21.058-60.583-39.637-88.187c-5.055-7.506-9.829-14.599-13.809-21.124c-1.689-3.791-1.094-19.677,1.284-34.106 c0.487-2.938-0.344-5.942-2.271-8.212c-1.926-2.27-4.752-3.58-7.73-3.58h-40.998c-2.977,0-5.803,1.313-7.729,3.58 c-1.924,2.268-2.755,5.271-2.273,8.21c2.383,14.432,2.978,30.316,1.288,34.107c-3.984,6.527-8.759,13.619-13.813,21.126 c-18.579,27.604-39.639,58.887-39.639,88.186c0,10.592,1.987,20.012,5.902,28.209H46.745c-5.601,0-10.137,4.539-10.137,10.137 c0,5.597,4.536,10.136,10.137,10.136H140.148z M202.707,183.418H97.864c-6.701-7.003-9.968-16.27-9.968-28.209 c0-23.111,19.222-51.669,36.182-76.865c5.209-7.738,10.13-15.05,14.363-21.993c4.769-7.819,4.27-23.774,2.954-36.077h17.781 c-1.316,12.302-1.813,28.257,2.952,36.077c4.233,6.943,9.153,14.252,14.362,21.992c16.96,25.197,36.184,53.755,36.184,76.866 C212.675,167.148,209.406,176.417,202.707,183.418z" />
              </g>
            </svg></div>
          <p>Iktan Kinam</p>
        </div>

        <div class="search">
          <input type="search" id="search" name="search" placeholder="Busca">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg>
        </div>

        <div class="profile">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
          </svg>

          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
          </svg>
          <div></div>
        </div>

        <div class="profile-small">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
          </svg>
        </div>

      </div>

      <div class="ui-row-2">
        <div class="main-content">

          <div class="header">

            <div class="page-display">
              <h1>Hola</h1>
              <h2><?php echo $_SESSION['username']; ?></h2>
            </div>

            <div class="clay-category">
              <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path d="M329.3 99.64l-39.7 10.46c-30.2 26.1-62.7 50.9-96.7 75.1l-6.7 21-34.1 7.3c-22.6 15.3-45.6 30.4-68.82 45.5l120.32 18.4 213.9-167.1c-27.7-3.8-56.9-7.5-88.2-10.66zm103.4 21.56l-61.4 47.9-43 53.1-45 15.7-65 50.7 20.8 115.1c65.6-54.6 127.6-109.4 187-163.1l-5.6-31.2 42.1-1.9c8.3-7.4 16.5-14.9 24.6-22.3zM61.58 277.6c-21.15 39.9-32.01 70.6-36.83 95.8 9.21 1.1 18.3 2.2 27.28 3.5l16.76-30.6 5.52 34c53.29 8.6 103.09 20.5 152.19 32.1l-26.9-117.6-66-10.1z" />
              </svg>
              <p><a href="entrenamiento-mental">Gimnasio Cerebral</a></p>
            </div>

            <div class="clay-category">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 49.382 49.382" xml:space="preserve">
                <g>
                  <path d="M48.654,12.775c-0.333-1.618-1.912-2.886-3.594-2.886h-7.082c-0.159-3.128-0.308-5.418-0.308-5.418
    c-0.692-2.269-1.817-4.059-4.058-4.059H5.745c-2.242,0-3.35,1.767-4.059,4.059c0,0-0.656,11.177-0.589,17.397
    c0.037,6.967,4.344,17.398,4.344,17.398c0.411,1.271,0.912,2.334,1.627,3.058H0.951c-0.957,0-1.239,0.6-0.629,1.337l3.28,3.972
    c0.609,0.738,1.88,1.336,2.837,1.336h28.309c0.957,0,2.116-0.676,2.586-1.509l2.05-3.626c0.472-0.833,0.076-1.51-0.88-1.51h-5.943
    c0.758-0.747,1.279-1.837,1.644-3.058c0,0,1.768-4.524,2.998-9.548l2.222,0.899c0.523,0.212,1.125,0.314,1.736,0.314
    c0.966,0,1.956-0.257,2.705-0.744l2.294-1.494c1.156-0.753,2.238-2.286,2.517-3.566c0.345-1.588,0.746-3.975,0.701-6.329
    C49.332,16.507,48.96,14.258,48.654,12.775z M45.744,24.491c-0.112,0.516-0.729,1.368-1.222,1.689l-2.294,1.494
    c-0.396,0.257-1.241,0.341-1.679,0.162l-2.704-1.093c0.313-1.71,0.516-3.386,0.516-4.875c0-2.686-0.109-5.981-0.24-8.98h6.939
    c0.28,0,0.612,0.281,0.655,0.49c0.28,1.359,0.621,3.413,0.661,5.477C46.417,20.92,46.055,23.059,45.744,24.491z" />
                </g>
              </svg>
              <p><a href="dietas/index.php">Nutriologia</a></p>
            </div>

            <div class="clay-category">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 344.713 344.713" xml:space="preserve">
                <g>
                  <path d="M190.028,70.017c0.06-0.669,0.095-1.345,0.095-2.029c0-12.498-10.133-22.631-22.631-22.631
    c-12.498,0-22.631,10.133-22.631,22.631c0,0.684,0.036,1.36,0.095,2.029c-28.722,5.488-53.793,21.255-71.226,43.34h187.523
    C243.821,91.272,218.748,75.505,190.028,70.017z" />
                  <path d="M332.677,135.951c-8.831-9.86-21.559-15.291-35.84-15.291c-5.602,0-11.367,0.84-17.137,2.498
    c-10.46,3.005-19.25,6.371-26.63,10.198H64.187L7.977,91.708c-1.518-1.124-3.54-1.298-5.226-0.448C1.064,92.109,0,93.837,0,95.726
    v32.652c0,1.111,0.37,2.191,1.052,3.068l47.147,60.669c1.97,49.349,33.893,90.99,78.086,107.242h82.414
    c30.765-11.314,55.565-34.94,68.472-64.896c1.013,0.297,2.023,0.578,3.028,0.825c4.161,1.024,8.292,1.544,12.28,1.544
    c31.204,0,48.524-30.373,51.847-60.473C346.062,160.627,341.926,146.277,332.677,135.951z M103.088,234.714
    c-1.137,0.645-2.373,0.951-3.593,0.951c-2.54,0-5.008-1.329-6.351-3.695c-6.043-10.652-9.238-22.788-9.237-35.096
    c0-4.028,3.266-7.294,7.294-7.294h0.001c4.028,0,7.293,3.266,7.293,7.295c0,9.789,2.537,19.436,7.337,27.896
    C107.82,228.275,106.591,232.726,103.088,234.714z M139.897,259.392c-1.085,2.95-3.876,4.778-6.846,4.778
    c-0.836,0-1.687-0.145-2.517-0.451c-6.085-2.238-11.844-5.306-17.115-9.119c-3.264-2.361-3.996-6.92-1.636-10.184
    c2.361-3.264,6.921-3.997,10.185-1.636c4.191,3.031,8.768,5.47,13.602,7.249C139.351,251.42,141.289,255.611,139.897,259.392z
     M314.506,173.064c-1.289,11.679-7.552,33.766-22.028,33.766c-1.573,0-3.291-0.227-5.107-0.674
    c-0.628-0.155-1.264-0.334-1.901-0.524c0.924-5.986,1.413-12.116,1.413-18.361c0-11.623-1.674-22.853-4.773-33.476
    c1.877-0.614,3.833-1.216,5.874-1.803c3.076-0.883,6.055-1.331,8.854-1.331c5.718,0,10.384,1.834,13.493,5.305
    C313.862,159.91,315.307,165.822,314.506,173.064z" />
                </g>
              </svg>
              <p><a href="entrenamiento-formulario.php">Rutinas</a></p>
            </div>

          </div>

          <div class="large-banner">

            <h2>Bienvenido Al Panel</h2>
            <a href="https://www.youtube.com/watch?v=9bmycS1c8BM[" title="Explore">
              Dame Un tour
            </a>

          </div>

          <hr>

          <div class="featured-clay">

            <div>

              <div></div>

              <div>
                <h3>Tienda</h3>
                <p>Compra cosas para tu salud mental</p>
              </div>

            </div>

            <div>

              <div></div>

              <div>
                <h3>Zona de Relajamiento</h3>
                <p>¿Buscas un descanso? Este es el sitio ideal</p>
              </div>

            </div>

            <div>

              <div></div>

              <div>
                <h3>Galeria</h3>
                <a href="administrador/galeria/galeria.php"><p>Ver las imagenes mas recientes con las novedades de IK, ¡Ala Madrid! ¡SIUUUUU!</p></a>
              </div>

            </div>

      

          </div>

          <hr>


          <a href="cerrar-sesion.php">Cerrar Sesión</a>
          <br>

  <div class="bot">
        <input id="no" type="checkbox"></input>
        <label for="no"></label>    
        
        <div class="wrapper">
        <div class="title">ChatBot IK</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hola, bienvenido al <br> sistema de soporte IK</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="" required>
                <button id="send-btn">Enviar</button>
            </div>
        </div>
    </div>    
    </div>


   <script>
        $(document).ready(function() {
            $("#send-btn").on("click", function() {
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function(result) {
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                        $(".form").append($replay);
                        // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
          
</body>
</html>