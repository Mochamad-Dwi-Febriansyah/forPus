<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($koneksi, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        // var_dump($row2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
        $kode_penerima = $row['unique_id'];
        $kode_pengirim = $_SESSION['unique_id'];
        // var_dump($kode_pengirim);
        $default = "Belum dibaca";
        $query_pesan  = mysqli_query($koneksi, "SELECT * FROM messages WHERE outgoing_msg_id = '$kode_penerima' AND incoming_msg_id= '$kode_pengirim'  AND status = '$default'");
        $jumlah_pesan = mysqli_num_rows($query_pesan);
        // var_dump($jumlah_pesan);

        if($jumlah_pesan > 0){
            $output .= '<a href="chat?user_id='. $row['unique_id'] .'" style="display: flex; justify-content: space-between">
                        <div class="contentt" style="display: flex;gap: 2rem; color: black">
                        <img src="php/images/3.jpeg" alt="">
                        <div class="details">
                            <span>'. $row['fullname'].'</span>
                            <p>'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '. $offline .'"><span style="margin: 5px">'.$jumlah_pesan.'</span><i class="fas fa-circle"></i></div>
                    </a>';
        }else{
            $output .= '<a href="chat?user_id='. $row['unique_id'] .'" style="display: flex; justify-content: space-between">
                        <div class="contentt" style="display: flex;gap: 2rem; color: black">
                        <img src="php/images/3.jpeg" alt="">
                        <div class="details">
                            <span>'. $row['fullname'].'</span>
                            <p>'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                    </a>';

        }
    }
?>