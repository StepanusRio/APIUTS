<?php
include "./connection.php";
header("content-type:application/json");
$province_id = $_GET["province_id"];
$sql = "SELECT * FROM tb_pro_cities WHERE province_id=$province_id";
$hasil = mysqli_query($conn, $sql);
$result = array();
while ($data = mysqli_fetch_object($hasil)) {
  array_push($result, array('city_id' => $data->city_id, 'province_id' => $data->province_id, 'city_name' => $data->city_name, 'postal_code' => $data->postal_code));
}

echo json_encode(array('result' => $result));
