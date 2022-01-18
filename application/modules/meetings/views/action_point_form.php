<div class="row">
    <div class="form-group col-md-12">
            <label>Action Point Notes</label>
            <textarea name="action" rows="8"  class="summernote" required><?=@$row->action_point?></textarea>
            <input type="hidden" value="<?=@$row->id?>" name="action_id" />
    </div>
    
</div>