<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "../../../config/koneksi.php"; 
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($koneksi, $_POST['incoming_id']);
    // var_dump($incoming_id);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN user ON user.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($koneksi, $sql); 
 
    
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $status = "Sudah dibaca"; 
            $kode_pengirim = $row['unique_id'];
            $query_pesan = mysqli_query($koneksi, "UPDATE messages SET status = '{$status}' WHERE incoming_msg_id = {$_SESSION['unique_id']} AND outgoing_msg_id= '$kode_pengirim'"); 
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="php/images/1.jpeg" alt="">
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
    }
    echo $output;
} else {
    header("location: ../../masuk");
}
