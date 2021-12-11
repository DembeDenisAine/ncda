
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3>Add Branch Team</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=site_url('district-list')?>">Teams List</a></li>
                <li class="breadcrumb-item active">Create Team Member</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
<!-- Main content -->
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <form method="post" action="<?= site_url('save-branch-team') ?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" style="width: 100%;">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" style="width: 100%;">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select type="text" class="form-control select2" name="gender" style="width: 100%;">
                                <option >Select---</option>
                                <option value="Central Region">Male</option>
                                <option value="Eastern Region">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="dob" style="width: 100%;">
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" class="form-control" name="contact" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea type="text" class="form-control" rows="5" name="notes" style="width: 100%;"> </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info pull-right">   
                Save <i class="fas fa-plus"></i>
                </button>
            </div>
        </form>
    </div>
</div>
