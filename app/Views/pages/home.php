<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="col-sm p-3 min-vh-100 p-5">
  <h1>Selamat datang pada klasemen sepak bola</h1>

  <div class="row my-4">
    <div class="col">
      <div class="card bg-light mb-3" style="--bs-bg-opacity: .03;">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table text-white">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Klub</th>
                  <th scope="col">Ma</th>
                  <th scope="col">Me</th>
                  <th scope="col">S</th>
                  <th scope="col">K</th>
                  <th scope="col">GM</th>
                  <th scope="col">GK</th>
                  <th scope="col">Point</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach($klub as $data): ?>
                <tr>
                  <th scope="row"><?= $no ?></th>
                  <td><?= $data['klub']; ?></td>
                  <td><?= $data['main']; ?></td>
                  <td><?= $data['menang']; ?></td>
                  <td><?= $data['seri']; ?></td>
                  <td><?= $data['kalah']; ?></td>
                  <td><?= $data['gm']; ?></td>
                  <td><?= $data['gk']; ?></td>
                  <td><?= $data['point']; ?></td>
                </tr>
                <?php $no++; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
<?= $this->endSection(); ?>