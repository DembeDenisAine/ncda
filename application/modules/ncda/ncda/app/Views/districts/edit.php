<?= $this->extend('layouts/admin') ?>

<?= $this->section('pagestyles') ?>
<!-- INICIO: Page CSS-->
<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="<?= base_url('adminLTE') ?>/plugins/dropzone/min/dropzone.min.css">
<!-- FIN: Page CSS-->
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit District</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=site_url('district-list')?>">District List</a></li>
                        <li class="breadcrumb-item active">Edit District</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <form method="post" action="<?= site_url('update-district') ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>District Name</label>
                                    <input type="text" class="form-control" name="district_name"
                                    value="<?php echo $dt_obj['district_name']; ?>"
                                     style="width: 100%;">
                                    <input type="hidden" class="form-control" name="active" value="1">
                                    <input type="hidden" name="id" value="<?php echo $dt_obj['id']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Region</label>
                                    <select type="hidden" class="form-control select2" name="region" style="width: 100%;">
                                        <option disabled>Select Region</option>
                                        <option value="Central Region" <?php if($dt_obj['region']=='Central Region'){echo 'selected';} ?>>Central Region</option>
                                        <option value="Eastern Region" <?php if($dt_obj['region']=='Eastern Region'){echo 'selected';}  ?>>Eastern Region</option>
                                        <option value="Northern Region" <?php if($dt_obj['region']=='Northern Region'){echo 'selected';}  ?>>Northern Region</option>
                                        <option value="Western Region" <?php if($dt_obj['region']=='Western Region'){echo 'selected';} ?>>Western Region</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea class="form-control" rows="10" name="notes" 
                                    style="width: 100%;"><?php echo $dt_obj['notes']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info pull-right">   
                        Save Changes<i class="fas fa-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- FIN: Contenido-->
<?= $this->endSection() ?>

<?= $this->section('pagescript') ?>
<!-- INICIO: Page JS-->
<!-- Select2 -->
<script src="<?= base_url('adminLTE') ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('adminLTE') ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('adminLTE') ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('adminLTE') ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('adminLTE') ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('adminLTE') ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('adminLTE') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('adminLTE') ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url('adminLTE') ?>/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?= base_url('adminLTE') ?>/plugins/dropzone/min/dropzone.min.js"></script>
<!-- FIN: Page JS-->
<script>

    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>
<?= $this->endSection() ?>