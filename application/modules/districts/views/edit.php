
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