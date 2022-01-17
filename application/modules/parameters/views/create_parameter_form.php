
<div class="row">
    <div class="col-md-12">

        <input type="hidden" name="activity_id" value="<?php echo $activity->id; ?>">

        <div class="form-group">
            <label>Parameter Title</label>
            <textarea class="form-control" rows="1" name="parameter_name" style="width: 100%;">
                <?=(@$param)?$param->parameter_name:''?> 
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Parameter Description</label>
            <textarea class="form-control summernote" rows="3" name="parameter_description" style="width: 100%;">
                <?=(@$param)?$param->parameter_description:''?> 
            </textarea>
        </div>
    </div>
</div>

