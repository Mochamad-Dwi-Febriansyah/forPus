<?php
    session_start();
    include_once "../../../config/koneksi.php";

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($koneksi, $_POST['searchTerm']);

    $sql = "SELECT * FROM user WHERE NOT unique_id = {$outgoing_id} AND (fullname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>