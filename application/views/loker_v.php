<ul class="nav nav-tabs" id="tab-loker" role="tablist">
  <li class="nav-item">
    <a href="#thread" class="nav-link active" id="list-thread" data-toggle="tab" role="tab">List Thread</a>
  </li>
  <li class="nav-item">
    <a href="#detail-thread" class="nav-link" id="d-thread" data-toggle="tab" role="tab">Detail Thread</a>
  </li>
</ul>
<!-- List All Thread -->
<div class="tab-content" id="content-tabs">
  <!-- Tabs Thread -->
  <div class="tab-pane fade show active" id="thread" role="tabpanel">
    <div class="card shadow mb-4">
      <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Thread</h6>
      </div> -->
      <div class="col-sm-4 mt-2">
        <button class="btn btn-primary btn-tambah" id="add-loker">Add</button>
      </div>
      <div class="card-body"> <!-- Start 1 -->
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($all_thread as $thread): ?>
                <tr>
                  <td><?= $thread->id ?></td>
                  <td><?= $thread->judul_thread ?></td>
                  <td><?= $thread->ket_thread ?></td>
                  <td><?= $thread->tanggal ?></td>
                  <td><?= $thread->alamat_thread ?></td>
                  <td class="text-center">
                    <button dataID="<?= $thread->id ?>" class="btn btn-secondary btn-sm mb-1 btnLihat">
                      <i class="fa fa-book"></i>
                    </button>
                    <button dataID="<?= $thread->id ?>" class="btn btn-primary btn-sm mb-1 btnEdit">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button dataID="<?= $thread->id ?>" class="btn btn-danger btn-sm btnHapus">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div> <!-- End 1 -->
    </div>
  </div>
  <!-- Akhir Tab Thread -->
  
  <!-- Tab Detail Thread -->
  <div class="tab-pane fade" id="detail-thread" role="tabpanel">
    <div class="card shadow mb-4">
      <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Thread</h6>
      </div> -->
      <div class="col-sm-4 mt-2">
        <button class="btn btn-primary btn-tambah" id="add-detail">Add Detail</button>
      </div>
      <div class="card-body"> <!-- Start 1 -->
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Uraian</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="table-detail">
              <tr>
                <td colspan="4">Data Kosong !!!</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> <!-- End 1 -->
    </div>
  </div>
  <!-- Akhir Detail Thread -->
</div>
<!-- Akhir List Thread -->

<!-- Modal Edit -->
<div class="modal fade" tabindex="-1" id="modal-loker" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!-- Bagian Judul Modal -->
      <div class="modal-header">
        <h5 class="modal-title" id="title-modal">Modal</h5>

        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Akhir Bagian -->

      <!-- Bagian Body Modal -->
      <div class="modal-body">
        <form action="" id="form" link="<?= base_url('admin'); ?>" enctype="multipart/form-data">
          <input type="hidden"  value="" id="id">
          <div class="form-group">
            <label for="Judul">Judul</label>
            <input type="text" class="form-control" id="Judul" name="Judul">
          </div>
          <div class="form-group">
            <label for="Ket">Keterangan</label>
            <textarea class="form-control" name="Ket" id="Ket" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="Tgl">Tanggal</label>
            <input type="text" class="form-control tgl-entry col-sm-3" id="Tgl" name="Tgl">
          </div>
          <div class="form-group">
            <label for="Alamat">Alamat</label>
            <input type="text" class="form-control" id="Alamat" name="Alamat">
          </div>
          <div class="form-group">
            <label for="Logo">Logo</label>
            <input type="file" class="form-control-file col-sm-4" id="Logo" name="Logo">
            <img src="" class="img-preview">
            <small id="info" class="form-text text-muted">Max Ukuran Logo 250 x 150</small>
          </div>
        </form>
      </div>
      <!-- Akhir Bagian -->

      <!-- Bagian Footer Modal -->
      <div class="modal-footer">
        <button class="btn btn-primary" id="btn-save">Save</button>
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <!-- Akhir Bagian -->
    </div>
  </div>  
</div>
<!-- Akhir Modal Edit