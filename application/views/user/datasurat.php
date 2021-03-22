    <link href="<?= base_url('assets/'); ?>datepicker/jquery-ui.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" 
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script> -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          

        <button class="btn btn-sm btn-primary mb-3" data-target="#tambah_blog" data-toggle="modal"><i class="fas fa-plus fas-sm"></i> Tambah Surat</button>
        <!-- <p>* Untuk melihat surat terbaru, klik NO pada tabel dibawah</p> -->
        <p>* Urutan paling atas adalah urutan terbaru</p>

        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-bordered" style="width:100%">
              <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Tanggal Diterima</th>
                    <th>Dari</th>
                    <th>Perihal</th>
                    <!-- <th></th> -->
                    <th>Detail</th>
                    <th></th>
                    <th></th>
                  </tr>
              </thead>

              <tbody>

              <?php
              $no = 1;
              foreach ($surat as $srt) : ?>

                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $srt->no_surat ?></td>
                  <td><?php echo $srt->tgl_surat ?></td>
                  <td><?php echo $srt->tgl_terima_surat ?></td>
                  <td><?php echo $srt->dari_surat ?></td>
                  <td><?php echo $srt->perihal_surat ?></td>
                  <!-- <td>
                    <?php foreach ($komentar as $kom) { ?>

                      <?php 
                          if(!$kom->komentar) { ?>
                            <div class="btn btn-info btn-sm"></div>
                          <?php } else { ?>
                                <div class="btn btn-danger btn-sm"><?php echo 'Ada Komentar'?></div>
                          <?php } 
                      ?>

                    <?php } ?>
                  </td> -->
                  <td><?php echo anchor('user/detail_surat/' .$srt->id_surat, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>
                  <td>
                    <?php echo anchor('user/editsurat/' .$srt->id_surat, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>          
                  </td>
                   <td> <a onclick="return confirm('Apakah Anda Ingin Menghapus Surat ini ??')" href="<?php echo base_url('user/hapus/' .$srt->id_surat) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                   </td>
                </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
        </div>

        <!-- <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
              </tr>
          </tbody>
        </table> -->
        
        <!-- <div class="table-responsive">
          <table class="table shadow table-bordered table-striped">
            <tr>
              <th>NO</th>
              <th>NOMOR SURAT</th>
              <th>TANGGAL SURAT</th>
              <th>TANGGAL DITERIMA</th>
              <th>DARI</th>
              <th>PERIHAL</th>
              <th>DETAIL</th>
              <th colspan="2">AKSI</th>
            </tr>

            <?php
            foreach($surat as $srt) : ?>

            <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $srt->no_surat ?></td>
              <td><?php echo $srt->tgl_surat ?></td>
              <td><?php echo $srt->tgl_terima_surat ?></td>
              <td><?php echo $srt->dari_surat ?></td>
              <td><?php echo $srt->perihal_surat ?></td>
              <td><?php echo anchor('user/detail_surat/' .$srt->id_surat, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>
              <td>
                <?php echo anchor('user/editsurat/' .$srt->id_surat, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>          
              </td>
               <td> <a onclick="return confirm('Apakah Anda Ingin Menghapus Surat ini ??')" href="<?php echo base_url('user/hapus/' .$srt->id_surat) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
               </td>
            </tr>

            <?php endforeach; ?>

          </table>

          <?= $this->pagination->create_links(); ?>
          
        </div> -->


    <!-- END CONTAINER FLUID -->
    </div>

        <!-- Modal -->
      <div class="modal fade" id="tambah_blog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Surat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form action="<?php echo base_url().'user/tambah_aksi_surat'?>" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                  <label>Nomor Surat</label>
                  <!-- <input type="text" name="id" class="form-control" autocomplete="off" required="required"> -->
                  <input type="text" name="no_surat" class="form-control" autocomplete="off" required="required">
                </div>

                <div class="row">
                <div class="form-group col-md-6">
                  <label>Tanggal Surat</label>
                  <input type="text" id="datepicker" name="tgl_surat" class="form-control" autocomplete="off" required="required">
                </div>

                <div class="form-group col-md-6">
                  <label>Tanggal Diterima</label>
                  <input type="text" id="datepicker1" name="tgl_terima_surat" class="form-control" autocomplete="off" required="required">
                </div>
                </div>

                <div class="form-group">
                  <label>Dari</label>
                  <input type="text" name="dari_surat" class="form-control" autocomplete="off" required="required">
                </div>

                <div class="form-group">
                  <label>Perihal</label>
                  <textarea type="text" name="perihal_surat" class="form-control" autocomplete="off" required="required" style="height: 100px;"></textarea>
                </div>

                <div class="form-group">
                  <label>Lembar Disposisi</label><br>
                  <input type="file" name="gambar_surat_1" class="form-control" required="required">
                </div>

                <div class="form-group">
                  <label>Surat</label><br>
                  <input type="file" name="gambar_surat_2" class="form-control" required="required">
                </div>                
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
              <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
            </form>
          </div>
        </div>

        

	</div>
</div>
<!-- End of Main Content -->