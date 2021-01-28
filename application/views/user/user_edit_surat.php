        <!-- Begin Page Content -->
        <div class="container-fluid mt-4">

          <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

			<?php foreach($surat as $srt) : ?>

				<form method="post" action="<?php echo base_url().'user/update_surat' ?>">

					<div class="form-gorup">
						<label>Nomor Surat</label>
						<input type="hidden" name="id_surat" class="form-control" value="<?php echo $srt->id_surat ?>">
						<input type="text" name="no_surat" class="form-control" value="<?php echo $srt->no_surat ?>">
					</div>

					<div class="row">
					<div class="form-gorup col-md-6 mt-2">
						<label>Tanggal Surat</label>						
						<input type="date" name="tgl_surat" class="form-control" value="<?php echo $srt->tgl_surat ?>">
					</div>

					<div class="form-gorup col-md-6 mt-2">
						<label>Tanggal Diterima Surat</label>						
						<input type="date" name="tgl_terima_surat" class="form-control" value="<?php echo $srt->tgl_terima_surat ?>">
					</div>
					</div>

					<div class="form-gorup mt-2">
						<label>Dari</label>						
						<input type="text" name="dari_surat" class="form-control" value="<?php echo $srt->dari_surat ?>">
					</div>

					<div class="form-gorup mt-2">
						<label>Perihal</label>						
						<input type="text" name="perihal_surat" class="form-control" value="<?php echo $srt->perihal_surat ?>">
					</div>

					<div class="form-group mt-2">
		        		<label>Gambar Disposisi</label><br>
		        		<input type="file" name="gambar_surat_1" class="form-control" value="<?php echo $srt->gambar_surat_1 ?>">
		        	</div>

		        	<div class="form-group mt-2">
		        		<label>Gambar Surat</label><br>
		        		<input type="file" name="gambar_surat_2" class="form-control" value="<?php echo $srt->gambar_surat_2 ?>">
		        	</div>

					<button type="submit" class="btn btn-primary btn-sm mt-3"> SIMPAN</button>
					<?php echo anchor('user/datasurat/','<div class="btn btn-sm btn-danger mt-3">KEMBALI</div>')?>
					
				</form>

			<?php endforeach; ?>
            
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->