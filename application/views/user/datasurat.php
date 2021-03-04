    <link href="<?= base_url('assets/'); ?>datepicker/jquery-ui.min.css" rel="stylesheet">

    <!-- Begin Page Content -->
    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          

        <button class="btn btn-sm btn-primary mb-3 mt-4" data-target="#tambah_blog" data-toggle="modal"><i class="fas fa-plus fas-sm"></i> Tambah Surat</button>
        <p>* Urutan surat paling atas adalah surat terbaru</p>
        
        <div class="table-responsive">
          <table class="table shadow table-bordered table-striped">
            <tr>
              <th>NO</th>
              <th>NOMOR SURAT</th>
              <th>TANGGAL SURAT</th>
              <th>TANGGAL DITERIMA</th>
              <th>DARI</th>
              <th>PERIHAL</th>
              <!-- <th>KOMENTAR</th> -->
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
              <!-- <td>
              <?php foreach ($komentar as $kom): ?>                
                <?php 
                    if(empty($kom->komentar)) { ?>
                      <div class="btn btn-info btn-sm">Ada Komentar</div>
                <?php } else { ?>
                      <div class="btn btn-danger btn-sm">Belum Ada Komentar</div>
                <?php } ?>
                <?php endforeach; ?>
               </td> -->
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
          
        </div>
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

        <script src="<?= base_url('assets/'); ?>datepicker/jquery-3.5.1.min.js"></script>
        <script src="<?= base_url('assets/'); ?>datepicker/jquery-ui.min.js"></script>

        <script>
          
          $("#datepicker").datepicker();

          $("#datepicker1").datepicker();

        </script>

	</div>
</div>
<!-- End of Main Content -->