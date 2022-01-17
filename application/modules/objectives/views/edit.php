<a href="<?php echo base_url('objective-list/'.$project->id);?>" 
    class="btn btn-primary btn-sm pull-right"> <i class="fas fa-arrow-left"></i> Back to Project Objectives</a>
<hr>

<form method="post" action="<?= site_url('update-objective') ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Objective Title</label>

                    <input type="hidden" name="id" value="<?php echo $objective->id; ?>">
                    <input type="hidden" name="project_id" value="<?php echo $project->id; ?>">
                    <textarea class="form-control" name="objective_name"  style="width: 100%;">
                        <?php echo $objective->objective_name; ?>
                   </textarea>
                </div>
               
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control summernote" rows="10" name="objective_description" 
                    style="width: 100%;"><?php echo $objective->objective_description; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary pull-right">   
        <i class="fas fa-save"></i> Save Changes
        </button>
    </div>
</form>