<div class="modal" id="add-discussion">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" action="<?= site_url('save-discussion') ?>">
      
    <div class="modal-header">
        <h3>Add Discussion</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <h3 aria-hidden="true">&times;</h3>
        </button>
    </div>

    <div class="modal-body">
            
            <?php require_once('discussion_form.php'); ?>
            <input type="hidden" name="meeting" value="<?=$meeting->id?>" />
  
    </div>
              
    <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Save Discussion</button>
    </div>

    </form>
    </div>
</div>
</div>