<?php
include_once "../../../config/koneksi.php";
$data = array();
$sql = "SELECT *  FROM discussion ORDER BY id desc";
$result = mysqli_query($koneksi, $sql);
while($row = mysqli_fetch_assoc($result)){
        array_push($data, $row);
        array_push($data);
}

echo json_encode($data);
$koneksi = null;
exit();



