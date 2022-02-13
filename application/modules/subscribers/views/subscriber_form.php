<div class="row">
        <div class="col-md-6">
             
            <div class="form-group">
                <label>Subscriber Name</label>
                <textarea placeholder="Subscriber Name" class="form-control" rows="2" name="name" style="width: 100%;"><?=(@$subscriber)?$subscriber->subscriber_name:''?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Subscriber Address</label>
                <textarea placeholder="Subscriber Address e.g Kyebando" class="form-control" rows="2" name="address" style="width: 100%;"><?=(@$subscriber)?$subscriber->address:''?></textarea>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>subscriber Telephone</label>
                <input placeholder="subscriber Telephone" class="form-control"  name="phone" style="width: 100%;" value="<?=(@$subscriber)?$subscriber->phone_no:''?>" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Subscriber Email</label>
                <input placeholder="Subscriber Email Address" class="form-control"  name="email" style="width: 100%;" value="<?=(@$subscriber)?$subscriber->email:''?>" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Subscriber Since <small>(Year)</small></label>
                <input placeholder="Subscriber since e.g 1999" class="form-control"  name="since" style="width: 100%;" value="<?=(@$subscriber)?$subscriber->since:''?>" />
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Subscriber Description</label>
                <textarea placeholder="Notes about the subscriber" class="form-control summernote" rows="2" name="desc" style="width: 100%;"><?=(@$subscriber)?$subscriber->subscriber_description:''?>
                </textarea>
            </div>
        </div>
    </div>