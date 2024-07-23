<?php
if (isset($_GET['view_contacto'])) {
    require '../../../../bd/dbcon.php';

    $query = "SELECT * FROM contacto";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $contacto = mysqli_fetch_assoc($query_run);

           $res = [
            'status' => 200,
            'message' => 'Contacto Encontrado',
            'data' => $contacto,
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Contacto nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['editar_contacto'])) {
    require '../../../../bd/dbcon.php';
    $localizacao = mysqli_real_escape_string($con, $_POST['localizacao']);
    $morada = mysqli_real_escape_string($con, $_POST['morada']);
    $telemovel = mysqli_real_escape_string($con, $_POST['telemovel']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $facebook = mysqli_real_escape_string($con, $_POST['facebook']);
    $twitter = mysqli_real_escape_string($con, $_POST['twitter']);
    $instagram = mysqli_real_escape_string($con, $_POST['instagram']);


   
     $query = "UPDATE contacto set morada = '$morada',  telemovel = '$telemovel',  email = '$email',  localizacao = '$localizacao',  facebook = '$facebook',  twitter = '$twitter',  instagram = '$instagram'";
    
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Contacto editado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

?>