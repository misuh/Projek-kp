<div class="row">

		<div class="container ml-3">
		<h3>Profile</h3>
	<?php echo validation_errors(); ?>
	<?= $this->session->flashdata('message');?>
		<form  action="<?= base_url('home/edit_profile') ?>" method="post" class="col-2">
			<div class="form-group">
				<input type="hidden" name="id" class="form-control" value="<?=  $user['id'];?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" name="name" id="name" class="form-control " value="<?=  $user['name'];?>" readonly>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" value="<?=  $user['email'];?>" readonly>
			</div>
		
		</form>
</div>
	
</div>