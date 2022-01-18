
<div class="row">
    <div class="col-md-6">

        <input type="hidden" name="id" value="<?php echo @$row->id; ?>">

        <div class="form-group">
            <label>Recipient Facility</label>
            <select class="form-control" name="facility_id" required>
                <option value="">Choose Facility</option>
                <?php foreach($facilities as $facility): ?>
                    <option <?=($facility['id']==@$row->id)?'selected':''?> value="<?=$facility['id']?>"><?=$facility['facility_name']?></option>
                 <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Item value</label>
            <input class="form-control" type="number" name="value" value="<?php echo @$row->item_value; ?>">
        </div>
     
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Transaction Description</label>
            <textarea class="form-control summernote" rows="1" 
            name="description" 
            style="width: 100%;"><?=(@$row)?@$row->description:''?></textarea>
        </div>
    </div>
</div>

