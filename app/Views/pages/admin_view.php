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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
Tambah Data
</button>
<!-- Table with stripped rows -->
<table class="table datatable">
<thead>
	<tr>
	<th scope="col">No</th>
	<th scope="col">user</th>
	<th scope="col">Password</th>
	<th scope="col">Role</th> 
	<th scope="col">Email</th> 
	<th scope="col">Status</th> 
	<th scope="col">j</th> 
	</tr>
</thead>
<tbody>
	<?php foreach($Admins as $index=>$user): ?>
	<tr>
	<th scope="row"><?php echo $index+1?></th>
	<td><?php echo $user['username'] ?></td> 
	<td><?php echo $user['password'] ?></td> 
	<td><?php echo $user['role'] ?></td>
	<td><?php echo $user['email'] ?></td>
	<td>
    <form action="<?php echo base_url('/admin/edit/'.$user['id']) ?>" method="post">
    <?php if ($user['is_active'] == false): ?>
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <input type="hidden" name="is_active" value="1">
        <input type="hidden" name="kunci" value="true">
        <button type="submit">Belum Aktif</button>
    <?php else: ?>
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <input type="hidden" name="is_active" value="0">
        <input type="hidden" name="kunci" value="true">
        <button type="submit">Aktif</button>
    <?php endif; ?>
</form>

    </td>
	<td>
		<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $user['id'] ?>">
			Ubah
		</button>
		<a href="<?= base_url('admin/delete/'.$user['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
			Hapus
		</a>
	</td>
	</tr>
	<!-- Edit Modal Begin -->
	<div class="modal fade" id="editModal-<?= $user['id'] ?>" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('admin/edit/'.$user['id']) ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field(); ?>
			<div class="modal-body">
				<div class="form-group">
					<label for="name">user</label>
					<input type="text" name="user" class="form-control" id="user" value="<?= $user['username'] ?>" placeholder="user Barang" required>
				</div>
				<div class="form-group">
					<label for="name">password</label>
					<input type="text" name="password" class="form-control" id="password" value="<?= $user['password'] ?>" placeholder="password Barang" required>
				</div>
				<div class="form-group">
					<label for="name">role</label>
					<input type="text" name="role" class="form-control" id="role" value="<?= $user['role'] ?>" placeholder="role Barang" required>
				</div>
				<div class="form-group">
					<label for="name">email</label>
					<input type="text" name="email" class="form-control" id="email" value="<?= $user['email'] ?>" placeholder="email Barang" required>
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
	<!-- Edit Modal End -->
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