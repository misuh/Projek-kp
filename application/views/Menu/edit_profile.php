<div class="row">
	<form>
		<div class="container-fluid ml-3">
		<h3>Edit Profile</h3>

	<?= $this->session->flashdata('message');?>
		<form method="post" action="<?= base_url('home/edit_profile') ?>" class="col-2">
			<div class="form-group">
				<input type="hidden" name="id" class="form-control" value="<?=  $dt->id;?>">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="name" class="form-control " value="<?=  $dt->name;?>" readonly>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?=  $dt->email;?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm mb-3"> Simpan Perubahan </button>
		</form>
</div>
	</form>
</div>