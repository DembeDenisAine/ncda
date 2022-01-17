<div class="modal fade" id="add_activity">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('save-activity') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
                
            </div>
            <div class="modal-body">
                <?php require_once('create_activity_form.php'); ?>
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">   
                            Save Activity <i class="fas fa-plus"></i>
                    </button>
            </div>
        </div>
        
        </form>
    </div>
</div>
       