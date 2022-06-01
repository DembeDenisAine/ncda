<div class="row">
            <div class="form-group col-md-2">
                        <label>Title</label>
                        <select class="form-control" name="title" required>
                            <option value="">Choose</option>
                            <option <?=($row->title=='Mr.')?'selected':''?>>Mr.</option>
                            <option <?=($row->title=='Mrs.')?'selected':''?>>Mrs.</option>
                            <option <?=($row->title=='Ms.')?'selected':''?>>Ms.</option>
                            <option <?=($row->title=='Dr.')?'selected':''?>>Dr.</option>
                            <option <?=($row->title=='Prof.')?'selected':''?>>Prof.</option>
                            <option <?=($row->title=='Hon.')?'selected':''?>>Hon.</option>
                            <option <?=($row->title=='He.')?'selected':''?>>He.</option>
                            <option <?=($row->title=='Hi.')?'selected':''?>>Hi.</option>
                        </select>
                </div>
                <div class="form-group col-md-5">
                        <label>First Name</label>
                        <input type="text" value="<?=$row->first_name?>"  class="form-control" name="firstname" placeholder="First Name" required>
                </div>

                <div class="form-group col-md-5">
                        <label>Last Name</label>
                        <input type="text" value="<?=$row->last_name?>"  class="form-control" name="lastname" placeholder="Last Name" required>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="">Choose</option>
                            <option <?=($row->gender=='Male')?'selected':''?>>Male</option>
                            <option <?=($row->gender=='Female')?'selected':''?>>Female</option>
                        </select>
                  </div>
                    <div class="form-group">
                        <label>Telephone</label>
                         <input type="tel" value="<?=$row->phone?>"  class="form-control" name="phone" placeholder="Telephone" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                         <input type="tel" value="<?=$row->mobile?>"  class="form-control" name="mobile" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                         <input type="email" value="<?=$row->email?>"  class="form-control" name="email" placeholder="Email">
                    </div>
                
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Designation</label>
                         <input type="text" value="<?=$row->designation?>"  class="form-control" name="designation" placeholder="Designation" required>
                    </div>
                   <div class="form-group">
                        <label>Organization</label>
                         <input type="text" value="<?=$row->represents?>"  class="form-control" name="organization" placeholder="Organization" required>
                    </div>
                    <div class="form-group">
                        <label>Addresss</label>
                        <textarea class="form-control" rows="7" name="address" style="width: 100%;" required><?=$row->address?></textarea>
                    </div>
                </div>
            </div>