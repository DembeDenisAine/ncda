
<div class="modal" id="import-discussions">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" enctype="multipart/form-data" action="<?= site_url('import-discussions') ?>">
      
    <div class="modal-header">
        <h3>Import Discussions</h3>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
            
        <?php require('import_contacts_form.php'); ?>


        <a class="btn btn-default" href="<?=base_url()?>uploads/discussions_template.xlsx">Download template</a>
         
        <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Submit</button>
        </div>
    </div>
    </form>
    </div>
</div>
</div>