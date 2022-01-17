<div class="row">
        <div class="col-md-12">
        
            <input type="hidden" name="project_id" value="<?php echo $project->id; ?>">
                
            <div class="form-group">
                <label>Objective Title</label>
                <textarea class="form-control" rows="2" name="objective_name" style="width: 100%;"> 
                    <?=(@$obj)?$obj->objective_name:''?>
              </textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Objective Description</label>
                <textarea class="form-control summernote" rows="5" name="objective_description" style="width: 100%;">
                    <?=(@$obj)?$obj->objective_description:''?>
                </textarea>
            </div>
        </div>
    </div>