<div class="modal fade" id="edit_partner<?=$partner->id?>">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('update-partner') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
                <h4><?=($partner->id)?'Edit':'Add'?> Donor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <h3 aria-hidden="true">&times;</h3>
                </button>
            </div>
            <div class="modal-body">
                <?php require('partner_form.php'); ?>
                 <input type="hidden" name="partner_id" value="<?php echo @$partner->id; ?>">
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">   
                    <i class="fas fa-save"></i> Save Changes
                    </button>
            </div>
        </div>
        
        </form>
    </div>
</div>
       