<?php
include '../connection.php';
header('content-type:application/json');

$username = $_POST["username"];
$passwordInput = md5($_POST["password"]);

$sql = "UPDATE user set password='$passwordInput' WHERE username='$username'";
$hasil = mysqli_query($conn, $sql);
if ($hasil) {
  $getresult = 1;
  $message = "Update Berhasil";
} else {
  $getresult = 0;
  $message = "Update Gagal : ";
}

echo json_encode(array("result" => $getresult, "message" => $message));