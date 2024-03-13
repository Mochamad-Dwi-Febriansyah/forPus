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
            <li class="active">Data Buku</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;"></h3>
                        <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                            <button type="button" onclick="tambahBuku()" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Buku</button>
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Judul Buku </th>
                                    <th> Pengarang </th>
                                    <th> Penerbit </th>
                                    <th> Kategori Buku </th>
                                    <th> Jumlah Buku </th>
                                    <th>
                                        <center> Aksi </center>
                                    </th>
                                </tr>
                            </thead>

                            <?php
                            include "../../config/koneksi.php";

                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM buku");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['judul_buku']; ?></td>
                                        <td><?= $row['pengarang']; ?></td>
                                        <td><?= $row['penerbit_buku']; ?></td>
                                        <td><?= $row['kategori_buku']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $j_buku_rusak = $row['j_buku_rusak'];
                                            $j_buku_baik = $row['j_buku_baik'];
                                            echo $j_buku_rusak + $j_buku_baik;
                                            ?>
                                        </td>

                                        <td>
                                            <center>
                                                <a href="#" data-target="#modalDetailBuku<?= $row['id_buku']; ?>" data-toggle="modal" title="Detail Buku" class="btn btn-warning btn-sm"><i class="fa fa-book"></i></a>
                                                <a href="#" data-target="#modalEditBuku<?= $row['id_buku']; ?>" data-toggle="modal" title="Edit Buku" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="pages/function/Buku.php?act=hapus&id=<?= $row['id_buku']; ?>" title="Hapus Buku" class="btn btn-danger btn-sm btn-del"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="modalDetailBuku<?= $row['id_buku']; ?>" tabindex="-1" aria-labelledby="modalViewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <center>
                                                        <h4 class="modal-title fw-bold" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Detail Buku</h4>
                                                    </center>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Judul Buku</label>
                                                        <p><?= $row['judul_buku']; ?></p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Kategori Buku</label>
                                                        <p><?= $row['kategori_buku']; ?></p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Penerbit Buku</label>
                                                        <p><?= $row['penerbit_buku']; ?></p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Pengarang</label>
                                                        <p><?= $row['pengarang']; ?></p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tahun Terbit</label>
                                                        <p><?= $row['tahun_terbit']; ?></p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>ISBN</label>
                                                        <p><?= $row['isbn']; ?></p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Jumlah Halaman</label>
                                                        <p><?= $row['jumlah_halaman']; ?></p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Jumlah Buku Baik</label>
                                                        <p><?= $row['j_buku_baik']; ?></p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Jumlah Buku Rusak</label>
                                                        <p><?= $row['j_buku_rusak']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="<?= $row['link_buku']; ?>" target="_blank" class="btn btn-warning"> Baca <i class="fa fa-book"></i></a>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>

                                            </div> <!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div> <!-- /.modal view end -->


                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="modalEditBuku<?= $row['id_buku']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="border-radius: 5px;">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <center>
                                                        <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Edit Buku ( <?= $row['judul_buku']; ?>
                                                            - <?= $row['pengarang']; ?> )</h4>
                                                    </center>
                                                </div>

                                                <form action="pages/function/Buku.php?act=edit" enctype="multipart/form-data" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_buku" value="<?= $row['id_buku']; ?>">
                                                        <div class="form-group">
                                                            <label>Judul Buku <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['judul_buku']; ?>" name="judul_buku">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Kategori Buku <small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control" name="kategori_buku">
                                                                <option selected value="<?= $row['kategori_buku']; ?>"><?= $row['kategori_buku']; ?> ( Dipilih Sebelumnya )</option>
                                                                <?php
                                                                include "../../config/koneksi.php";

                                                                $sql = mysqli_query($koneksi, "SELECT * FROM kategori");
                                                                while ($data = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?= $data['nama_kategori']; ?>"> <?= $data['nama_kategori']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Penerbit Buku <small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control select2" name="penerbit_buku">
                                                                <option selected value="<?= $row['penerbit_buku']; ?>"><?= $row['penerbit_buku']; ?> ( Dipilih Sebelumnya )</option>
                                                                <?php
                                                                include "../../config/koneksi.php";

                                                                $sql = mysqli_query($koneksi, "SELECT * FROM penerbit");
                                                                while ($data = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?= $data['nama_penerbit']; ?>"><?= $data['nama_penerbit']; ?> ( <?= $data['verif_penerbit']; ?> )</option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Pengarang <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['pengarang']; ?>" name="pengarang" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tahun Terbit <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" min="2000" max="2100" class="form-control" value="<?= $row['tahun_terbit']; ?>" name="tahun_terbit" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>ISBN <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['isbn']; ?>" name="isbn" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Jumlah Halaman<small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['jumlah_halaman']; ?>" name="jumlah_halaman" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Jumlah Buku Baik <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['j_buku_baik']; ?>" name="j_buku_baik" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Jumlah Buku Rusak <small style="color: red;">* Wajib diisi</small></label>
                                                            <input type="number" class="form-control" value="<?= $row['j_buku_rusak']; ?>" name="j_buku_rusak" required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /. Modal Edit -->
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal tambah buku -->
<div class="modal fade" id="modalTambahBuku">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Tambah Buku</h4>
                </center>
            </div>

            <form action="pages/function/Buku.php?act=tambah" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Buku <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Judul Buku" name="judul_buku">
                    </div>

                    <div class="form-group">
                        <label>Kategori Buku <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control" name="kategori_buku">
                            <option selected>-- Harap pilih kategori buku --</option>
                            <?php
                            include "../../config/koneksi.php";

                            $sql = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['nama_kategori']; ?>"> <?= $data['nama_kategori']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Penerbit Buku <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control select2" name="penerbit_buku">
                            <option selected disabled>-- Harap Pilih Penerbit Buku --</option>
                            <?php
                            include "../../config/koneksi.php";

                            $sql = mysqli_query($koneksi, "SELECT * FROM penerbit");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['nama_penerbit']; ?>"><?= $data['nama_penerbit']; ?> ( <?= $data['verif_penerbit']; ?> )</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pengarang <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Pengarang" name="pengarang" required>
                    </div>

                    <div class="form-group">
                        <label>Tahun Terbit <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" min="2000" max="2100" class="form-control" placeholder="Masukan Tahun Terbit ( Contoh : 2003 )" name="tahun_terbit" required>
                    </div>

                    <div class="form-group">
                        <label>ISBN <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" placeholder="Masukan ISBN" name="isbn" required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Halaman <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" placeholder="Masukan Jumlah Halaman Buku" name="jumlah_halaman" required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Buku Baik <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" placeholder="Masukan Jumlah Buku Baik" name="j_buku_baik" required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Buku Rusak <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" placeholder="Masukan Jumlah Buku Rusak" name="j_buku_rusak" required>
                    </div>

                    <div class="form-group">
                        <label>Link Buku <small style="color: red;"></small></label>
                        <!-- <input type="text" class="form-control" placeholder="Masukan Link Buku" name="link_buku" required> -->
                        <input name="link_buku" type="text" id="link_buku" class="form-control" autocomplete="off" placeholder="Masukan Link Buku" required="" />

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function tambahBuku() {
        $('#modalTambahBuku').modal('show');
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
                text: 'Apakah anda yakin ingin menghapus data buku ini ?',
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
                        text: 'Data buku tersebut aman !'
                    })
                }
            });
    })
</script>