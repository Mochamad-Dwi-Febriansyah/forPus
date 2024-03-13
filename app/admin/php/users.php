<?php
    session_start();
    include_once "../../../config/koneksi.php";
    $outgoing_id = $_SESSION['unique_id'];
    // var_dump($_SESSION);
    $sql = "SELECT * FROM user WHERE NOT unique_id = {$outgoing_id} ORDER BY id_user DESC";
    $query = mysqli_query($koneksi, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>