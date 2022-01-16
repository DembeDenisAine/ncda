
<div class="modal" id="create-meeting">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" action="<?= site_url('save-meeting') ?>">
      
    <div class="modal-header">
        <h3>Create New Meeting</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-12">
                        <label>Meeting Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Meeting title">
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Meeting Venue</label>
                         <input type="text" class="form-control" name="venue" placeholder="Meeting Venue">
                    </div>
                    <div class="form-group">
                        <label>Meeting Date</label>
                         <input type="text" class="form-control datepicker" autocomplete="off" name="date" placeholder="Meeting Date">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Start Time</label>
                            <input type="text" class="form-control time" name="start_time" placeholder="Start Time">
                        </div>

                        <div class="form-group col-md-6">
                            <label>End  Time</label>
                            <input type="text" class="form-control time" name="end_time" placeholder="End Time">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="7" name="description" style="width: 100%;"> </textarea>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Save Meeting</button>
        </div>
    </div>
    </form>
    </div>
</div>
</div>