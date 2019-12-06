<?php

require_once 'db.php';

$formdata = json_decode($_POST['item']);

//$item =  mysqli_real_escape_string($connection,)

//echo json_encode($formdata);


    
$name = mysqli_real_escape_string($connection, $formdata->name);
$link = mysqli_real_escape_string($connection, $formdata->link);
$rating = mysqli_real_escape_string($connection, $formdata->number);
$desc = mysqli_real_escape_string($connection, $formdata->desc);
$par_cate = mysqli_real_escape_string($connection, $formdata->par_cate);
$sub_cate = mysqli_real_escape_string($connection, $formdata->sub_cate);
$uni_id =mysqli_real_escape_string($connection, $formdata->uni_id);


$date = date('Y-m-d');
$rand  = md5(rand());
$status = 'active';


if(isset($_FILES['file'])){

    $target_dir = "../../img/";
    $filename = $_FILES["file"]["name"];
    $tmp = explode('.', $filename);
	$extension = end($tmp);
    $newfilename = $rand . "." . $extension;
    $target_file = $target_dir . basename($newfilename);

    $query = "UPDATE `links` SET `name`='$name', `description`='$desc', 
                            `link`='$link', `rating`='$rating', `main_category`='$par_cate', `sub_category`='$sub_cate',
                            `image`='$newfilename'  WHERE `uni_id`='$uni_id'";

    // $query = "INSERT INTO `links`(uni_id,name,description,date,link,rating,main_category,sub_category,image,status) 
    // VALUES('$rand','$name','$desc','$date','$link','$rating','$par_cate','$sub_cate','$newfilename','$status')";

    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) && mysqli_query($connection,$query)){
        echo '0';
    }else{
    echo '1';
    }

}else{

    //$newfilename = 'noimage.png';

    $query = "UPDATE `links` SET `name`='$name', `description`='$desc', 
    `link`='$link', `rating`='$rating', `main_category`='$par_cate', `sub_category`='$sub_cate'  WHERE `uni_id`='$uni_id'";

    // $query = "INSERT INTO `links`(uni_id,name,description,date,link,rating,main_category,sub_category,image,status) 
    // VALUES('$rand','$name','$desc','$date','$link','$rating','$par_cate','$sub_cate','$newfilename','$status')";

    if(mysqli_query($connection,$query)){
        echo '0';
    }else{
    echo '1';
    }

}

?>