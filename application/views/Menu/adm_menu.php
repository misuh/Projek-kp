<div class="row">
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
<?= $this->session->flashdata('message');  ?>
<div class="container-fluid">
  <div class="mb-2">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse ">
      <div class="col-4 ml-10">
       </div>
      <form class="form-inline col-6 my-lg-0" action="<?=  base_url('adm_home'); ?>" method="post" >
        <input class="form-control mr-sm-2" type="text" placeholder="Cari akun" name="keyword" autocomplete="off">
        <div class="input-group-append">
          <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">
        </div>
      </form>
  </div>

</nav>
  <div class="ml-3">
    <h5>Result <?= $total_rows1  ?></h5>
  </div>
</div>

  <table id="dtBasicExample" class="table table-bordered col-sm table-dark ml-3 col-lg-6 text-center ">
    <?php if(empty($isitabel)) :?>
        <tr>
          <td colspan="13">
            <div class="alert alert-danger" role="alert">
              Data Tidak ada
            </div>
          </td>
        </tr>
      <?php endif; ?>
  <thead>
    <tr class="text-center">
      <th scope="col" class="align-middle">No</th>
      <th scope="col" class="align-middle">NAMA</th>
      <th scope="col" class="align-middle">EMAIL</th>
      <th scope="col" class="align-middle">Tanggal Pembuatan</th>
      <th scope="col" class="align-middle " colspan='3'>Opsi</th>
    </tr>
  </thead>
  <tbody>
      
      <?php foreach ($isitabel as $k) :?>
      <tr>
        <th scope="row"><?= ++$start; ?></th>
        <td><?= $k['name']; ?></td>
        <td><?= $k['email']; ?></td>
        <td class="text-center"><?=  date('d F Y', $k['date_create']); ?></td>
          <td><?= anchor('adm_home/edit_user/'.$k['id'], '<div class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit Data"><i class="fas fa-pencil-alt" ></i></div>');?></td>
         <td><?= anchor('adm_home/hapus_user/'.$k['id'],'<div class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash-alt"></i></div>');?></td>
      <?php endforeach; ?>    
      </tr>
  </tbody>
</table>

<!-- Pagination -->
</div>
<?= $this->pagination->create_links(); ?>








</div>