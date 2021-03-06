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
  <?= validation_errors();  ?>
  <?= $this->session->flashdata('message');  ?>
  <div class="mb-2">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse ">
    
      
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <form action="<?=  base_url('tabel'); ?>" method="post">
        <select name="filter_tabel" class="form-control" >
              <option value=""> Bulan / Tahun  </option>
              <?php foreach ($tanggal as $key => $data): ?>
                <option value="<?= $data['id_tanggal']  ?>"><?= $data['dates'];  ?></option>
              <?php endforeach ?>
            </select>
      </ul>
      <div class="col-9 mr-5">
       <input class="btn btn-outline-success" type="submit" name="filter">
       </div>
       </form>
      

      <form class="form-inline my-2 my-lg-0 col-auto" action="<?=  base_url('tabel'); ?>" method="post" >
        <input class="form-control mr-sm-2" type="text" placeholder="Cari Data" name="keyword" autocomplete="off">
        <div class="input-group-append">
          <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">
        </div>
      </form>
  </div>

</nav>
  <div class="ml-3">
    <h5>Result <?= $total_rows  ?></h5>
  </div>
</div>



  <table id="dtBasicExample" class="table table-bordered col-sm table-dark col-12 col-sm-12 mb-3 ml-3 ">
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
      <th scope="col" class="align-middle">Unit PLN</th>
      <th scope="col" class="align-middle">LINK</th>
      <th scope="col" class="align-middle">PRODUCT</th>
      <th scope="col" class="align-middle">BANDWITH</th>
      <th scope="col" class="align-middle">SERVICE ID</th>
      <th scope="col" class="align-middle">ASMAN</th>
      <th scope="col" class="align-middle">Peruntukan</th>
      <th scope="col" class="align-middle">JUMLAH GANGGUAN</th>
      <th scope="col" class="align-middle">DURASI GANGGUAN</th>
      <th scope="col" class="align-middle">STANDARD AVAILABILITY</th>
      <th scope="col" class="align-middle">REALISASI AVAILABILITY</th>
      <th scope="col" class="align-middle " colspan='3'>Opsi</th>
    </tr>
  </thead>
  <tbody>
      
      <?php foreach ($isitabel as $k) :?>
      <tr>
        <th scope="row"><?= ++$start; ?></th>
        <td><?= $k['u_pln']; ?></td>
        <td><?= $k['link']; ?></td>
        <td class="text-center"><?= $k['product']; ?></td>
        <td class="text-center"><?= $k['bandwith']; ?> Mbps</td>
        <td class="text-center"><?= $k['service_id']; ?></td>
        <td class="text-center"><?= $k['asman']; ?></td>
        <td class="text-center"><?= $k['peru']; ?></td>
        <td class="text-center"><?= $k['jml']; ?></td>
        <td class="text-center"><?= $k['dur']; ?> Jam</td>
        <td class="text-center"><?= $k['stan']; ?> %</td>
        <td class="text-center"><?= $k['rele']; ?> %</td>
          <td><?= anchor('tabel/edit/'.$k['id_data'], '<div class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit Data"><i class="fas fa-pencil-alt" ></i></div>');?></td>
         <td><?= anchor('tabel/hapus/'.$k['id_data'],'<div class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash-alt"></i></div>');?></td>
      <?php endforeach; ?>    
      </tr>
  </tbody>
</table>

<!-- Pagination -->
</div>

 <!-- Example single danger button -->
      

  <?= $this->pagination->create_links(); ?>

  <div class="btn-group inline ml-4 mb-3">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Export
          </button>
          <div class="dropdown-menu inline">
            <a class="dropdown-item" href="<?= base_url('tabel/excel')  ?>">Excel</a>
  
          </div>
        </div>
<a  class="btn guard" data-toggle="modal" data-target="#TambahData">
 <i class="fa fa-plus my-guard"></i>
 </a>

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
        <form action="<?= base_url().'tabel/tambahdata' ?>" method='post' enctype='multipart/form-data'>
          <div class="form-group">
            <label>UNIT PLN</label>
            <input type="text" name="u_pln" class="form-control">
          </div>
          <div class="form-group">
            <label>LINK</label>
            <input type="text" name="link" class="form-control">
          </div>
          <div class="form-group">
            <label>PRODUCT</label>
            <input type="text" name="product" class="form-control">
          </div>
          <div class="form-group">
            <label>BANDWITH</label>
            <input type="text" name="bandwith" class="form-control">
          </div>
          <div class="form-group">
            <label>SERVICE ID</label>
            <input type="text" name="service_id" class="form-control">
          </div>
          <div class="form-group">
            <label>ASMAN</label>
            <input type="text" name="asman" class="form-control">
          </div>
          <div class="form-group">
            <label>PERUNTUKAN</label>
            <input type="text" name="peru" class="form-control">
          </div>
          <div class="row text-center">
          <div class="form-group  col-lg-6">
            <label>JUMLAH GANGGUAN</label>
            <input type="text" name="jml" class="form-control ">
          </div>
          <div class="form-group col-lg-6">
            <label>DURASI GANGGUAN</label>
            <input type="text" name="dur" class="form-control">
          </div>
          </div>
          <div class="row text-center">
          <div class="form-group col-lg-6">
            <label>STANDARD AVAILABILITY</label>
            <input type="text" name="stan" class="form-control">
          </div>
          <div class="form-group col-lg-6">
            <label>REALISASI AVAILABILITY</label>
            <input type="text" name="rele" class="form-control">
          </div>
          </div>
          <div class = 'row'>
          <div class="form-group ml-3">
           <label>Bulan</label>
            <select name="id_tanggal" class="form-control">
              <option value=""> Bulan / Tahun  </option>
              <?php foreach ($tanggal as $key => $data): ?>
                <option value="<?= $data['id_tanggal']  ?>"><?= $data['dates'];  ?></option>
              <?php endforeach ?>
            </select>
          </div>
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



