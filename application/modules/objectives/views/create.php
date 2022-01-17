<div class="row">
        <div class="col-md-6">
        <div class="form-group">
                <label>Project Title</label>

                <input type="hidden" name="project_id" value="<?php echo $project->id; ?>">
                
                <textarea class="form-control" rows="3" readonly
                    style="width: 100%;"><?php echo $project->project_name; ?></textarea>
            </div>

            <div class="form-group">
                <label>Objective Title</label>
                <textarea class="form-control" rows="3" name="objective_name" style="width: 100%;"> </textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="10" name="objective_description" style="width: 100%;"> </textarea>
            </div>
        </div>
    </div>