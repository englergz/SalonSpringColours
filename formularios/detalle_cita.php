<?php
    include_once "../class/base_de_datos.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="icon" type="image/png" href="../img/icons/logo.ico" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
        <title>Spring Colours | Cita</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="../img/icons/LOGO.ico" width="30" height="30" class="d-inline-block align-top" alt="">
            Salón Spring Colours
          </a>
        </div>
      </nav>
      <header class="main-header">
        <div class="background-overlay text-white py-5">
          <div class="container">
            <div class="row d-flex h-100">
                <div class="col-sm-6  justify-content-center align-self-center">
                    <h1>Detalle de la cita:</h1>
                    <p><br>
                    
                    <?php  

                        $sentecia = $base_de_datos->prepare("SELECT * FROM public.agenda WHERE id = :id;");
                        $sentecia->bindValue(':id', $_GET['id'], PDO::PARAM_STR);

                        try {
                            $sentecia->execute();
                            $res = $sentecia->fetchAll(PDO::FETCH_OBJ);  
                            
                            echo '<div class="col-sm-18">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">Nombre: '.$res[0]->nombre.'</h5>';                            
                            echo '<p class="card-text">';
                            echo '<b>Email: </b>'.$res[0]->email.'<br/>';
                            echo '<b>Celular : </b>'.$res[0]->celular.'<br/>';
                            echo '<b>Fecha : </b>'.$res[0]->fecha.'<br/>';
                            echo '<b>Hora: </b>'.$res[0]->hora.'<br/>';                   
                            echo '</p></div></div>';
                        }
                        catch(Exception $e){
                            
                        }                          
                    ?>     
                    <br></p>

                </div>
                <div class="col-sm-6">
                    <img src="../img/icons/lOGO.ico" class="img-fluid d-none d-sm-block">
                </div>
            </div>
          </div>
        </div>
      </header>

        <div class="d-flex flex-row justify-content-center">

        <div class="p-3">
            <a href="http://www.facebook.com/salonspringcolours" target="_blank"><i class="fab fa-facebook-f"></i></a>
        </div>

        <div class="p-3">
            <a href="http://www.instagram.com/salonspringcolours" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>

        </div>

        <div>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br> <br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br> <br><br><br><br><br> <br> <br>
        </div>


      <footer class="bg-danger">
      <div class="container p-5">
        <div class="row text-center text-white">
          <div class="col ml-auto  text-white">
          <p> Salón Spring Colours® <br> Todos los derechos reservados <br> Copyright &copy; 2020<br>salonspringcolours@gmail.com</p>
          </div>
        </div>
      </div>       
    </footer>
       
    </body>
</html>