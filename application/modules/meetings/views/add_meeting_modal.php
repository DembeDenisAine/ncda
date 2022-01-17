
<div class="modal" id="create-meeting">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" action="<?= site_url('save-meeting') ?>">
      
    <div class="modal-header">
        <h3>Create New Meeting</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
            
        <?php require_once('meeting_form.php'); ?>

        <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Save Meeting</button>
        </div>
    </div>
    </form>
    </div>
</div>
</div>