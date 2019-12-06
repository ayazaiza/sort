<?php



if(file_get_contents("php://input")){

    include_once 'db.php';

     $postdata =  json_decode(file_get_contents("php://input"));

     $fname = mysqli_real_escape_string($connection,$postdata->fname);
     
     $lname = mysqli_real_escape_string($connection,$postdata->lname);
     
     $email = mysqli_real_escape_string($connection,$postdata->email);
     
     $role = mysqli_real_escape_string($connection,$postdata->role);
     
     $pwd = mysqli_real_escape_string($connection,$postdata->pwd);
     
     $uname = mysqli_real_escape_string($connection,$postdata->uname);
     $uni_id = md5(rand());

     $mdp = md5($pwd);
     
     $fullname = $fname.' '.$lname;
     $date = date('Y-m-d');
     $status = "active";

     $search1 = "SELECT * FROM `user` WHERE `email` = '$email'";
     $search2 = "SELECT * FROM `user` WHERE `username` = '$uname'";

     $r1 = mysqli_num_rows(mysqli_query($connection,$search1));
     $r2 = mysqli_num_rows(mysqli_query($connection,$search2));

     if($r1 > 0){

        echo $email;

     }else if($r2 > 0){
         
        echo $uname;

     }else{

        $insert = "INSERT INTO `user` (uni_id,name,email,username,pwd,role,date,status)
                        VALUES('$uni_id','$fullname','$email','$uname','$mdp','$role','$date','$status')";
            if(mysqli_query($connection,$insert)){
                    echo '0';
            }else{
                echo '1';
            }


     }

    

}else{
    
    header("Location:../../");
}


?>