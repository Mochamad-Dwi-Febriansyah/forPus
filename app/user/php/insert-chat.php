<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "../../../config/koneksi.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($koneksi, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($koneksi, $_POST['message']);
    $default = "Belum dibaca";
    // var_dump($_POST);
    if (!empty($message)) {
        $sql = mysqli_query($koneksi, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, status)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$default}')") or die();
    }
} else {
    header("location: ../../masuk");
}
