<?php


include_once 'db.php';

$formdata = json_decode($_POST['catereq']);

//echo json_encode($formdata);

if (isset($_FILES['file'])) {


    //echo $_FILES['file']['type'];
    $menu = mysqli_real_escape_string($connection, $formdata->menu);
    $parent = mysqli_real_escape_string($connection, $formdata->parent);
    $position = mysqli_real_escape_string($connection, $formdata->position);
    $updateId = @$formdata->updateId;
    if(!isset($formdata->sub_type) && !isset($formdata->sub_type)){
        $sub_type = 'no';
        $parent_id = 'no';
    }else{
        $sub_type = mysqli_real_escape_string($connection, $formdata->sub_type);
        $parent_id = mysqli_real_escape_string($connection, $formdata->parent_id);
    }
    $status ='active';
    $rand = md5(rand());
	$target_dir = "../../img/";
    $filename = $_FILES["file"]["name"];
    $tmp = explode('.', $filename);
	$extension = end($tmp);
    $newfilename = $rand . "." . $extension;
    $target_file = $target_dir . basename($newfilename);

    if(!isset($updateId)){
    $sql = "SELECT * FROM `category` WHERE name='$menu'";

    $run = mysqli_query($connection,$sql);
    $num = mysqli_num_rows($run);


    if($num > 0){
        echo 'Already Exists';
    }else{

        $query = "INSERT INTO `category`(name,sub_type,parent,position,image,status,parent_id) 
        VALUES('$menu','$sub_type','$parent','$position','$newfilename','$status','$parent_id')";

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) && mysqli_query($connection,$query)){
            echo '0';
        }else{
        echo '1';
        }
    
    }

}else{
    $query = "UPDATE `category` SET `name`='$menu',`parent`='$parent',`position`='$position',`image`='$newfilename',`parent_id`='$parent_id' WHERE `id`='$updateId'";

    $query2 = "UPDATE `category` SET `parent`='$menu' WHERE `parent_id`='$updateId'";

    if($parent == 'yes'){
        if(mysqli_query($connection,$query) && mysqli_query($connection,$query2) ){
            echo '00';
            }else{
            echo '1';
            }

    }else{
        if(mysqli_query($connection,$query)){
            echo '0';
            }else{
            echo '1';
            }
    }
}
    
    


}else{
    $menu = mysqli_real_escape_string($connection, $formdata->menu);
    $parent = mysqli_real_escape_string($connection, $formdata->parent);
    $position = mysqli_real_escape_string($connection, $formdata->position);
    $updateId = @$formdata->updateId;
    $status ='active';
    if(!isset($formdata->sub_type) && !isset($formdata->parent_id)){
        $sub_type = 'no';
        $parent_id = 'no';
    }else{
        $sub_type = mysqli_real_escape_string($connection, $formdata->sub_type);
        $parent_id = mysqli_real_escape_string($connection, $formdata->parent_id);
    }
    
    $newfilename = 'noimage.png';

    if(!isset($updateId)){

        
    $sql = "SELECT * FROM `category` WHERE name='$menu'";

    $run = mysqli_query($connection,$sql);
    $num = mysqli_num_rows($run);


    if($num > 0){
        echo 'Already Exists';
    }else{

    $query = "INSERT INTO `category`(name,sub_type,parent,position,image,status,parent_id) 
    VALUES('$menu','$sub_type','$parent','$position','$newfilename','$status','$parent_id')";

    if(mysqli_query($connection,$query)){
    echo '0';
    }else{
    echo '1';
    }

}

    }else{
        //echo 'sorry';

            $query = "UPDATE `category` SET `name`='$menu',`parent`='$parent',`position`='$position',`parent_id`='$parent_id' WHERE `id`='$updateId'";
             $query2 = "UPDATE `category` SET `parent`='$menu' WHERE `parent_id`='$updateId'";

                if($parent == 'yes'){
                    if(mysqli_query($connection,$query) && mysqli_query($connection,$query2) ){
                        echo '00';
                        }else{
                        echo '1';
                        }

                }else{
                    if(mysqli_query($connection,$query)){
                        echo '0';
                        }else{
                        echo '1';
                        }
                }
            


    }


}


?>