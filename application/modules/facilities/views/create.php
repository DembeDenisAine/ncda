
<form method="post" action="<?= site_url('save-district') ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>District Name</label>
                    <input type="text" class="form-control" name="district_name" style="width: 100%;">
                    <input type="hidden" class="form-control" name="active">
                </div>
                <div class="form-group">
                    <label>Region</label>
                    <select type="text" class="form-control select2" name="region" style="width: 100%;">
                        <option >Select Region</option>
                        <option value="Central Region">Central Region</option>
                        <option value="Eastern Region">Eastern Region</option>
                        <option value="Northern Region">Northern Region</option>
                        <option value="Western Region">Western Region</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea type="text" class="form-control" rows="10" name="notes" style="width: 100%;"> </textarea>
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