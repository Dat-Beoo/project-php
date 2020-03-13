<?php 
header("content-Type:application/json");

include '../../config/connect.php';
$sql = "SELECT *FROM product Order By id DESC";
$res = $conn->query($sql);

$result = [];
foreach ($res as $key => $pro) {
	$result[] = $pro;
}
echo json_encode($result);
?>