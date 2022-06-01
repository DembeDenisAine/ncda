 
<?php
  $staff = (Object) $tm;
?>
 <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Facilty</label>
                    <select type="text" class="form-control select2" name="facility_id" style="width: 100%;">
                        <option value="">None</option>
                        <?php  foreach($facilities as $fty):?>
                            <option <?php if($staff->facility_id == $fty['id']){ echo "selected"; } ?> 
                            value="<?php echo $fty['id']?>"><?php echo $fty['facility_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" 
                    value="<?php echo $staff->first_name; ?>" style="width: 100%;">
                    <input type="hidden" 
                            class="form-control" name="district_id" value="<?php echo $district_id; ?>">

                    <input type="hidden" 
                            class="form-control" name="id" value="<?php echo $staff->id; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo $staff->last_name; ?>" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" class="form-control" placeholder="Designation" name="title" value="<?php echo $staff->title; ?>" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gender</label>
                    <select type="text" class="form-control select2" name="gender" style="width: 100%;">
                        <option >Select---</option>
                        <option <?php if($staff->gender == "Male"){ echo "selected"; } ?> value="Male">Male</option>
                        <option <?php if($staff->gender == "Female"){ echo "selected"; } ?> value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" name="dob" value="<?php echo $staff->dob; ?>" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="contact" value="<?php echo $staff->contact; ?>" style="width: 100%;">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $staff->email; ?>" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea type="text" class="form-control" rows="5" name="notes" style="width: 100%;"><?php echo $staff->notes; ?></textarea>
                </div>
            </div>
        </div>