<div class="modal fade" id="edit_activity<?=$activity->id?>">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('update-activity') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
            <h4>Update Activity</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <h3 aria-hidden="true">&times;</h3>
                </button>
            </div>
            <div class="modal-body">
                <?php require('create_activity_form.php'); ?>
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">   
                            Save Changes <i class="fas fa-plus"></i>
                    </button>
            </div>
        </div>
        
        </form>
    </div>
</div>
       