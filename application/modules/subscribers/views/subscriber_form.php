<div class="row">
        <div class="col-md-6">
             
            <div class="form-group">
                <label>Member Organization Name</label>
                <textarea placeholder="Member Name" class="form-control" rows="2" name="name" style="width: 100%;"><?=(@$subscriber)?$subscriber->subscriber_name:''?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Organization Address</label>
                <textarea placeholder="Member Address e.g Kyebando" class="form-control" rows="2" name="address" style="width: 100%;"><?=(@$subscriber)?$subscriber->address:''?></textarea>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Organization Telephone</label>
                <input placeholder="subscriber Telephone" class="form-control"  name="phone" style="width: 100%;" value="<?=(@$subscriber)?$subscriber->phone_no:''?>" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Member Email</label>
                <input placeholder="Member Email Address" class="form-control"  name="email" style="width: 100%;" value="<?=(@$subscriber)?$subscriber->email:''?>" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Year of Joining<small>(Year)</small></label>
                <input placeholder=" e.g 1999" class="form-control"  name="since" style="width: 100%;" value="<?=(@$subscriber)?$subscriber->since:''?>" />
            </div>
        </div>


        <div class="col-md-2">
            <div class="form-group">
                <label>Status</label>
                <select class="form-control"  name="status" style="width: 100%;">
                    <option value="1" <?=(@$subscriber->is_active == 1)?'selected':''?> >Active</option>
                    <option value="0" <?=(@$subscriber->is_active == 0)?'selected':''?>>In-Active</option>
                </select>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label>Member Description</label>
                <textarea placeholder="Notes about the subscriber" class="form-control summernote" rows="2" name="desc" style="width: 100%;"><?=(@$subscriber)?$subscriber->subscriber_description:''?>
                </textarea>
            </div>
        </div>
    </div>