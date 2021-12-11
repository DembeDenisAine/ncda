
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Activities - Parameters</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=site_url('parameter-list')?>/<?php echo $actv_id; ?>">Parameter List</a></li>
                        <li class="breadcrumb-item active">New Parameter</li>
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
                <form method="post" action="<?= site_url('save-parameter') ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Activity Title</label>

                                    <input type="hidden" name="activity_id" value="<?php echo $actv_id; ?>">
                                   
                                    <textarea class="form-control" rows="3" readonly
                                       style="width: 100%;"><?php echo $actv_name; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Parameter Title</label>
                                    <textarea class="form-control" rows="3" name="parameter_name" style="width: 100%;"> </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="10" name="parameter_description" style="width: 100%;"> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info pull-right">   
                        Save <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>