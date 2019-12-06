<?php




if(file_get_contents("php://input")){

    
require_once 'db.php';


$postdata =  json_decode(file_get_contents("php://input"));

$id = mysqli_real_escape_string($connection,$postdata->id);

$query = "SELECT * FROM `links` WHERE `uni_id`='$id'";

//$output = array();
//$data = array();

$run =  mysqli_query($connection,$query);
$num = mysqli_num_rows($run);
$row = mysqli_fetch_array($run);
    $output = array(
                    'id'=>$row['id'],
                    'uni_id' => $row['uni_id'],
                    'name'=>$row['name'],
                    'link' => $row['link'],
                    'date' => $row['date'],
                    'sub_cate' => $row['sub_category'],
                    'par_cate' => $row['main_category'],
                    'desc' => $row['description'],
                    'number' => $row['rating'],
                    'image' => $row['image'],
                    'status' => $row['status']
                 );


//$output = array('total_items'=>$num,'data' => $data);

echo json_encode($output);

}    
else{
   
    header("Location:../../");

}

?>