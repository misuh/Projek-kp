<div class="container-fluid">
	<h3>Edit Tanggal</h3>
	<?php foreach ($data as $tgl): ?>
	<form method="post" action="<?= base_url().'tanggal/update_tgl' ?>">
		<div class="form-group">
				<input type="hidden" name="id_tanggal" class="form-control" value="<?=  $tgl->id_tanggal;?>">
			</div>
			<div class="form-group">
				<label>Bulan / Tahun</label>
				<input type="text" name="dates" class="form-control" value="<?=  $tgl->dates;?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm"> Simpan </button>
	<?php endforeach ?>
	</form>
</div>