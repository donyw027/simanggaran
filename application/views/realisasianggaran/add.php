<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-2">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="NO_COA">INDUK_COA</label>
                    <div class="col-md-6">
                    <select class="form-control" name="NO_COA" Change="NO_COA" id="NO_COA">
                          <option>--Pilih Induk Coa--</option>
                          <?php
                          foreach ($coa as $row) { ?>

                            <option value="<?= $row->INDUK_COA ?>"><?= $row->INDUK_COA?> : <?= $row->NAMA_PERKIRAAN ?> </option>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="NO_SUB_COA_1">NO_SUB_COA_1</label>
                    <div class="col-md-6">
                    <select class="form-control" name="NO_SUB_COA_1">
                          <option>--Pilih Sub Coa 1--</option>
                          <?php
                          foreach ($subcoa1 as $row) { ?>

                            <option value="<?= $row->NO_SUB_COA_1 ?>"><?= $row->NO_SUB_COA_1?> : <?= $row->NAMA_PERKIRAAN ?> </option>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="NO_SUB_COA_2">NO_SUB_COA_2</label>
                    <div class="col-md-6">
                    <select class="form-control" name="NO_SUB_COA_2">
                          <option>--Pilih Sub Coa 2--</option>
                          <?php
                          foreach ($subcoa2 as $row) { ?>

                            <option value="<?= $row->NO_SUB_COA_2 ?>"><?= $row->NO_SUB_COA_2?> : <?= $row->NAMA_PERKIRAAN ?> </option>
                          <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="NAMA_PERKIRAAN">NAMA_PERKIRAAN</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('NAMA_PERKIRAAN'); ?>" type="text" id="NAMA_PERKIRAAN" name="NAMA_PERKIRAAN" class="form-control" placeholder="NAMA_PERKIRAAN">
                        <?= form_error('NAMA_PERKIRAAN', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="BAGIAN">BAGIAN</label>
                    <div class="col-md-6">
                    <?php 
                        $role = $this->session->userdata('login_session')['role'];
                        ?>
                        <input value="<?= $role ?>" type="text" id="BAGIAN" name="BAGIAN" class="form-control" placeholder="BAGIAN" readonly>
                        <?= form_error('BAGIAN', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>    
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="NAMA_REALISASI">NAMA_REALISASI</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('NAMA_REALISASI'); ?>" type="text" id="NAMA_REALISASI" name="NAMA_REALISASI" class="form-control" placeholder="NAMA_REALISASI">
                        <?= form_error('NAMA_REALISASI', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="SALDO_AWAL">SALDO_AWAL</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('SALDO_AWAL'); ?>" type="text" id="SALDO_AWAL" name="SALDO_AWAL" class="form-control" placeholder="SALDO_AWAL">
                        <?= form_error('SALDO_AWAL', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="BIAYA_REALISASI">BIAYA_REALISASI</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('BIAYA_REALISASI'); ?>" type="text" id="BIAYA_REALISASI" name="BIAYA_REALISASI" class="form-control" placeholder="BIAYA_REALISASI">
                        <?= form_error('BIAYA_REALISASI', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="SISA_SALDO">SISA_SALDO</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('SISA_SALDO'); ?>" type="text" id="SISA_SALDO" name="SISA_SALDO" class="form-control" placeholder="SISA_SALDO">
                        <?= form_error('SISA_SALDO', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="TOTAL_SALDO">TOTAL_SALDO</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('TOTAL_SALDO'); ?>" type="text" id="TOTAL_SALDO" name="TOTAL_SALDO" class="form-control" placeholder="TOTAL_SALDO">
                        <?= form_error('TOTAL_SALDO', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

               
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="TGL_INPUT">TGL_INPUT</label>
                    <div class="col-md-6">
                        <?php $date = date('d-M-y | h:m'); ?>
                        <input value="<?= $date; ?>" type="text" id="TGL_INPUT" name="TGL_INPUT" class="form-control" placeholder="TGL_INPUT">
                        <?= form_error('TGL_INPUT', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                
                
                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>