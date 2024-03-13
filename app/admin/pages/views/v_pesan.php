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

                    <!-- <div class="tab-content"> -->
                        <!-- Font Awesome Icons --> 
                        <div class="wrappers">
                            <section class="users">
                                <header class="header-space-between">
                                    <div class="contentt"> 
                                    <?php
                                    include "../../config/koneksi.php";
                                    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE unique_id = {$_SESSION['unique_id']}");
                                    if (mysqli_num_rows($sql) > 0) {
                                        $row = mysqli_fetch_assoc($sql);
                                    }
                                    ?>
                                    <img src="../../assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                                    <div class="details">
                                        <span><?php echo $row['fullname'] ?></span>
                                        <p><i class="fa fa-circle text-success"></i></p>
                                    </div>
                                    </div> 
                                </header>
                                <div class="search">
                                    <span class="text">Select an user to start chat</span>
                                    <input type="text" placeholder="Enter name to search...">
                                    <button><i class="fas fa-search"></i></button>
                                </div>
                                <div class="users-list">

                                </div>
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
<script src="javascript/users.js"></script>

<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>
