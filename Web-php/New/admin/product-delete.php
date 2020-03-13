<?php include 'header.php';

     $id = $_GET['id'];
     
     $sql = "DELETE FROM product WHERE id= $id";
     
     if ($conn->query($sql)) {

     	header('location: product.php');
     }else{
     	echo $conn->error;
     }
?>