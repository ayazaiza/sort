<?php


if(file_get_contents("php://input")){

 include_once 'db.php';

 $postdata =  json_decode(file_get_contents("php://input"));
 $id = mysqli_real_escape_string($connection,$postdata->req);
 $parent = mysqli_real_escape_string($connection,$postdata->par);

 $query = "SELECT * FROM `category` WHERE $parent='$id' ORDER BY `id` DESC";

 $output = array();

 $run = mysqli_query($connection,$query);

 while($row = mysqli_fetch_array($run)){

     $output[] = array(
                        'id' => $row['id'],
                        'name' => $row['name'],
                        'sub_type'=>$row['sub_type'],
                        'parent'=>$row['parent'],
                        'position'=>$row['position'],
                        'parent_id' =>$row['parent_id'],
                        'status' => $row['status'],
                        'image'=>$row['image']
                );
 }

     echo json_encode($output);
     
}else{
   
    header("Location:../../");

}

?>