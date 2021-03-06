<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Peminjaman</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Peminjaman</a></li>
      <li class="breadcrumb-item">List</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List Peminjaman</h6>
          <div class="btn-group">
            <a href="<?= base_url('peminjaman/tambah') ?>" class="m-0 float-right btn btn-primary btn-sm">
              <i class="fa fa-plus-circle"></i> Tambah
            </a>
            <button onclick="exportlistpeminjaman()" class="m-0 float-right btn btn-default btn-sm">
              <i class="fa fa-download"></i> Export
            </button>
          </div>
          
        </div>
        <div class="table-responsive p-3">
          <span style="color: red; font-style: italic; font-size: 12px">Filter berdasarkan status dan range tanggal.</span>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label">Filter</label>
            <div class="col-sm-2">
              <select class="form-control form-control-sm" id="status" title="Status">
                <option value="semua">Semua</option>
                <option value="pinjam">Pinjam</option>
                <option value="kembali">Kembali</option>
              </select>
            </div>
            <div class="col-sm-2">
              <input type="date" class="form-control form-control-sm" id="tgl_awal" value="<?= date('Y-m-01') ?>" title="Tanggal Awal">
            </div>
            <div class="col-sm-2">
              <input type="date" class="form-control form-control-sm" id="tgl_akhir" value="<?= date('Y-m-t') ?>" title="Tanggal Akhir">
            </div>
            <?php if($this->uri->segment(2) == "filter"): ?>
              <div class="btn-group mb-1">
                <a href="<?= base_url('peminjaman') ?>"><i class="fa fa-history"></i></a>
              </div>
            <?php endif; ?>
          </div>

          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>NO</th>
                <th>ID PINJAM</th>
                <th>MEMBER</th>
                <th>JUDUL BUKU</th>
                <th>TGL PINJAM</th>
                <th>TGL KEMBALI</th>
                <th>STATUS</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($listdata as $value): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->id_peminjaman ?></td>
                <td><?= $value->nama_member ?></td>
                <td><?= $value->judul_buku ?></td>
                <td><?= $this->date_format->short_datetime($value->tgl_pinjam) ?></td>
                <td><?= short_datetime($value->tgl_kembali) ?></td>
                <td><?= $value->status_pinjam ?></td>
                <td>
                  <div class="btn-group">
                    <a href="<?= base_url('peminjaman/ubah/' . $value->id_peminjaman) ?>" class="btn btn-success btn-sm" title="Edit"><span class="fa fa-edit"></span></a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  function filterData()
  {
    var status = $('#status').val();
    var tgl_awal = $('#tgl_awal').val();
    var tgl_akhir = $('#tgl_akhir').val();

    window.location.href = "<?= base_url('peminjaman/filter/') ?>" + status + "/" + tgl_awal + "/" + tgl_akhir;
  }

  $('#status').change(function(e) {
    filterData();
  });

  $('#tgl_awal').change(function(e) {
    filterData();
  });

  $('#tgl_akhir').change(function(e) {
    filterData();
  });

  $(document).ready(function(){
    var filter = "<?= $this->uri->segment(3) ?>";
    if(filter != "")
    {
      $('#status').val("<?= $this->uri->segment(3) ?>");
      $('#tgl_awal').val("<?= $this->uri->segment(4) ?>");
      $('#tgl_akhir').val("<?= $this->uri->segment(5) ?>");
    }
  });

  function exportlistpeminjaman()
  {
    var status = $('#status').val();
    var startdate = $('#tgl_awal').val();
    var enddate = $('#tgl_akhir').val();
    window.location.href = "<?= base_url('peminjaman/exportlistpeminjaman/') ?>" + status + "/" + startdate + "/" + enddate;
  }
</script>