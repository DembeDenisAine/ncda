
<div class="modal" id="edit_meeting<?=$row->id?>">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" action="<?= site_url('update-meeting') ?>">
      
    <div class="modal-header">
        <h3>Edit Meeting</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
            
        <?php require('meeting_form.php'); ?>

        <input type="hidden" name="id" value="<?=$row->id?>" />

        <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Save Changes</button>
        </div>
    </div>
    </form>
    </div>
</div>
</div>