<?php date_default_timezone_set("Asia/Jakarta"); ?>
<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Input Saldo
                </h4>
            </div>
            <div class="col-auto">
                
            <button href="" class="btn btn-sm btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahsaldo" >
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Saldo
                    </span>
            </button>
            <div id="tambahsaldo" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content">
                        <!-- heading modal -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Saldo</h4>
                        </div>
                        <!-- body modal -->
                        <div class="modal-body">
                        
                        <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="INDUK_COA">Pilih Induk Coa</label>
                    <div class="col-md-6">
                    <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
                    <select class="form-control" name="INDUK_COA" Change="INDUK_COA" id="INDUK_COA">
                          <option>--Pilih Induk Coa--</option>
                          <?php
                          foreach ($coa as $row) { ?>

                            <option value="<?= $row->INDUK_COA ?>"><?= $row->INDUK_COA?> : <?= $row->NAMA_PERKIRAAN ?> </option>
                          <?php } ?>
                        </select>
                    </div>
                               <br> <br> 
                    <label class="col-md-4 text-md-right" for="INDUK_COA">Jumlah Tambah Saldo</label>
                    <div class="col-md-6">
                    <input value="<?= set_value('SALDO_AWAL'); ?>" type="text" id="SALDO_AWAL" name="SALDO_AWAL" class="form-control" placeholder="Masukan Tambah Saldo">
                        <?= form_error('SALDO_AWAL', '<span class="text-danger small">', '</span>'); ?>
                    </div>

                    <br> <br> 
                    <label class="col-md-4 text-md-right" for="INDUK_COA">Tanggal Input</label>
                    <div class="col-md-6">
                    <?php $date = date('d-M-y | h:m'); ?>
                        <input value="<?= $date; ?>" type="text" id="TGL_INPUT" name="TGL_INPUT" class="form-control" placeholder="TGL_INPUT" readonly>
                        <?= form_error('TGL_INPUT', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                          </div>
                          </div>

                <?= form_close(); ?>
                        </div>
                        <!-- footer modal -->
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Pop-up</button>
                        </div> -->
                    </div>
                </div>
            </div>



                <a href="<?= base_url('inputsaldo/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Master Input Saldo
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
                    <th>Induk Coa</th>
                    <th>Nama Perkiraan</th>
                    <th>Bagian</th>
                    <th>Saldo Awal</th>
                    <th>Total Saldo</th>
                    

                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($input_saldo) :
                    foreach ($input_saldo as $input_saldoo) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $input_saldoo['TGL_INPUT']; ?></td>
                            <td><?= $input_saldoo['INDUK_COA']; ?></td>
                            <td><?= $input_saldoo['NAMA_PERKIRAAN']; ?></td>
                            <td><?= $input_saldoo['BAGIAN']; ?></td>
                            <td>Rp. <?= number_format($input_saldoo['SALDO_AWAL'],0,',','.'); ?></td>
                            <td>Rp. <?= number_format($input_saldoo['TOTAL_SALDO'],0,',','.'); ?></td>
                            
                            <!-- <td>
                                
                                <a href="<?= base_url('subcoa2/edit/') . $input_saldoo['id'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('subcoa2/delete/') . $input_saldoo['id'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
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