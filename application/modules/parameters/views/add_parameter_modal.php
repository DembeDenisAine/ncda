<div class="modal fade" id="add_parameter">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('save-parameter') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
                <h4>Add New Parameter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <h3 aria-hidden="true">&times;</h3>
                </button>
            </div>
            <div class="modal-body">
                <?php require_once('create_parameter_form.php'); ?>
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">   
                    <i class="fas fa-save"></i> Save Parameter
                    </button>
            </div>
        </div>
        
        </form>
    </div>
</div>
       