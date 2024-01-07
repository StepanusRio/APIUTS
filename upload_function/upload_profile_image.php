<?php
$BASE_URL_IMAGE = "../images/user/";
$FILENAME = "img" . date("YmdHis") . rand(9, 999) . ".jpg";
$res = array();
$kode = "";
$pesan = "";
$imageUploaded = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_FILES["imageUploadProfile"]) {
    $DESTINATION = $BASE_URL_IMAGE . $FILENAME;
    if (move_uploaded_file($_FILES["imageUploadProfile"]["tmp_name"], $DESTINATION)) {
      $kode = 1;
      $pesan = "Upload Sukses";
      $imageUploaded = $FILENAME;
    } else {
      $kode = 0;
      $pesan = "Upload Gagal";
    }
  } else {
    $kode = 0;
    $pesan = "Request Error";
  }
} else {
  $kode = 0;
  $pesan = "Request Invalid";
}

$res["kode"] = $kode;
$res["pesan"] = $pesan;
$res["imageUploaded"] = $imageUploaded;

echo json_encode($res);
