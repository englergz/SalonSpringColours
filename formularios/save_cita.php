<?php
    include_once "../class/base_de_datos.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="icon" type="image/png" href="../img/icons/logo.ico" />
        <title>Agendar Cita</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src="./js/jquery-3.3.1.slim.min.js"></script>
        <script src='./js/jquery-3.5.1.min.js'></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </head>
    <body>
    <br/><br/>
        <div class="container"> 
        <?php

            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $cellular = $_POST['cellular'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];

            $ok = false;

            if(strlen($email) == 0 ){
                $ok = false;
            }
            else{ 
                    if(strlen($nombre) == 0){
                        $ok = false;
                    }else{
                            $sentecia = $base_de_datos->prepare("INSERT INTO public.agenda(nombre, email, celular, fecha, hora) VALUES (:nombre, :email, :cellular, :fecha, :hora);");
                            $sentecia->bindValue(':nombre', $nombre, PDO::PARAM_STR);
                            $sentecia->bindValue(':email', $email, PDO::PARAM_STR);
                            $sentecia->bindValue(':cellular', $cellular, PDO::PARAM_STR);
                            $sentecia->bindValue(':fecha', $fecha, PDO::PARAM_STR);
                            $sentecia->bindValue(':hora', $hora, PDO::PARAM_STR);

                            try {
                                $sentecia->execute();
                                $res = $sentecia->fetchAll(PDO::FETCH_OBJ);                
                                $ok = true;
                            }
                            catch(Exception $e){
                                $ok = false;
                            }
                            //var_dump($res);
                        }
            }

            if($ok==true){
                echo '<div class="alert alert-success" role="alert">Su registro está pendiente, pronto le enviaremos un Email a la cuenta '.$_POST['email'].' confirmando la reserva.</div>';
            }
            else {
                echo '<div class="alert alert-danger" role="alert"> No fue posible registrar la cita.</div>';
            }                  
        ?>                   
        </div>
    </body>
</html>