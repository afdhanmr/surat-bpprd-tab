<style>
	img {
	  border: 1px solid #ddd;
	  border-radius: 4px;
	  padding: 5px;
	  width: 150px;
	}

	img:hover {
	  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
	}
</style>

<div class="container-fluid">
	
	 <h1 class="h3 mb-4 text-gray-800 mt-4"><?= $title; ?></h1>

	 <?php foreach ($detail as $tl): ?>

	 	<div class="table-responsive">
	 		<table class="table table-border table-striped">
	 			<tr>
	 				<td>Nomor Surat</td>
	 				<td>:</td>
	 				<th><?php echo $tl->no_surat ?></th>
	 			</tr>
	 			<tr>
	 				<td>Tanggal Surat</td>
	 				<td>:</td>
	 				<th><?php echo $tl->tgl_surat ?></th>
	 			</tr>
	 			<tr>
	 				<td>Tanggal  Diterima</td>
	 				<td>:</td>
	 				<th><?php echo $tl->tgl_terima_surat ?></th>
	 			</tr>
	 			<tr>
	 				<td>Dari</td>
	 				<td>:</td>
	 				<th><?php echo $tl->dari_surat ?></th>
	 			</tr>
	 			<tr>
	 				<td>Perihal</td>
	 				<td>:</td>
	 				<th><?php echo $tl->perihal_surat ?></th>
	 			</tr>
	 			<tr>
	 				<td>Lembar Disposisi</td>
	 				<td>:</td>
	 				<th>
		 				<a target="_blank" href="<?=base_url('uploads/'.$tl->gambar_surat_1)?>">
						  <img src="<?=base_url('uploads/'.$tl->gambar_surat_1)?>" alt="Gambar Tidak Ada"style="width: 300px;">
						</a>
						<br><br>
						<p>* Klik Gambar Untuk Zoom</p>
					</th>
	 			</tr>
	 			<tr>
	 				<td>Surat</td>
	 				<td>:</td>
	 				<th>
		 				<a target="_blank" href="<?=base_url('uploads/'.$tl->gambar_surat_2)?>">
						  <img src="<?=base_url('uploads/'.$tl->gambar_surat_2)?>" alt="Gambar Tidak Ada" style="width: 300px;">
						</a>
						<br><br>
						<p>* Klik Gambar Untuk Zoom</p>
					</th>
	 			</tr>
	 			<tr>
	 				<td>Komentar</td>
	 				<td>:</td>
	 				<th><?php echo $tl->komentar_surat ?></th>
	 			</tr>
	 			<tr>
	 		</table>

	 		<?php echo anchor('user/datasurat/','<div class="btn btn-sm btn-danger mt-3">KEMBALI</div>')?>
	 	</div>

	 <?php endforeach ?>

</div>
</div>