<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="col-sm p-3 min-vh-100 p-5">
  <h1>Data Klub</h1>
  
  <div class="mt-3">
    <?php if(session()->getFlashdata('pesan')): ?>
      <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
        <div><?= session()->getFlashdata('pesan'); ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
        <div><?= session()->getFlashdata('error'); ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
  </div>
  
  <button type="button" class="btn btn-primary btn-sm mt-4" id="add_klub" onclick="showForm()">Add Klub</button>
  <button type="button" class="btn btn-secondary btn-sm mt-4 d-none" id="close" onclick="closeForm()">Tutup</button>
  <form class="row g-3 needs-validation mt-3 mb-5 d-none" method="post" novalidate>
    <?php csrf_field() ?>
    <div class="col-md-4 col-12">
      <label for="validationCustom01" class="form-label"><small class="text-danger">*</small> Nama Klub</label>
      <input type="text" name="klub" class="form-control" id="validationCustom01" value="<?= old('klub'); ?>" required autocomplete="off">
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Nama klub tidak boleh kosong
      </div>
    </div>
    <div class="col-md-4 col-12">
      <label for="validationCustom02" class="form-label"><small class="text-danger">*</small> Kota Klub</label>
      <input type="text" name="kota" class="form-control" id="validationCustom02" value="<?= old('kota'); ?>" required autocomplete="off">
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Kota harus diisi
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Save</button>
    </div>
  </form>
  <div class="row mb-4">
    <div class="col">

      <div class="card bg-light mb-3 mt-4" style="--bs-bg-opacity: .03;">
        <div class="card-body">
          <table class="table text-white">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Klub</th>
                <th scope="col">Kota</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach($allklub as $klub): 
              ?>
              <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $klub['klub']; ?></td>
                <td><?= $klub['kota']; ?></td>
              </tr>
              <?php $no++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

</div>
<?= $this->endSection(); ?>