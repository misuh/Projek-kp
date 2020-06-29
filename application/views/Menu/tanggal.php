<style>
  *{padding:0;margin:0;}

body{
  font-family:Verdana, Geneva, sans-serif;
  font-size:18px;
  background-color:#CCC;
}

.guard{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#FFF;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}

.my-guard{
  margin-top:15px;
}
</style>
<div class="container-fluid">
<table class="table table-dark table-bordered col-lg-6">
  <thead>
    <tr class="text-center">
      <th scope="col">No</th>
      <th scope="col">Bulan / Tahun</th>
      <th scope="col" colspan="2"> Opsi </th>
    </tr>
  </thead>
  <tbody>
  	<?php $i = 1; ?>
  	<?php foreach ($tanggal as $tgl): ?>
    <tr class="text-center">
      <th scope="row"><?= $i  ?></th>
      <td><?= $tgl['dates']; ?></td>
      <td><?= anchor('tanggal/edit_tgl/'.$tgl['id_tanggal'], '<div class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit Data"><i class="fas fa-pencil-alt" ></i></div>');?></td>
      <td><?= anchor('tanggal/hapus_tgl/'.$tgl['id_tanggal'],'<div class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash-alt"></i></div>');?></td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
  </tbody>
</table>
</div>      
<a  class="btn guard" data-toggle="modal" data-target="#TambahData">
 <i class="fa fa-plus my-guard"></i>
 </a>


</div>

<!-- Modal -->
<div class="modal fade" id="TambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mb-3" id="exampleModalLabel" >Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url().'tanggal/tambahtanggal' ?>" method='post' enctype='multipart/form-data'>
          <div class="form-group">
            <label>Bulan / Tahun</label>
            <input type="text" name="dates" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>