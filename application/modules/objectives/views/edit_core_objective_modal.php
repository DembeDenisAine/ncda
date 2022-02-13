<div class="modal fade" id="edit_objective<?=$obj->id?>">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('update-objective') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
                <h4>UUpdate Core Objective</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <h3 aria-hidden="true">&times;</h3>
                </button>
            </div>
            <div class="modal-body">
                <?php require('create_objective_form.php'); ?>
                <input type="hidden" name="id" value="<?=$obj->id?>">
                <input type="hidden" name="is_core" value="1">
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
       