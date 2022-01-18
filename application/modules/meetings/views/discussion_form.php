<div class="row">
    <div class="form-group col-md-12">
            <label>Discussed Item/Topic</label>
            <input type="text" class="form-control" value="<?=(@$row)?@$row->item_name:''?>" name="topic" placeholder="Item or Topic" required>
    </div>

    <div class="form-group col-md-12">
            <label>Discussion Details</label>
            <textarea name="details" rows="8"  class="summernote" required><?=(@$row)?@$row->item_details:''?></textarea>
    </div>
    
</div>