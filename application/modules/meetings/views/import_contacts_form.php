<div class="row">
            
    <div class="form-group">
        <label>Choose File</label>
        <input type="file" name="import_file"/>
        <?php if(@$meeting): ?>
        <input type="hidden" name="meeting" value="<?=$meeting->id?>" />  
        <?php endif; ?>  
   </div>  
</div>