
<div class="modal" id="discussion<?=$row->id?>">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" action="<?= site_url('save-discussion') ?>">
      
    <div class="modal-header">
        <h4>Discussion Details</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <h3 aria-hidden="true">&times;</h3>
        </button>
    </div>

    <div class="modal-body" style="max-height: 500px; overflow-y:auto;">
       
            <h4><?php echo nl2br($row->item_name); ?></h4>
            <hr>
            <p>
                <?php echo nl2br($row->item_details); ?>
            </p>
     </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-info pull-right">Close</button>
        </div>
    </form>
    </div>
</div>
</div>