<?php
include "./connection.php";
header("content-type:application/json");
$sql = "SELECT * FROM tb_pro_provinces";
$hasil = mysqli_query($conn, $sql);
$result = array();
while ($data = mysqli_fetch_object($hasil)) {
  array_push($result, array('province_id' => $data->province_id, 'province_name' => $data->province_name));
}

echo json_encode(array('result' => $result));
