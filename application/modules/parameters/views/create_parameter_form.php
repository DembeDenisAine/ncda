
<div class="row">
    <div class="col-md-12">

        <input type="hidden" name="activity_id" value="<?php echo $activity->id; ?>">

        <div class="form-group">
            <label>Indicator Title</label>
            <textarea class="form-control" rows="2" 
            name="parameter_name" style="width: 100%;"><?=(@$param)?$param->parameter_name:''?></textarea>
        </div>

        <div class="form-group">
            <label>Indicator Target Value</label>
            <input class="form-control" type="number"  name="target" value="<?=(@$param)?$param->target_value:''?>" autocomplete="off" />
        </div>

         <div class="form-group col-lg-5 col-md-12 col-sm-12">
            <label>Core Objective</label>
            <select class="form-control select2" name="core_id">
                <option>None</option>
                <?php foreach(core_objectives() as $coreobj): 
                    $selected = (@$param->core_objective_id ==$coreobj->id)?'selected':'';
                ?>
                    <option <?php echo $selected;  ?> value="<?php echo $coreobj->id; ?>"><?php echo $coreobj->objective_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Indicator Description</label>
            <textarea class="form-control summernote" rows="3" 
            name="parameter_description" 
            style="width: 100%;"><?=(@$param)?$param->parameter_description:''?></textarea>
        </div>
    </div>
</div>

