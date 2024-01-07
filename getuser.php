<?php
include "./connection.php";
header("content-type:application/json");

$username = $_GET["username"];
$sql = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($conn, $sql);
$result = array();
$no = 0;

while ($data = mysqli_fetch_object($query)) {
  array_push($result, array(
    'username' => $data->username,
    'email' => $data->email,
    'password' => $data->password,
    'status' => $data->status,
    'alamat' => $data->alamat,
    'image' => $data->image,
    'kota' => $data->kota,
    'provinsi' => $data->provinsi,
    'kode_pos' => $data->kode_pos,
  ));
}

echo json_encode(array('result' => $result));
