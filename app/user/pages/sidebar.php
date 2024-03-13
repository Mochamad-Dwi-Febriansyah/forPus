<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                <!-- <img src="<?php echo $_FILES['foto']; ?>" height="80" width="80" class="img-circle" alt="User Image" /> -->
            </div>

            <div class="pull-left info">
                <p><?= $_SESSION['fullname']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li><a href="dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Koleksi Buku</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="data-buku"><i class="fa fa-circle-o"></i> Data Buku</a></li>
                    <li><a href="kategori-buku"><i class="fa fa-circle-o"></i> Kategori Buku</a></li>
                </ul>
            </li>

            <li><a href="peminjaman-buku"><i class="fa fa-book"></i> <span>Peminjaman Buku</span></a></li>
            <li><a href="pengembalian-buku"><i class="fa fa-repeat"></i> <span>Pengembalian Buku</span></a></li>
            <li><a href="diskusi"><i class="fa fa-users"></i> <span>Forum Diskusi</span></a></li>
            <li><a href="cek"><i class="fa fa-users"></i> <span>Test</span></a></li>
            <li><a href="cobaan"><i class="fa fa-users"></i> <span>Coba</span></a></li>

            <li class="header">LAIN LAIN</li>
            <li><a href="pesan"><i class="fa fa-envelope"></i> <span>Pesan</span>
                    <span class="pull-right-container" id="jumlahPesan">
                        <?php
                        include "../../config/koneksi.php";

                        // if($_SESSION['unique_id'] == 19){
                            $kode_saya = $_SESSION['unique_id'];
                            $default = "Belum dibaca";
                            $query_pesan  = mysqli_query($koneksi, "SELECT * FROM messages WHERE incoming_msg_id = '$kode_saya' AND status = '$default'");
                            $jumlah_pesan = mysqli_num_rows($query_pesan);
    
                            $kode_saya = $_SESSION['unique_id'];
                            $default = "Belum dibaca";
                            $query_pesan  = mysqli_query($koneksi, "SELECT * FROM messages WHERE incoming_msg_id = '$kode_saya' AND status = '$default'");
                            $row_pesan = mysqli_fetch_array($query_pesan);
    
                            if ($jumlah_pesan == null) {
                                // Hilangkan badge pesan
                            } else {
                                echo "<span class='label label-danger pull-right'>" . $jumlah_pesan . "</span>";
                            }
                        // }
                        ?>
                    </span>
                </a></li>
            <li><a href="forum"><i class="fa fa-users"></i> <span>Forum</span>
            <li><a href="profil-saya"><i class="fa fa-user"></i> <span>Profil Saya</span></a></li>
            <li class="header">LANJUTAN</li>
            <li><a href="#Logout" data-toggle="modal" data-target="#modalLogoutConfirm"><i class="fa fa-power-off"></i> <span>Keluar</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<div class="modal fade" id="modalLogoutConfirm">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Peringatan</h4>
            </div>

            <div class="modal-body">
                <span>Apa anda yakin ingin keluar dari Aplikasi ? <br>
                    Anda harus login kembali jika ingin masuk Aplikasi</span>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                <a href="keluar" class="btn btn-primary">Ya, Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    var refreshId = setInterval(function() {
        $('#jumlahPesan').load('./pages/function/Pesan.php?aksi=jumlahPesan');
    }, 500);
</script> -->

<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>