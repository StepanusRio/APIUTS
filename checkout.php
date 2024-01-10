<?php
include "./connection.php";
header("content-type:application/json");

$idOrder = $_POST['idOrder'];
$Alamat = $_POST['Alamat'];
$Kota = $_POST['Kota'];
$Provinsi = $_POST['Provinsi'];
$Subtotal = $_POST['Subtotal'];
$Ongkir = $_POST['Ongkir'];
$TotalHarga = $_POST['TotalHarga'];
$PaymentMethod = $_POST['PaymentMethod'];
$TanggalCheckout = $_POST['TanggalCheckout'];
$StatusPayment = $_POST['StatusPayment'];
$username = $_POST['username'];
$imageProof = $_POST["imageProof"];
$sql = "INSERT INTO tb_pro_checkout (
idOrder,
username,
Alamat,Kota,
Provinsi,
Subtotal,
Ongkir,
TotalHarga,
PaymentMethod,
TanggalCheckout,
StatusPayment,imageProof) VALUES(
'$idOrder',
'$username',
'$Alamat',
'$Kota',
'$Provinsi',
$Subtotal,
$Ongkir,
$TotalHarga,
'$PaymentMethod'
,'$TanggalCheckout'
,'$StatusPayment',
'$imageProof')";

$hasil = mysqli_query($conn, $sql);

if ($hasil) {
  $getresult = 1;
  $message = "Berhasil Checkout";
} else {
  $getresult = 1;
  $message = "Gagal Checkout";
}

echo json_encode(array("result" => $getresult, "message" => $message));
