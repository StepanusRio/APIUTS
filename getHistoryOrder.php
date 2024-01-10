<?php
include "./connection.php";
header("content-type:application/json");

$username = $_GET["username"];
$sql = "SELECT * FROM tb_pro_checkout WHERE username = '$username' ORDER BY StatusPayment ASC";
$query = mysqli_query($conn,$sql);
$result = array();
while ($data = mysqli_fetch_object($query)){
  array_push($result,array(
    'idOrder'=>$data->idOrder,
    'username'=>$data->username,
    'Alamat'=>$data->Alamat,
    'Kota'=>$data->Kota,
    'Provinsi'=>$data->Provinsi,
    'Subtotal'=>$data->Subtotal,
    'Ongkir'=>$data->Ongkir,
    'TotalHarga'=>$data->TotalHarga,
    'PaymentMethod'=>$data->PaymentMethod,
    'TanggalCheckout'=>$data->TanggalCheckout,
    'StatusPayment'=>$data->StatusPayment,
    'imageProof'=>$data->imageProof
  ));
}

echo json_encode($result);