<div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Title</label>
                <select class="form-control"  name="title" style="width: 100%;">

                <?php   foreach(poeple_titles() as $key => $value): ?>
                 <option <?=($value == @$member->title)?'selected':''?> ><?=$value?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label>First Name</label>
                <input placeholder="First Name" class="form-control"  name="fname" style="width: 100%;" value="<?=(@$member)?$member->firstname:''?>" />
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label>Last Name</label>
                <input placeholder="Last Name" class="form-control"  name="lname" style="width: 100%;" value="<?=(@$member)?$member->lastname:''?>" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Member Role</label>
                <input placeholder="Member Role" class="form-control"  name="role" style="width: 100%;" value="<?=(@$member)?$member->role:''?>" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Member Email</label>
                <input placeholder="Member Email Address" class="form-control"  name="email" style="width: 100%;" value="<?=(@$member)?$member->email_address:''?>" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Member Phone Number</label>
                <input placeholder="Member Phone Number" class="form-control"  name="phone" style="width: 100%;" value="<?=(@$member)?$member->phone_no:''?>" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Tenure Start <small>(Year)</small></label>
                <input placeholder="Year e.g 1999" class="form-control"  name="from_year" style="width: 100%;" value="<?=(@$member)?$member->from_year:''?>" />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Tenure End <small>(Year)</small></label>
                <input placeholder="Year e.g 1999" class="form-control"  name="to_year" style="width: 100%;" value="<?=(@$member)?$member->to_year:''?>" />
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Member Organization <small>(Suscriber)</small></label>
                <select class="form-control"  name="subscriber_id" style="width: 100%;">
                    <option value="">None</option>
                    <?php   foreach(get_subscribers() as $sub): ?>
                    <option <?=($sub->id == @$member->subscriber_id)?'selected':''?> value="<?=$sub->id?>" ><?=$sub->subscriber_name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        

    </div>