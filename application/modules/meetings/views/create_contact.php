
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
            <div class="form-group col-md-2">
                        <label>Title</label>
                        <select class="form-control" name="gender" required>
                            <option value="">Choose</option>
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                            <option>Dr.</option>
                            <option>Prof.</option>
                            <option>Hon.</option>
                            <option>He.</option>
                            <option>Hi.</option>
                        </select>
                </div>
                <div class="form-group col-md-5">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                </div>

                <div class="form-group col-md-5">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telephone</label>
                         <input type="tel" class="form-control" name="phone" placeholder="Telephone" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                         <input type="tel" class="form-control" name="mobile" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                         <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                        <label>Organization</label>
                         <input type="text" class="form-control" name="organization" placeholder="Organization" required>
                    </div>
                    <div class="form-group">
                        <label>Addresss</label>
                        <textarea class="form-control" rows="7" name="address" style="width: 100%;" required> </textarea>
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