
<div class="modal" id="import-contacts">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" enctype="multipart/form-data" action="<?= site_url('import-contacts') ?>">
      
    <div class="modal-header">
        <h3>Import <?=(@$meeting)?'Participants':'Contacts'?></h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
            
            <?php require('import_contacts_form.php'); ?>

        <a class="btn btn-default" href="<?=base_url()?>uploads/contacts_template.xlsx">Download template</a>
            
        <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Submit Contacts</button>
        </div>
    </div>
    </form>
    </div>
</div>
</div>