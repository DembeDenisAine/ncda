
<!-- <a href="<?=site_url('create-district')?>" class="btn btn-info pull-right">Add a District <i class="fas fa-plus"></i></a> -->

<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Add a Branch  <i class="fas fa-plus"></i></button>

<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Branch Name</th>
            <th>Region</th>
            <th>Ficilities</th>
            <th>Teams</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php if($districts): ?>
        <?php $i=0; foreach($districts as $proj): $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $proj['district_name']; ?></td>
            <td><?php echo $proj['region']; ?></td>
            
            <td>
                <a href="<?php echo base_url('facility-list/'.$proj['id']);?>" 
                class="btn btn-primary btn-sm">Ficilities</a> 
            </td>
            <td>
                <a href="<?php echo base_url('teams-district/'.$proj['id']);?>" 
                class="btn btn-primary btn-sm">Teams</a> 
            </td>
            <td>
                <a href="<?php echo base_url('edit-district/'.$proj['id']);?>" 
                class="btn btn-primary btn-sm">Edit</a> 
                <a href="<?php echo base_url('delete-district/'.$proj['id']);?>" 
                class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>

<!-- Create Branch Modeal ------------>
<div class="modal fade" id="modal-default">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add New Branch</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" action="<?= site_url('save-district') ?>">
                <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch/District Name</label>
                                        <input type="text" class="form-control" name="district_name" style="width: 100%;">
                                        <input type="hidden" class="form-control" name="active">
                                    </div>
                                    <div class="form-group">
                                        <label>Region</label>
                                        <select type="text" class="form-control select2" name="region" style="width: 100%;">
                                            <option >Select Region</option>
                                            <option value="Central Region">Central Region</option>
                                            <option value="Eastern Region">Eastern Region</option>
                                            <option value="Northern Region">Northern Region</option>
                                            <option value="Western Region">Western Region</option>
                                        </select>
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
                    
                  </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save <i class="fas fa-plus"></i></button>
                </div>
            </form>
          </div>
      </div>
  </div>