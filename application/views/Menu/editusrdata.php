<div class="container-fluid">
	<h3>Edit Data</h3>

	<?php foreach ($data as $k) :?>
		<form method="post" action="<?= base_url().'adm_home/update_user' ?>" class="col-2">
			<div class="form-group">
				<input type="hidden" name="id" class="form-control" value="<?=  $k->id;?>">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="name" class="form-control " value="<?=  $k->name;?>" readonly>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?=  $k->email;?>">
			</div>
			<label>Role</label>
			<select name="roles_id" class="form-control mb-3">
				<?php foreach ($roles as $rl) { ?>
					<option <?php if($rl->roles_id == "$k->roles_id"){ echo 'selected="selected"'; } ?> value="<?php echo $rl->roles_id ?>"><?php echo $rl->role?> </option>
				<?php } ?>
			</select>
			<button type="submit" class="btn btn-primary btn-sm mb-3"> Simpan </button>
		</form>
	<?php endforeach; ?>
</div>