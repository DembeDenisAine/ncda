
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
