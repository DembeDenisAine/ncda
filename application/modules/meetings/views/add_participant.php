<div class="modal" id="create-participant<?=@$row->id?>">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" action="<?= site_url('save-participant') ?>">
      
    <div class="modal-header">
        <h3>Add Participant</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
            
            <?php require_once('contact_form.php'); ?>
            <input type="hidden" name="meeting" value="<?=$meeting->id?>" />
            
        <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Save Participant</button>
        </div>
    </div>
    </form>
    </div>
</div>
</div>