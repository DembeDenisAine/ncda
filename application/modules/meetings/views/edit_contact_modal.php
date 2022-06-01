
<div class="modal" id="contact<?=$row->id?>">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" action="<?= site_url('update-contact') ?>">
      
    <div class="modal-header">
        <h3><?php echo $row->first_name." ".$row->last_name; ?></h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
            
            <?php require('contact_form.php'); ?>
            <input type="hidden" name="contact" value="<?=$row->id?>">

            <?php if(@$meeting): ?>
                    <input type="hidden" name="meeting" value="<?=$meeting->id?>">
            <?php endif; ?>
            
        <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Save Changes</button>
        </div>
    </div>
    </form>
    </div>
</div>
</div>