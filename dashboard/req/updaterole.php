<?php



if(file_get_contents("php://input")){

   
    include_once 'db.php';

     $updateRole =  json_decode(file_get_contents("php://input"));

     $role = mysqli_real_escape_string($connection,$updateRole->role);

    $uid = mysqli_real_escape_string($connection,$updateRole->uid);

    $query = "UPDATE `user` SET `role`='$role' WHERE uni_id='$uid'";

    if(mysqli_query($connection,$query)){
        echo 0;
    }else{
        echo 1;
    }


}else{
    
    header("Location:../../");
}

?>