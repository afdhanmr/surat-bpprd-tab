<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
  	<!-- <div class="col-lg-6"> -->

  		<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

  		<?= $this->session->flashdata('message'); ?>

  		<div class="col-md-12">
  			<a href="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Menu Baru</a>
	  		<div class="card shadow-sm table-responsive">
	  			<div class="card-body">
			  		<table class="table table-hover" id="datatablesadminmenu">
			  			<thead class="thead-dark">
			  				<th>No</th>
			  				<th>Menu</th>
			  				<th>Action</th>
			  			</thead>
			  			<tbody>
			  				<?php
			  				$no = 1;
			  				foreach ($menu as $m) : ?>
			  				
			  				<tr>
			  					<td><?php echo $no++ ?></td>
			  					<td><?= $m['menu'] ?></td>
			  					<td>
			  						<a href="" class="btn btn-success btn-sm">Edit</a>
					      			<a href=""class="btn btn-danger btn-sm">Delete</a>
					      		</td>
			  				</tr>

			  				<?php endforeach; ?>
			  			</tbody>
			  		</table>
	      		</div>
	  		</div>
  		</div>
		
  </div>
    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

 <!-- MODAL -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('menu'); ?>">
	      <div class="modal-body">
	        <div class="form-group">
			    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Nama">
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Tambah</button>
	      </div>
      </form>
    </div>
  </div>
</div>