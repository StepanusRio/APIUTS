<?php
include "./connection.php";
header("content-type:application/json");

$idOrder = $_POST["idOrder"];
$imageProof = $_POST["imageProof"];

$sql = "UPDATE tb_pro_checkout SET imageProof='$imageProof',StatusPayment='Diproses' WHERE idOrder='$idOrder'";

$hasil = mysqli_query($conn,$sql);

if ($hasil) {
  $getresult = 1;
  $message = "Update Berhasil";
} else {
  $getresult = 0;
  $message = "Update Gagal : ";
}

echo json_encode(array("result" => $getresult, "message" => $message));
