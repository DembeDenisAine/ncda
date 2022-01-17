<div class="modal fade" id="edit_parameter<?=$param->id?>">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('update-parameter') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
               Update  Parameter
            </div>
            <div class="modal-body">
                <?php require('create_parameter_form.php'); ?>
                <input type="hidden" name="id" value="<?php echo $param->id; ?>">
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
       