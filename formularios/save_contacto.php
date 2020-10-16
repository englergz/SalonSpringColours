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

            $nom = $_POST['nom'];
            $correo = $_POST['correo'];
            $mensaje = $_POST['mensaje'];

            $ok = false;
           
                            $sentecia = $base_de_datos->prepare("INSERT INTO public.contacto(nombre, email, mensaje) VALUES (:nom, :correo, :mensaje);");
                            $sentecia->bindValue(':nom', $nom, PDO::PARAM_STR);
                            $sentecia->bindValue(':correo', $correo, PDO::PARAM_STR);
                            $sentecia->bindValue(':mensaje', $mensaje, PDO::PARAM_STR);
                            try {
                                $sentecia->execute();
                                $res = $sentecia->fetchAll(PDO::FETCH_OBJ);                
                                $ok = true;
                            }
                            catch(Exception $e){
                                $ok = false;
                            }
         
            if($ok == true){
                echo '<div class="alert alert-success" role="alert">Gracias por escribirnos, pronto nos pondremos en contacto contigo, por medio de la cuenta '.$_POST['correo'].'</div>';
            }
            else {
                echo '<div class="alert alert-danger" role="alert"> No fue posible el envio, por favor intente mas tarde!</div>';
            }                  
        ?>                   
        </div>
    </body>
</html>