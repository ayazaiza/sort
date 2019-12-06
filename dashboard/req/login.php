<?php


if(file_get_contents("php://input")){

    require_once 'db.php';
    

    $postdata =  json_decode(file_get_contents("php://input"));
  
    $uname = mysqli_real_escape_string($connection,$postdata->uname);
     
    $pwd = mysqli_real_escape_string($connection,$postdata->pwd);

    $md = md5($pwd);

    $query =  "SELECT * FROM `user` WHERE `username`='$uname' AND `pwd`='$md'";

    $run = mysqli_query($connection,$query);
    $num =  mysqli_num_rows($run);

    if($num > 0 ){
        // session_start();

        $fetch = mysqli_fetch_array($run);
        $output = array('status' => $fetch['status'],
                      'role' => $fetch['role'],
                        'id' => $fetch['uni_id'],
                        'uname' => $uname);
        // header('Location:index.php');

        echo json_encode($output);


    }else{

        echo 1;
       
        // session_start();
        // session_unset();
        // session_destroy();

    }

}else{
    
    header("Location:../");

}

?>