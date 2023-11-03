<?php
include "connection.php";
header("content-type:application/json");

$isbn = $_POST["isbn"];

$getresult = 0;
$message = "";
$cek = "SELECT * FROM tbl_buku WHERE isbn='$isbn'";

$hasil = mysqli_fetch_object($cekisbn = mysqli_query($conn, $cek));
if (!$hasil) {
  $getresult = 0;
  $message = "Masukan ISBN";
} else {
  $query = "DELETE FROM tbl_buku WHERE isbn='$isbn'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $getresult = 1;
    $message = "Delete Berhasil";
  } else {
    $getresult = 0;
    $message = "Delete Gagal : " . mysqli_error($conn);
  }
}

echo json_encode(array("result" => $getresult, "message" => $message));
