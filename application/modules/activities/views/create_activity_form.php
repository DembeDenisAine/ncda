<div class="row">
    <div class="col-md-12">
        
        <input type="hidden" name="objective_id" value="<?php echo $objective->id; ?>">
         <input type="hidden" name="id" value="<?php echo @$activity->id; ?>">

        <div class="form-group">
            <label>Activity Title</label>
            <textarea class="form-control" rows="1" name="activity_name" style="width: 100%;"><?=@$activity->activity_name?></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Activity Description</label>
            <textarea class="form-control summernote" rows="10" name="activity_description" style="width: 100%;"><?=@$activity->activity_description?></textarea>
        </div>
    </div>
</div>