<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>
<?php
if(session()->getFlashData('success')){
?> 
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('success') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<?php
if(session()->getFlashData('failed')){
?> 
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('failed') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<!-- Table with stripped rows -->
<table class="table datatable">
<thead>
	<tr>
	<th scope="col">Tanggal</th>
	<th scope="col">Username</th>
	<th scope="col">Total Harga</th>
	<th scope="col">Ongkos Kirim</th> 
	<th scope="col">Status</th>
	</tr>
</thead>
<tbody>
	<?php foreach($transaction as $index=>$histori): ?>
	<tr>
	<td><?php echo $histori['created_date'] ?></td> 
	<td><?php echo $histori['username'] ?></td> 
	<td><?php echo $histori['total_harga'] ?></td>
	<td><?php echo $histori['ongkir'] ?></td>
	<td><?php echo $histori['status'] ?></td>
	<td>
    <form action="<?php echo base_url('/history/edit/'.$histori['id']) ?>" method="post">
    <?php if ($histori['status'] == 0){ ?>
        <input type="hidden" name="id" value="<?php echo $histori['id']; ?>">
        <input type="hidden" name="status" value="1">
        <button type="submit">Diproses</button>
    <?php }else if ($histori['status'] == 1){ ?>
        <input type="hidden" name="id" value="<?php echo $histori['id']; ?>">
        <input type="hidden" name="status" value="2">
        <button type="submit">Dikirim</button>
    <?php }else if ($histori['status']==2){ ?>
        <input type="hidden" name="id" value="<?php echo $histori['id']; ?>">
        <input type="hidden" name="status" value="2">
        <button type="submit">Selesai</button>
    <?php } ?>
</form>
<!-- 
    </td>
	<td>
		<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $histori['id'] ?>">
			Ubah
		</button>
	</td>
	</tr> -->
	<?php endforeach ?>   
</tbody>
</table>
<!-- End Table with stripped rows -->
<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Tambah Data</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<form action="<?= base_url('admin') ?>" method="post" enctype="multipart/form-data">
		<?= csrf_field(); ?>
		<div class="modal-body">
			<div class="form-group">
				<label for="name">user</label>
				<input type="text" name="user" class="form-control" id="user" placeholder="user" required>
			</div>
			<div class="form-group">
				<label for="name">Password</label>
				<input type="text" name="password" class="form-control" id="password" placeholder="password" required>
			</div>
			<div class="form-group">
				<label for="name">role</label>
				<input type="text" name="role" class="form-control" id="role" placeholder="role" required>
			</div>
			<div class="form-group">
				<label for="name">email</label>
				<input type="text" name="email" class="form-control" id="email" placeholder="email" required>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
		</form>
		</div>
	</div>
</div>
<!-- Add Modal End -->
<?= $this->endSection() ?>