<?php
include "../../config/koneksi.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Buku
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
            <li class="active">Forum Perpustakaan</li>
        </ol>
    </section>

    <!-- Main content -->
    <!-- <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;"></h3>
                    </div> -->
    <!-- /.box-header -->


    <?php
    include "../../config/koneksi.php";

    $id_user = $_SESSION['id_user'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
    $row = mysqli_fetch_assoc($query);
    ?>
    <div class="container">
        <div class="panel panel-default" style="margin-top:50px">
            <div class="panel-body">
                <h3>Diskusi</h3>
                <hr>
                <form action="pages/function/Diskusi.php?act=tambah" enctype="multipart/form-data" method="POST">
                    <input type="hidden" id="commentid" name="Pcommentid" value="0">
                    <div class="form-group">
                        <label for="usr">Tulis Nama Anda:</label>
                        <!-- <input type="text" class="form-control" name="student" required> -->
                        <input type="text" class="form-control" value="<?= $row['fullname']; ?>" disabled>

                    </div>

                    <div class="form-group">
                        <label for="comment">Tulis Komentar Anda:</label>
                        <!-- <input type="text" class="form-control" placeholder="Masukan Nama Pengarang" name="post" required> -->
                        <textarea class="form-control" rows="5" name="post" required></textarea>
                    </div>

                    <input type="submit" id="butsave" name="save" class="btn btn-primary" value="Send">
                </form>
            </div>
        </div>
    </div>

    <?php
    include "../../config/koneksi.php";

    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM discussion");
    while ($row = mysqli_fetch_assoc($query)) {
    ?>

        <div class="container">
            <div class="row">
                <!-- <div class="col-md-12"> -->
                <div class="box">
                    <div class="card-header">
                        <b>Recent Questions</b>
                        <!-- <div class="card-tools">
                            </div> -->
                    </div>

                    <!-- <div class="box-body"> -->
                    <div class="post">

                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../assets/dist/img/avatar5.png" alt="user image" height="35" width="35">
                            <span class="username">
                                <p><?= $_SESSION['fullname']; ?>:</p>
                            </span>
                        </div>

                        <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
                            <div>
                                <strong>Komen : <br></strong>
                                <td> <?= $row['post']; ?> </td>
                            </div>
                        </table>
                        <div class="post clearfix"></div>
                    <?php
                }
                    ?>
                    <!-- </div> -->
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="main.js"></script>

<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>

<!-- Pesan Berhasil Edit -->
<script>
    <?php
    if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] <> '') {
        echo "swal({
            icon: 'success',
            title: 'Berhasil',
            text: '$_SESSION[berhasil]'
        })";
    }
    $_SESSION['berhasil'] = '';
    ?>
</script>

<!-- Notif Gagal -->
<script>
    <?php
    if (isset($_SESSION['gagal']) && $_SESSION['gagal'] <> '') {
        echo "swal({
                icon: 'error',
                title: 'Gagal',
                text: '$_SESSION[gagal]'
              })";
    }
    $_SESSION['gagal'] = '';
    ?>
</script>

<!-- Swal Hapus Data -->
<script>
    $('.btn-del').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        swal({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Apakah anda yakin ingin menghapus diskusi ini ?',
                buttons: true,
                dangerMode: true,
                buttons: ['Batalkan', 'Hapus']
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.location.href = href;
                } else {
                    swal({
                        icon: 'error',
                        title: 'Dibatalkan',
                        text: 'Diskusi tersebut aman !'
                    })
                }
            });
    })
</script>