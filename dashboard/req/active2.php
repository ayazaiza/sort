<?php



if(file_get_contents("php://input")){

    include_once 'db.php';

     $postdata =  json_decode(file_get_contents("php://input"));

     $id = mysqli_real_escape_string($connection,$postdata->uni_id);
     $st = mysqli_real_escape_string($connection,$postdata->status);

    // $del ="DELETE FROM `category` WHERE `id`='$id'";
    if($st == ''){
        $status ='active';

    }else if($st == 'active'){
        
        $status ='deactive';
    }else {
        $status ='active';
    }
    


     $update = "UPDATE `links` SET `status`='$status' WHERE `uni_id`='$id'";


     if(mysqli_query($connection,$update)){

         echo '0';

     }else{
          echo '1';
     }






}else{
    
    header("Location:../../");
}


?>