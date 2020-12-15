<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tabel Peminjaman</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Kendaraan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Peminjam</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Kendaraan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Peminjam</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pinjam as $key) { ?>
                                        <tr id="<?= $key->id_peminjaman; ?>">
                                            <td><?= $i++; ?></td>
                                            <td><?= $key->id_peminjam; ?></td>
                                            <td><?= $key->id_kendaraan; ?></td>
                                            <td><?= $key->status; ?></td>
                                            <td><?= $key->ket; ?></td>
                                            <td><?= $key->tanggal_peminjaman; ?></td>
                                            <td><?= $key->tanggal_pengembalian; ?></td>
                                            <td>
                                                <button class="btn btn-circle terima_sewa">
                                                    Terima
                                                </button>
                                                <button class="btn btn-circle tolak_sewa">Tolak</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->