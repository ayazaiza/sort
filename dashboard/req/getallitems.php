<?php

require_once 'db.php';

$query = "SELECT * FROM `links`";

$output = array();
$data = array();

$run =  mysqli_query($connection,$query);
$num = mysqli_num_rows($run);

while($row = mysqli_fetch_array($run)){
    $data[] = array(
                    'id'=>$row['id'],
                    'uni_id' => $row['uni_id'],
                    'name'=>$row['name'],
                    'link' => $row['link'],
                    'date' => $row['date'],
                    'sub_category' => $row['sub_category'],
                    'main_category' => $row['main_category'],
                    'description' => $row['description'],
                    'rating' => $row['rating'],
                    'image' => $row['image'],
                    'status' => $row['status']
                 );
}

$output = array('total_items'=>$num,'data' => $data);

echo json_encode($output);

?>