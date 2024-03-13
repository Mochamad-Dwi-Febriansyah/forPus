<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Forum
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
    <section class="content khusus-center" >
        <div class="row">
            <div class="col-xs-12 col-md-10" > 
                <div class="wrappers" style="padding: 20px;">
                <div id="ReplyModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Jawab Pertanyaan</h4>
                    </div>

                    <div class="modal-body">
                      <form name="frm1" method="post">
                        <input type="hidden" id="commentid" name="Rcommentid">
                        <div class="form-group">
                          <label for="usr">Tulis Nama Anda:</label>
                          <input type="text" class="form-control" name="Rname" required value="<?php echo $_SESSION['fullname'] ?>" readonly>
                        </div>

                        <div class="form-group">
                          <label for="comment">Tulis Komentar Anda:</label>
                          <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
                        </div>

                        <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="container" style="width: 100%; height: 558px; overflow-y: scroll;">
                <div class="panel panel-default" style="border: none;">
                  <div class="panel-body" >
                    <h3>Forum</h3>
                    <hr>
                    <form name="frm" method="post">
                      <input type="hidden" id="commentid" name="Pcommentid" value="0">
                      <div class="form-group">
                        <label for="usr">Tulis Nama Anda:</label>
                        <input type="text" class="form-control" name="name" required value="<?php echo $_SESSION['fullname'] ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label for="comment">Tulis Komentar Anda:</label>
                        <textarea class="form-control" rows="5" name="msg" required></textarea>
                      </div>

                      <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
                    </form>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-body">
                    <h4>Recent questions</h4>
                    <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
                      <tbody id="record">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- scipt -->
<script src="javascript/forum.js"></script> 