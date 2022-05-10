<form method="post" action="<?= site_url('save-branch-team') ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Facilty</label>
                    <select type="text" class="form-control select2" name="facility_id" style="width: 100%;">
                        <option value="Central Region">Select---</option>
                        <option value="">None</option>
                        <?php  foreach($facilities as $fty):?>
                            <option value="<?php echo $fty['id']?>"><?php echo $fty['facility_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" style="width: 100%;">
                    <input type="hidden" 
                            class="form-control" name="district_id" value="<?php echo $district_id; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
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
            </div>
            <div class="col-md-6">
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
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea type="text" class="form-control" rows="5" name="notes" style="width: 100%;"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info btn-xs pull-right">Save <i class="fas fa-plus"></i></button>
</form>