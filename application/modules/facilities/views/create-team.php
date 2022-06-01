
        <div class="row">
            <input type="hidden" name="facility_id" value="<?=$facility_id ?>">
            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" style="width: 100%;">
                    <input type="hidden" 
                            class="form-control" placeholder="First Name" name="district_id" value="<?php echo $district_id; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" placeholder="Last Name" class="form-control" name="last_name" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" class="form-control" name="title" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gender</label>
                    <select type="text" class="form-control select2" name="gender" style="width: 100%;" required>
                        <option >Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" class="form-control" placeholder="Date of birth" name="dob" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" placeholder="Contact Number" name="contact" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email"  style="width: 100%;">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Notes</label>
                    <textarea type="text" class="form-control" rows="3" name="notes" style="width: 100%;"></textarea>
                </div>
            </div>
        </div>
