<?php
include '../connection.php';
header("content-type:application/json");

$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

$getstatus = 0;
$getresult = 0;
$message = "";

$sql = "SELECT * FROM user WHERE email='$email'";
$hasil = mysqli_query($conn, $sql);
if ($hasil = mysqli_fetch_object($hasil)) {
  $getstatus = 0;
  $message = "User Sudah terdaftar";
} else {
  $getstatus = 1;
  $sql = "insert into user(username,email,password) values ('$username','$email',md5('$password'))";
  $hasil = mysqli_query($conn, $sql);
  if ($hasil) {
    $getresult = 1;
    $message = "Simpan Berhasil";
  } else {
    $getresult = 0;
    $message = "Simpan Gagal : " . mysqli_error($conn);
  }
}

echo json_encode(array("status" => $getstatus, "result" => $getresult, "message" => $message));