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

	.containerkomentar {
	  border: 2px solid #dedede;
	  background-color: #f1f1f1;
	  border-radius: 5px;
	  padding: 10px;
	  margin: 10px 0;
	}

	/* Darker chat container */
	.darker {
	  border-color: #ccc;
	  background-color: #ddd;
	}

	/* Clear floats */
	.container::after {
	  content: "";
	  clear: both;
	  display: table;
	}

</style>

<div class="container-fluid">
	
	 <h1 class="h3 mb-4 text-gray-800 mt-4"><?= $title; ?></h1>

	 <?php foreach ($detail as $tl): ?>

        <?= $this->session->flashdata('balas') ?>

	 	<div class="card shadow-sm table-responsive">
	 	    <div class="card-body">
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
    						  <img src="<?=base_url('uploads/'.$tl->gambar_surat_1)?>" alt="Gambar Tidak Ada" style="width: 300px;">
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
    	 		</table>
    	 	</div>

        	<?php endforeach ?>
        	 
            <div class="card-body">
        	 <form action="<?php echo base_url().'bpprd/balas_komentar/'.$tl->id_surat?>" method="post" enctype="multipart/form-data" >
        	    <div class="form-group">
        		      <label class="name mb-4">* Komentar sebagai <?= $user['name']; ?></label>
        		      <input type="hidden" name="id" class="form-control" autocomplete="off" value="<?php echo $tl->id ?>">
        		      <input type="hidden" name="id_surat" class="form-control" autocomplete="off" value="<?php echo $tl->id_surat; ?>">
        		      <textarea type="text" name="komentar" class="form-control" autocomplete="off" required="required" style="height: 100px;"></textarea>
        		    </div>
        		  	<button type="submit" class="btn btn-md btn-primary">Kirim</button>
        		 </form>
            </div>
    </div>

	 <div class="komentar mt-4">
		<?php foreach ($komentar as $kom): ?>
		 <div class="containerkomentar mt-4">

		 	<p><?php echo $kom->komentar ?></p>
		 	
		 </div>
		<?php endforeach ?>

		<?php foreach ($komentar as $kom): ?>

		 <a onclick="return confirm('Apakah Anda Ingin Menghapus Komentar ini ??')" href="<?php echo base_url('bpprd/hapus/' .$kom->id_komentar) ?>" class="btn btn-sm btn-danger mt-2"><i class="fa fa-trash"></i></a>

		<?php endforeach; ?>

	 </div>

	 <?php echo anchor('bpprd/datasurat/','<div class="btn btn-sm btn-danger mt-2 mb-4">KEMBALI</div>')?>

</div>
</div>