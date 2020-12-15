<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Menu</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Menu</th>
          </tr>
        </tfoot>
        <tbody>
          <!-- <tr>
            <td>Donna Snider</td>
            <td>Customer Support</td>
            <td>New York</td>
          </tr> -->
          <?php
          $no = 1;
          foreach ($tb_users as $u) {
          ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $u->nama ?></td>
              <td><?php echo $u->email ?></td>
              <td><?php echo $u->role ?></td>
              <td>
                <?php echo anchor('crud/edit/' . $u->id, 'Edit'); ?>
                <?php echo anchor('crud/hapus/' . $u->id, 'Hapus'); ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>