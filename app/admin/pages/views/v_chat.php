
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Pesan
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
            </small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pesan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content khusus-center">
        <div class="row">
            <div class="col-xs-8"> 

                        <div class="wrappers">
                        <section class="chat-area">
                          <header>
                            <?php 
                            $url = parse_url($_SERVER['REQUEST_URI']);
                            parse_str($url['query'], $params);
                            // var_dump($params['user_id']); 
                            $user_id = mysqli_real_escape_string($koneksi, $params['user_id']); 
                            $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE unique_id = {$user_id}");

                            // $kode_saya = $_SESSION['unique_id'];
                            // $status = "Sudah dibaca";
                            // $query_pesan  = mysqli_query($koneksi, "SELECT * FROM messages WHERE incoming_msg_id = '$kode_saya' AND status = '$default'");
                            // $query_pesan = mysqli_query($koneksi, "UPDATE messages SET status = '{$status}' WHERE incoming_msg_id = {$_SESSION['unique_id']}");
                            // $jumlah_pesan = mysqli_num_rows($query_pesan);

                            if (mysqli_num_rows($sql) > 0) {
                              $row = mysqli_fetch_assoc($sql);
                            } else {
                              header("location: pesan.php");
                            }
                            ?>
                            <a href="pesan" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                            <!-- <img src="php/images/<?php echo $row['foto']; ?>" alt=""> -->
                            <img src="../../assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                            <div class="details">
                              <span><?php echo $row['fullname'] ?></span>
                              <p><?php echo $row['status']; ?></p>
                            </div>
                          </header>
                          <div class="chat-box">

                          </div>
                          <form action="#" class="typing-area">
                            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                            <button><i class="fab fa-telegram-plane"></i></button>
                          </form>
                        </section>
                      </div>

                      
                    <!-- </div> -->
                    <!-- /.tab-content --> 
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- scipt -->
<script src="javascript/chat.js"></script>

<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>
