<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Dashboard
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
                </script>
            </small>
        </h1>

        <ol class="breadcrumb">
            <li><a href="../../assets/#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        date_default_timezone_set('Asia/Jakarta');
        $jam = date("H:i");

        // atur salam dengan IF
        if ($jam > '05:30' && $jam < '10:00') {
            $salam = 'Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Siang';
        } elseif ($jam < '18:00') {
            $salam = 'Sore';
        } else {
            $salam = 'Malam';
        }
        ?>
        <?php
        include "../../config/koneksi.php";

        $sql = mysqli_query($koneksi, "SELECT * FROM identitas");
        $row1 = mysqli_fetch_assoc($sql);
        ?>
        <div class="alert alert-secondary" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db;">
            Selamat <?= $salam; ?>, Selamat datang <b><?= $_SESSION['fullname']; ?></b> di <?= $row1['nama_app']; ?>.
        </div>

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <?php
                include "../../config/koneksi.php";
                $query_anggota = mysqli_query($koneksi, "SELECT * FROM user WHERE role = 'Anggota'");
                $row_anggota = mysqli_num_rows($query_anggota);
                ?>

                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3> <?= $row_anggota; ?></h3>

                        <p>Forum Diskusi</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="forum-diskusi" class="small-box-footer">More Info<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <?php
                include "../../config/koneksi.php"; 
                $query_buku = mysqli_query($koneksi, "SELECT * FROM buku");
                $row_buku = mysqli_num_rows($query_buku);
                ?>
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $row_buku; ?></h3>
                        <p>Buku</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="data-buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <?php
                include "../../config/koneksi.php";
                $query_peminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE tanggal_peminjaman > 0");
                $row_peminjaman = mysqli_num_rows($query_peminjaman);
                ?>
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $row_peminjaman; ?></h3>

                        <p>Peminjaman</p>
                    </div>

                    <div class="icon">
                        <i class="fa fa-sign-out"></i>
                    </div>

                    <a href="data-peminjaman" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- -->
        <?php
        include "../../config/koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM identitas");
        $row = mysqli_fetch_assoc($query);
        ?>

        <img src="../../assets/dist/img/cart.png" width="120px" height="120px" style="display: block; margin-left: auto; margin-right: auto; margin-top: 100px;">

        <h1 class="text-center"><?= $row['nama_app']; ?></h1>
        <p class="text-center">Alamat : <?= $row['alamat_app']; ?> | Email : <?= $row['email_app']; ?> | Nomor Telpon : <?= $row['nomor_hp']; ?> </p>
    </section>
    <!-- /.content -->
</div>