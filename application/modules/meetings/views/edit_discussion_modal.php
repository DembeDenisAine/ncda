<div class="modal" id="edit-discussion<?=$row->id?>">
<div class="modal-dialog modal-lg">
            
  <form method="post" action="<?= site_url('save-discussion') ?>">
       
    <div class="modal-content">
 
        <div class="modal-header">
            <h3>Update Discussion</h3>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <h3 aria-hidden="true">&times;</h3>
            </button>
        </div>

        <div class="modal-body">
                
                <?php require('discussion_form.php'); ?>

                <input type="hidden" name="meeting" value="<?=$meeting->id?>" />
                <input type="hidden" name="discussion" value="<?=$row->id?>" />
                
        </div>
        
        <div class="modal-footer">
                <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Save Changes</button>
        </div>

    </div>
    
    </form>
</div>
</div>