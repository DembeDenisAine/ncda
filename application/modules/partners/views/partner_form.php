<div class="row">
        <div class="col-md-6">
             
            <div class="form-group">
                <label>Partner Name</label>
                <textarea placeholder="Partner Name" class="form-control" rows="2" name="name" style="width: 100%;"><?=(@$partner)?$partner->partner_name:''?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Partner Address</label>
                <textarea placeholder="Partner Address e.g Kyebando" class="form-control" rows="2" name="address" style="width: 100%;"><?=(@$partner)?$partner->address:''?></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Partner Telephone</label>
                <input placeholder="Partner Telephone" class="form-control"  name="phone" style="width: 100%;" value="<?=(@$partner)?$partner->phone_no:''?>" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Partner Email</label>
                <input placeholder="Partner Email Address" class="form-control"  name="email" style="width: 100%;" value="<?=(@$partner)?$partner->email:''?>" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Partner Since <small>(Year)</small></label>
                <input placeholder="Partner since e.g 1999" class="form-control"  name="since" style="width: 100%;" value="<?=(@$partner)?$partner->since:''?>" />
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Partner Description</label>
                <textarea placeholder="Notes abot the partnership" class="form-control summernote" rows="2" name="desc" style="width: 100%;"><?=(@$partner)?$partner->partner_description:''?>
                </textarea>
            </div>
        </div>
    </div>