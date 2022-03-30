<div class="modal fade" id="del<?=$activity->id?>">
    <div class="modal-dialog modal-sm ">
       <form method="post" action="<?= site_url('update-activity') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
            <h4>Delete Activity</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <h3 aria-hidden="true">&times;</h3>
                </button>
            </div>
            <div class="modal-body">
                Delete <?=$activity->activity_name?> ?
            </div>
            <div class="modal-footer">
                   <a data-dismiss="modal" class="btn btn-default">   
                            Cancel
                    </a>
                    <a href="<?php echo base_url('delete-activity/'.$activity->id);?>/<?=$objective->id?>" class="btn btn-danger pull-right">   
                            YES <i class="fas fa-trash"></i>
                    </a>
            </div>
        </div>
        
        </form>
    </div>
</div>
       