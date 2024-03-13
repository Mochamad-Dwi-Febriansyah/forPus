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
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <!-- <ul class="nav nav-tabs">
                        <li class="active"><a href="#pesan-masuk" data-toggle="tab">Pesan Masuk</a></li>
                        <li><a href="#pesan-terkirim" data-toggle="tab">Pesan Terkirim</a></li>
                        <div class="form-group m-b-2 text-right" style="margin-top: 5px;margin-bottom: -5px; margin-right: 5px;">
                            <button type="button" onclick="kirimPesan()" class="btn btn-info"><i class="fa fa-send"></i> Kirim Pesan</button>
                        </div>
                    </ul> -->

                    <div class="tab-content">
                        <!-- Font Awesome Icons -->
                        <div class="tab-pane active" id="pesan-masuk">
                            
                            <section class="users">
                                <header>
                                    <div class="header-left">
                                        <div class="search">
                                            <span class="text">Select an user to start chat</span>
                                            <input type="text" placeholder="Enter name to search...">
                                            <button><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="header-right">
                                        <div class="content-h"> 
                                            <img src="php/images/<?php echo $row['img']; ?>" alt="">
                                                <div class="details">
                                                    <span>Alex</span>
                                                    <p>Status <i class="fa fa-circle text-success"></i></p>
                                                </div>
                                        </div>
                                        <a href="php/logout.php?logout_id=" class="logout">Logout</a>
                                    </div>
                                </header>
                             
                                <div class="users-list">

                                </div> 
                            </section>
                        </div> 
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
 

<script>
    function kirimPesan() {
        $('#modalKirimPesan').modal('show');
    }
</script>

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

<!-- Pesan Gagal Edit -->
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
                text: 'Apakah anda yakin ingin menghapus pesan ini ?',
                buttons: true,
                dangerMode: true,
                buttons: ['Tidak, Batalkan !', 'Iya, Hapus']
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.location.href = href;
                } else {
                    swal({
                        icon: 'error',
                        title: 'Dibatalkan',
                        text: 'Pesan tersebut tetap aman !'
                    })
                }
            });
    })
</script>
