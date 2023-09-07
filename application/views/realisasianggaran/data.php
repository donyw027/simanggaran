<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Coa
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('subcoa1/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Sub Coa 2
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th width="30">No.</th>
                    <th>Tgl Input</th>
                    <th>Nama Perkiraan</th>
                    <th>Bagian</th>
                    <th>Nama Realisasi</th>
                    <th>Saldo Awal</th>
                    <th>Biaya Realisasi</th>
                    <th>Sisa Saldo</th>
                    <th>Total Saldo</th>
                    <th>No Coa</th>
                    

                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($realisasi) :
                    foreach ($realisasi as $realisasii) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $realisasii['TGL_INPUT']; ?></td>
                            <td><?= $realisasii['NAMA_PERKIRAAN']; ?></td>
                            <td><?= $realisasii['BAGIAN']; ?></td>
                            <td><?= $realisasii['NAMA_REALISASI']; ?></td>
                            <td>Rp. <?= number_format($realisasii['SALDO_AWAL'],0,',','.'); ?></td>
                            <td>Rp. <?= number_format($realisasii['BIAYA_REALISASI'],0,',','.'); ?></td>
                            <td>Rp. <?= number_format($realisasii['SISA_SALDO'],0,',','.'); ?></td>
                            <td>Rp. <?= number_format($realisasii['TOTAL_SALDO'],0,',','.'); ?></td>
                            <td><?= $realisasii['NO_COA']; ?></td>
                            

                            <!-- <td>
                                
                                <a href="<?= base_url('subcoa2/edit/') . $realisasii['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('subcoa2/delete/') . $realisasii['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td> -->
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan Coa baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>