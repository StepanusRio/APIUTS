<?php
include '../connection.php';
header('content-type:application/json');

$emailInput = $_POST["email"];
$passwordInput = md5($_POST["password"]);
$datauser = array();

$msg = "";
$status = 0;

$sql = "SELECT * FROM user WHERE email='" . $emailInput . "'AND password='" . $passwordInput . "'";

$query = mysqli_query($conn, $sql);

$data = mysqli_fetch_object($query);

if (!$data) {
  $status = 0;
  $msg = "Login Gagal Silahkan Cek Data Kembali";
} else {
  $status = 1;
  $msg = "Login Sukses";
  $datauser = array('username' => $data->username, 'email' => $data->email);
}

echo json_encode(array('status' => $status, 'message' => $msg, 'data' => $datauser));
