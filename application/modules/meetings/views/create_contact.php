
<div class="modal" id="create-contact">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    
    <form method="post" action="<?= site_url('save-contact') ?>">
      
    <div class="modal-header">
        <h3>Create New Contact</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="title" placeholder="First Name">
                </div>

                <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="title" placeholder="Last Name">
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Organization</label>
                         <input type="text" class="form-control" name="venue" placeholder="Organization">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                         <input type="text" class="form-control" name="date" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                         <input type="email" class="form-control" name="date" placeholder="Email">
                    </div>
                
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Addresss</label>
                        <textarea class="form-control" rows="7" name="description" style="width: 100%;"> </textarea>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right"> <i class="fas fa-save"></i>  Save Contact</button>
        </div>
    </div>
    </form>
    </div>
</div>
</div>