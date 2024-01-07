<?php
include "./connection.php";
header("content-type:application/json");

$username = $_POST["username"];
$email = $_POST["email"];
$alamat = $_POST["alamat"];
$image = $_POST["image"];
$kota = $_POST["kota"];
$provinsi = $_POST["provinsi"];
$kode_pos = $_POST["kode_pos"];

$sql = "UPDATE user SET email='$email',alamat='$alamat',image='$image',kota='$kota',provinsi='$provinsi',kode_pos='$kode_pos' WHERE username='$username'";

$hasil = mysqli_query($conn, $sql);
if ($hasil) {
  $getresult = 1;
  $message = "Update Berhasil";
} else {
  $getresult = 0;
  $message = "Update Gagal : ";
}

echo json_encode(array("result" => $getresult, "message" => $message));
