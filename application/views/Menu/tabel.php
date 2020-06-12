<div class="container-fluid">
<div class="row mb-3">
  <div class="dropdown show ">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Bulan
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Action</a>
  </div>
</div>
<div class="dropdown show ml-3">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Tahun
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Action</a>
  </div>
</div>
</div>

<div class="row ">
  <table class="table table-bordered col-sm table-dark col-12 col-sm-12 ">
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
      <?php $i=1;  ?>
      <?php foreach ($isitabel as $k) :?>
      <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $k['u_pln']; ?></td>
        <td><?= $k['link']; ?></td>
        <td class="text-center"><?= $k['product']; ?></td>
        <td class="text-center"><?= $k['bandwith']; ?> Mbps</td>
        <td class="text-center"><?= $k['service_id']; ?></td>
        <td class="text-center"><?= $k['asman']; ?></td>
        <td class="text-center"><?= $k['peru']; ?></td>
        <td class="text-center"><?= $k['jml']; ?></td>
        <td class="text-center"><?= $k['dur']; ?></td>
        <td class="text-center"><?= $k['stan']; ?>%</td>
        <td class="text-center"><?= $k['rele']; ?>%</td>
        <td><div class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit Data"><i class="fas fa-pencil-alt"></i></div></td>
         <td><div class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash-alt"></i></div></td>
      <?php $i++ ?>
      <?php endforeach; ?>
      </tr>
   
  </tbody>
</table>
<button type="button" class="btn btn-primary col-md-2  offset-md-10" data-toggle="modal" data-target="#TambahData">
              <i class="fa fa-plus"></i> 
                    Tambah Data
        </button>
  
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="TambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
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
          <div class="form-group">
            <label>JUMLAH GANGGUAN</label>
            <input type="text" name="jml" class="form-control">
          </div>
          <div class="form-group">
            <label>DURASI GANGGUAN</label>
            <input type="text" name="dur" class="form-control">
          </div>
          <div class="form-group">
            <label>STANDARD AVAILABILITY</label>
            <input type="text" name="stan" class="form-control">
          </div>
          <div class="form-group">
            <label>REALISASI AVAILABILITY</label>
            <input type="text" name="rele" class="form-control">
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