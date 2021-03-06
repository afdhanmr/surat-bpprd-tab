    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <?php foreach ($alert as $al): ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Hello <strong><?= $user['name'] ?></strong>, Surat <ins><?php echo $al->no_surat ?></ins> baru keluar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php endforeach; ?>

        <!-- <p>* Untuk melihat surat terbaru, klik <b>NO</b> pada tabel dibawah</p> -->
        <p>* Urutan paling atas adalah urutan terbaru</p>

        <!-- <div class="table-responsive"> -->
        <table id="datatables" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($surat as $srt) : ?>

                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $srt->no_surat ?></td>    
                  <td><?php echo anchor('bpprd/detail_surat/' .$srt->id_surat, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>              
                </tr>

              <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- </div> -->

          <!-- <table class="table shadow table-bordered table-striped">
            <tr>
              <th>NO</th>
              <th>NOMOR SURAT</th>
              <th>DETAIL</th>
            </tr>

            <?php
            foreach($surat as $srt) : ?>

            <tr>
              <td><?php echo ++$start ?></td>
              <td><?php echo $srt->no_surat ?></td>
              <td><?php echo anchor('bpprd/detail_surat/' .$srt->id_surat, '<div class="btn btn-primary btn-sm">Detail</div>') ?></td>
              </td>
            </tr>

            <?php endforeach; ?>

          </table>

          <?= $this->pagination->create_links(); ?> -->
        
  </div>        
</div>
<!-- End of Main Content -->