<?php



if(file_get_contents("php://input")){

    include_once 'db.php';

     $postdata =  json_decode(file_get_contents("php://input"));

     $id = mysqli_real_escape_string($connection,$postdata->id);

     $del ="DELETE FROM `category` WHERE `id`='$id'";


     if(mysqli_query($connection,$del)){

         echo '0';

     }else{
          echo '1';
     }






}else{
    
    header("Location:../../");
}


?>