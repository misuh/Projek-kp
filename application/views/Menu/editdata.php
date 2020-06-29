<div class="container-fluid">
	<h3>Edit Data</h3>

	<?php foreach ($data as $k) :?>
		<form method="post" action="<?= base_url().'tabel/update' ?>">
			<div class="form-group">
				<input type="hidden" name="id_data" class="form-control" value="<?=  $k->id_data;?>">
			</div>
			<div class="form-group">
				<label>Unit PLN</label>
				<input type="text" name="u_pln" class="form-control" value="<?=  $k->u_pln;?>">
			</div>
			<div class="form-group">
				<label>Link</label>
				<input type="text" name="link" class="form-control" value="<?=  $k->link;?>">
			</div>
			<div class="form-group">
				<label>Product</label>
				<input type="text" name="product" class="form-control" value="<?=  $k->product;?>">
			</div>
			<div class="form-group">
				<label>Bandwith</label>
				<input type="text" name="bandwith" class="form-control" value="<?=  $k->bandwith;?>">
			</div>
			<div class="form-group">
				<label>Service ID</label>
				<input type="text" name="service_id" class="form-control" value="<?=  $k->service_id;?>">
			</div>
			<div class="form-group">
				<label>Asman</label>
				<input type="text" name="asman" class="form-control" value="<?=  $k->asman;?>">
			</div>
			<div class="form-group">
				<label>Peruntukan</label>
				<input type="text" name="peru" class="form-control" value="<?=  $k->peru;?>">
			</div>
			<div class="form-group">
				<label>Jumlah Gangguan</label>
				<input type="text" name="jml" class="form-control" value="<?=  $k->jml;?>">
			</div>
			<div class="form-group">
				<label>Durasi Gangguan</label>
				<input type="text" name="dur" class="form-control" value="<?=  $k->dur;?>">
			</div>
			<div class="form-group">
				<label>Standard Availability</label>
				<input type="text" name="stan" class="form-control" value="<?=  $k->stan;?>">
			</div>
			<div class="form-group">
				<label>Realisasi Availability</label>
				<input type="text" name="rele" class="form-control" value="<?=  $k->rele;?>">
			</div>
			<div class="form-group">
				<div class="form-group ml-3">
           			<label>Bulan / Tahun</label>
              				<?= form_dropdown('dates') ?>
          		</div>
			</div>
			<button type="submit" class="btn btn-primary btn-sm"> Simpan </button>
		</form>
	<?php endforeach; ?>
</div>