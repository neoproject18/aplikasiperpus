<!-- Modal Member -->
<div class="modal fade" id="modal-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table align-items-center table-flush" id="dataTable">
          <thead class="thead-light">
            <th>NO.</th>
            <th>NO. MEMBER</th>
            <th>NAMA</th>
          </thead>
          <tbody>
            <?php $no=1; foreach($list_member as $value): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value->id_member ?></td>
              <td><?= $value->nama_member ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>

<!-- Modal Buku Tersedia -->
<div class="modal fade" id="modal-buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table align-items-center table-flush" id="dataTable2">
          <thead class="thead-light">
            <th>NO.</th>
            <th>JUDUL / JUMLAH</th>
            <th>PENULIS</th>
            <th>PENERBIT / TAHUN</th>
          </thead>
          <tbody>
            <?php foreach($list_buku as $value): ?>
            <tr>
              <td><?= $value->id_buku ?></td>
              <td><?= $value->judul_buku . ' / ' . $value->sisa ?></td>
              <td><?= $value->penulis ?></td>
              <td><?= $value->penerbit ?> / <?= $value->tahun_terbit ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var table_member = $('#dataTable').DataTable();

    $('#dataTable tbody').on('click', 'tr', function(){
      var data_member = table_member.row(this).data();
      $('#id_member').val(data_member[1]);
      $('#nama_member').val(data_member[2]);
      $('#modal-member').modal('hide');
    });


    var table_buku = $('#dataTable2').DataTable();

    $('#dataTable2 tbody').on('click', 'tr', function(){
      var data_buku = table_buku.row(this).data();
      $('#id_buku').val(data_buku[0]);
      $('#judul_buku').val(data_buku[1]);
      $('#penulis').val(data_buku[2]);
      $('#penerbit_tahun').val(data_buku[3]);
      $('#modal-buku').modal('hide');
    });
  });
</script>