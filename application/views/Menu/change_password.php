<div class="row">
	<div class="container">
	<?= $this->session->flashdata('message');  ?>
	<form action="<?= base_url('home/change_password') ?>" method="post"> 
		<div class="form-group">
				<label for="password_current">Password</label>
				<input type="password" name="password_current" id="password_current" class="form-control ">
				<?= form_error('password_current','<small class="text-danger pl-3">','</small>');  ?>
			</div>
			<div class="form-group">
				<label for="password1"> New Password</label>
				<input type="password" name="password1" id="password1" class="form-control">
				<?= form_error('password1','<small class="text-danger pl-3">','</small>');  ?>
			</div>
			<div class="form-group">
				<label for="password2">New Password 2</label>
				<input type="password" name="password2" id="password2" class="form-control">
				<?= form_error('password2','<small class="text-danger pl-3">','</small>');  ?>
			</div>
			<button type="submit" class="btn btn-primary btn-sm mb-3"> Simpan Perubahan </button>
	</form>
	</div>
</div>