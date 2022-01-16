<form method="post" action="<?= site_url('save-branch-team') ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Facilty</label>
                        <select type="text" class="form-control select2" name="facility_id" readonly style="width: 100%;">
                                <option value="<?php echo $facility_id; ?>" selected><?php echo $facility; ?></option>
                        </select>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" style="width: 100%;">

                    <input type="hidden" class="form-control" name="district_id" value="<?php echo $district_id; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" style="width: 100%;">
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gender</label>
                    <select type="text" class="form-control select2" name="gender" style="width: 100%;">
                        <option >Select---</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" name="dob" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="contact" style="width: 100%;">
                </div>
                <div class="form-group">
                    <label>Notes</label>
                    <textarea type="text" class="form-control" rows="3" name="notes" style="width: 100%;"> </textarea>
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