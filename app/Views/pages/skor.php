<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="col-sm p-3 min-vh-100 p-5">
  <h1>Riwayat Pertandingan</h1>

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
    
  <button type="button" class="btn btn-primary mt-4" id="add_score" onclick="showForm()">Input skor pertandingan baru</button>
  <button type="button" class="btn btn-secondary mt-4 d-none" id="close" onclick="closeForm()">Tutup</button>
  <form class="row g-3 needs-validation mt-3 mb-5 d-none" method="post" id="inputscore" novalidate>
    <?php csrf_field() ?>
    <div class="col-12">
      <div class="row">
        <div class="col-md-3 col-8">
          <label for="validationCustom01" class="form-label"><small class="text-danger">*</small> Klub 1</label>
          <select name="klub1" class="form-select" required aria-label="select example">
            <option value="">Pilih Klub 1</option>
            <?php foreach ($klub as $data) : ?>
              <option value=<?= $data['id']; ?>><?= $data['klub']; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">Mohon pilih klub yang sesuai</div>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
    
        <div class="col-md-2 col-2">
          <label for="validationCustom02" class="form-label"><small class="text-danger">*</small> Skor 1</label>
          <input type="number" name="skor1" min="0" class="form-control" id="validationCustom02" value="<?= old('skor1'); ?>" required autocomplete="off" placeholder="Skor Klub 1">
          <div class="valid-feedback">Looks good!</div>
          <div class="invalid-feedback">Skor harus diisi</div>
        </div>
        <div class="col-md-1 col-2 text-center align-middle">
          <h5 class="">VS</h5>
        </div>
        <div class="col-md-3 col-8">
          <label for="validationCustom01" class="form-label"><small class="text-danger">*</small> Klub 2</label>
          <select name="klub2" class="form-select" required aria-label="select example">
            <option value="">Pilih Klub 2</option>
            <?php foreach ($klub as $data) : ?>
              <option value=<?= $data['id']; ?>><?= $data['klub']; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">Mohon pilih klub yang sesuai</div>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-2 col-2">
          <label for="validationCustom02" class="form-label"><small class="text-danger">*</small> Skor 2</label>
          <input type="number" name="skor2" min="0" class="form-control" id="validationCustom02" value="<?= old('skor2'); ?>" required autocomplete="off" placeholder="Skor Klub 2">
          <div class="valid-feedback">Looks good!</div>
          <div class="invalid-feedback">Skor harus diisi</div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Save</button>
        </div>
      </div>
    </div>
  </form>

  <div class="row mb-4">
    <div class="col">
      <div class="card bg-light mb-3 mt-3" style="--bs-bg-opacity: .03;">
        <div class="card-body">
          <?php $no=1; foreach($pertandingan as $data): ?>
              <div class="card bg-light rounded-5 fs-5 my-2" style="--bs-bg-opacity:.03;">
                <div class="card-body d-flex justify-content-around">
                  <div>
                    <?= $data['klub1']; ?>
                  </div>
                  <div class="badge bg-primary rounded-5 fs-6">
                      <?= $data['skor1']; ?> <span class="mx-3">vs</span> <?= $data['skor2']; ?>
                  </div>
                  <div>
                    <?= $data['klub2']; ?>
                  </div>
                </div>
              </div>
          <?php $no++; endforeach; ?>
        </div>
      </div>

    </div>
  </div>

</div>
<?= $this->endSection(); ?>