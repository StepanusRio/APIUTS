<?php
include "connection.php";
header("content-type:application/json");

$isbn = $_POST["isbn"];
$judul = $_POST["judul"];
$penulis = $_POST["penulis"];
$penerbit = $_POST["penerbit"];
$tahun = $_POST["tahun"];
$jmlhalaman = $_POST["jmlhalaman"];
$harga = $_POST["harga"];

$sql = "SELECT * FROM tbl_buku WHERE isbn='$isbn'";
$cekisbn = mysqli_query($conn, $sql);

if ($cekisbn = mysqli_fetch_object($cekisbn)) {
  $getstatus = 0;
  $message = "Buku Sudah Terdaftar";
} else {
  $getstatus = 1;
  $sql = "INSERT INTO tbl_buku(isbn,judul,penulis,penerbit,tahun,jmlhalaman,harga)VALUES(
    '$isbn',
    '$judul',
    '$penulis',
    '$penerbit',
    '$tahun',
    '$jmlhalaman',
    '$harga'
  )";
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
