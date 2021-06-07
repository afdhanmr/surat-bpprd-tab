<!-- Begin Page Content -->
<div class="container-fluid">

	  <!-- Page Heading -->
	  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

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
                  <td><?php echo $srt->tgl_surat ?></td>
                  <td><?php echo $srt->tgl_terima_surat ?></td>
                  <td><?php echo $srt->dari_surat ?></td>
                  <td><?php echo $srt->perihal_surat ?></td>
                  <td><?php echo anchor('karyawan/detail_surat/' .$srt->id_surat, '<div class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; Detail</div>') ?></td>
                </tr>

                <?php endforeach; ?>
              </tbody>
            </table>
        </div>

</div>
</div>