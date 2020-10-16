<?php
    include_once "../class/base_de_datos.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="icon" type="image/png" href="../img/icons/logo.ico" />
        
        <title>Inscripciones</title>
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
    include_once "../class/base_de_datos.php";

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $ok = false;

            if(strlen($email) == 0 ){
                $ok = false;
            }
            else{ 
                    if(strlen($nombre) == 0){
                        $ok = false;
                    }else{

                            $sentecia = $base_de_datos->prepare("INSERT INTO public.newsletter(nombre, email) VALUES ( :nombre, :email);");
                            $sentecia->bindValue(':nombre', $nombre, PDO::PARAM_STR);
                            $sentecia->bindValue(':email', $email, PDO::PARAM_STR);

                            try {
                                $sentecia->execute();
                                $res = $sentecia->fetchAll(PDO::FETCH_OBJ);                
                                $ok = true;
                            }
                            catch(Exception $e){
                                $ok = false;
                            }
                        }
                }

    if($ok==true){
        echo '<div class="alert alert-success" role="alert">La inscripción se realizó con éxito, hemos enviado un e-mail a la cuenta '.$_POST['email'].'</div>';
    }
    else {
        echo '<div class="alert alert-danger" role="alert"> No fue posible guardar su registro!</div>';
    }   
?>