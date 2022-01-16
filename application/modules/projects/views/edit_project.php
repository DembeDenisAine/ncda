
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Project</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=site_url('project-list')?>">Projects List</a></li>
                        <li class="breadcrumb-item active">Edit Project</li>
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
                <form method="post" action="<?= site_url('update-project') ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Project Title</label>

                                    <input type="hidden" name="id" value="<?php echo $project_obj->id; ?>">
                                    <textarea class="form-control" rows="3" 
                                    name="project_name" style="width: 100%;"><?php echo $project_obj->project_name; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control date" name="start_date" value="<?php echo $project_obj->start_date; ?>"
                                             style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>End date</label>
                                            <input type="date"  class="form-control date" value="<?php echo $project_obj->end_date; ?>"
                                            name="end_date" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Budget(numbers only)</label>
                                            <input type="number" value="<?php echo $project_obj->budget; ?>" class="form-control date" name="budget" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Currency</label>
                                            <select id="currencyList" type="text" name="currency" class="form-control select2" style="width: 100%;">
                                                <option>select-----</option>
                                                <option value="EUR">Euro (EUR)</option>
                                                <option value="JPY">Japanese yen (JPY)</option>
                                                <option value="GBP">Pound sterling (GBP)</option>
                                                <option value="USD">United States dollar (USD)</option>
                                                <option value="ANG">Netherlands Antillean guilder (ANG)</option>
                                                <option value="AUD">Australian dollar (AUD)</option>
                                                <option value="AWG">Aruban florin (AWG)</option>
                                                <option value="RWF">Rwandan franc (RWF)</option>
                                                <option value="TZS">Tanzanian shilling (TZS)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="10" name="project_description" 
                                    style="width: 100%;"><?php echo $project_obj->project_description; ?></textarea>
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
