<?php

require_once 'db.php';

$query = "SELECT * FROM `user`";

$output = array();
$data = array();

$run =  mysqli_query($connection,$query);
$num = mysqli_num_rows($run);

while($row = mysqli_fetch_array($run)){
    $data[] = array(
                    'id'=>$row['id'],
                    'uni_id' => $row['uni_id'],
                    'name'=>$row['name'],
                    'email' => $row['email'],
                    'date' => $row['date'],
                    'username' => $row['username'],
                    'role' => $row['role'],
                    'status' => $row['status']
                 );
}

$output = array('total_users'=>$num,'data' => $data);

echo json_encode($output);

?>