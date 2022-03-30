<div class="modal fade" id="add_membership">
    <div class="modal-dialog modal-lg ">
       <form method="post" action="<?= site_url('save-membership') ?>">
          
        <div class="modal-content">
                     
            <div class="modal-header"> 
                <h4>Add Membership</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <h3 aria-hidden="true">&times;</h3>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-12">
                    
                        <input type="hidden" name="subscriber_id" value="<?php echo $subscriber->id; ?>">
                            
                        <div class="form-group">
                            <label>Number of Members</label>
                            <input class="form-control" type="number" placeholder="Number members"  name="membership" />
                        </div>

                        <div class="form-group">
                            <label>Date Reported</label>
                            <input class="form-control datepicker" type="text" placeholder="Date reported"  name="date" />
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right">   
                    <i class="fas fa-save"></i> Save Membership
                    </button>
            </div>
        </div>
        
        </form>
    </div>
</div>
       