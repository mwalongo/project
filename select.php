<?php
include('connection2.php');


$query ="SELECT * FROM 	userlogin ORDER BY id DESC";
$stmnt = $connect->prepare($query);

if($stmnt->excecute()){
    while($row =$stmnt->fetch(PDO::FETCH_ASSOC)){
        $data[] =$row;
        echo json_encode($data);
    }

}
?>