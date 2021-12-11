
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Objective - Activities</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=site_url('activity-list')?>/<?php echo $objective_obj['id']; ?>">Activity List</a></li>
                        <li class="breadcrumb-item active">New Activity</li>
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
                <form method="post" action="<?= site_url('update-activity') ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label>Objective Title</label>

                                    <input type="hidden" name="objective_id" value="<?php echo $objective_obj['id']; ?>">
                                   
                                    <textarea class="form-control" rows="3" readonly
                                       style="width: 100%;"><?php echo $objective_obj['objective_name']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Activity Title</label>
                                    <textarea class="form-control" rows="3" name="activity_name" style="width: 100%;"><?php echo $objective['activity_name']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="10" name="activity_description" style="width: 100%;"><?php echo $objective['activity_description']; ?></textarea>
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