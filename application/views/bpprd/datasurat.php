    <!-- Begin Page Content -->
    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <table class="table table-bordered table-striped">
            <tr>
              <th>NO</th>
              <th>NOMOR SURAT</th>
              <th>DETAIL</th>
              <!-- <th colspan="2">AKSI</th> -->
            </tr>

            <?php
            $start = 0;
            foreach($surat as $srt) : ?>

            <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $srt->no_surat ?></td>
              <!-- <td>
                <img src="<?=base_url('uploads/'.$srt->gambar_surat)?>" style="width: 100px;">              
              </td> -->
              <td><?php echo anchor('bpprd/detail_surat/' .$srt->id_surat, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>
              <!-- <td> <a onclick="return confirm('Apakah Anda Ingin Menghapus Surat ini ??')" href="<?php echo base_url('user/hapus/' .$srt->id_surat) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
              </td>
            </tr>

            <?php endforeach; ?>

          </table>
        
        <!-- <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <tr>
              <th>NO</th>
              <th>NOMOR SURAT</th>
              <th>NAMA SURAT</th>
              <th>KETERANGAN</th>
              <th>GAMBAR</th>
              <th colspan="2">AKSI</th>
            </tr>

            <?php
            $start = 0;
            foreach($surat as $srt) : ?>

            <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $srt->no_surat ?></td>
              <td><?php echo $srt->nama_surat ?></td>
              <td><?php echo $srt->keterangan_surat ?></td>
              <td>
                <img src="<?=base_url('uploads/'.$srt->gambar_surat)?>" style="width: 100px;">              
              </td>
              <td>
                 <button class="btn btn-sm btn-primary mb-3 mt-4" data-target="#tambah_blog" data-toggle="modal"><i class="fas fa-plus fas-sm"></i> Balas Surat</button>
              </td>
               <td> <a onclick="return confirm('Apakah Anda Ingin Menghapus Surat ini ??')" href="<?php echo base_url('user/hapus/' .$srt->id_surat) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
               </td>
            </tr>

            <?php endforeach; ?>

          </table>
        </div>
 -->
  </div>        
</div>
<!-- End of Main Content -->