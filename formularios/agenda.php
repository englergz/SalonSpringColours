<?php
    include_once "../class/base_de_datos.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="icon" type="image/png" href="../img/icons/logo.ico" />
        <title>Spring Colours | Agenda</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="icon" type="image/png" href="../img/icons/lOGO.ico" />
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
              <div class="col-sm-6 text-center justify-content-center align-self-center">
                <h1>
                    Listado de Citas
                </h1>
                <p><br>Si tu cita ya fue confirmada y aún no la ves en este listado, por favor, ponte en contacto con nosotros, gracias. <br></p>
              </div>
              <div class="col-sm-6">
                <img src="../img/icons/lOGO.ico" class="img-fluid d-none d-sm-block">
              </div>
            </div>
          </div>
        </div>
      </header>

      <section class="m5 text-center  text-white">
    <div class="d-flex flex-row justify-content-center">
      <div class="p-3">
        <a href="http://www.facebook.com/salonspringcolours" target="_blank"><i class="fab fa-facebook-f"></i></a>
      </div>
      <div class="p-3">
        <a href="http://www.instagram.com/salonspringcolours" target="_blank"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    </section>

    <br/><br/>
        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead>
                    <tr class="bg-danger">
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Ver más...</th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php        

                        $sentecia = $base_de_datos->prepare("SELECT * FROM public.agenda;");
                        
                        try {
                            $sentecia->execute();
                            $res = $sentecia->fetchAll(PDO::FETCH_OBJ);  
                            //var_dump($res);  
                            for ($i=0; $i < sizeof($res); $i++) { 

                                echo "<tr>";
                                echo "<td>".$res[$i]->nombre."</td>";
                                echo "<td>".$res[$i]->fecha."</td>";
                                echo "<td>".$res[$i]->hora."</td>";
                                echo "<td><a href='./detalle_cita.php?id=".$res[$i]->id."'>Ver detalle</a></td>";
                                echo "</tr>";
                            }                  
                        }
                        catch(Exception $e){
                            
                        }                          
                    ?>           
                </tbody>
            </table>                
        </div>

        <div>
        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br> <br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br> <br>
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