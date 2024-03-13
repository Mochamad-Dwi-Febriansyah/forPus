<?php
session_start();

include_once "../../config/koneksi.php"; 

$status = "Offline now";
$sql2 = mysqli_query($koneksi, "UPDATE user SET status = '{$status}' WHERE unique_id = {$_SESSION['unique_id']}");

if($sql2){
    unset($_SESSION['id_user']); 
    unset($_SESSION['unique_id']);
    unset($_SESSION['fullname']);
    unset($_SESSION['username']);
    unset($_SESSION['status']); 

    $_SESSION['berhasil_keluar'] = "Anda telah berhasil keluar !!";
    header("location: ../../masuk");
}

