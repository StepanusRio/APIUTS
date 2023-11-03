<?php
include "connection.php";
header("content-type:application/json");

$sql = "SELECT * FROM tbl_buku";
$query = mysqli_query($conn, $sql);
$result = array();
$no = 0;

while ($data = mysqli_fetch_object($query)) {
  array_push($result, array(
    'isbn' => $data->isbn,
    'judul' => $data->judul,
    'penulis' => $data->penulis,
    'penerbit' => $data->penerbit,
    'tahun' => $data->tahun,
    'jmlhalaman' => $data->jmlhalaman,
    'harga' => $data->harga,
  ));
}

echo json_encode(array('result' => $result));
