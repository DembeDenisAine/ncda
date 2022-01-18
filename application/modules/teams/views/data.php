<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Branch Name</th>
            <th>Region</th>
            <th>Ficilities/Teams</th>
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
                <div class="dropdown">
                    <button class="btn bg-primary btn-xs dropdown-toggle btn-select-option"
                            type="button"
                            data-toggle="dropdown">Options
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu options-dropdown" style="padding: 10px;">
                        <li>
                        <a href="<?php echo base_url('facility-list/'.$proj['id']);?>"  
                        class="btn btn-primary btn-xs">Facilities</a> 
                        
                        <a href="<?php echo base_url('teams-district/'.$proj['id']);?>" 
                        class="btn btn-success btn-xs">Teams</a>
                        </li>
                    </ul>
                </div>
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn bg-primary btn-xs dropdown-toggle btn-select-option"
                            type="button"
                            data-toggle="dropdown">Options
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu options-dropdown" style="padding: 10px;">
                        <li>
                            <a  data-target="#edt<?php echo $proj['id'];?>"  data-toggle="modal" 
                            class="btn btn-success btn-xs">Edit <i class="fas fa-plus"></i></a>

                            <a href="#del<?php echo $proj['id']; ?>" class="btn btn-danger btn-xs"
                             data-toggle="modal"> Delete <i class="fas fa-minus"></i></a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>

            <!-- Delete Modeal ------------>
            <div class="modal fade" id="del<?php echo $proj['id']; ?>">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('delete-district') ?>/<?php echo $proj['id']; ?>">
                            <div class="modal-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                            This action is irreversible! Are you sure you want to delete <br> <u><?php echo $proj['district_name']; ?></u>?
                                            <input type="hidden" name="id" value="<?php echo $proj['id']; ?>">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete <i class="fas fa-minus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Branch Modeal ------------>
            <div class="modal fade" id="edt<?php echo $proj['id'];?>">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title">Eid Branch: <u><?php echo $proj['district_name']; ?></u></h5>
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
                                                    <input type="text" class="form-control" name="district_name" style="width: 100%;" value="<?php echo $proj['district_name']; ?>">
                                                    <input type="hidden" class="form-control" name="active">
                                                </div>
                                                <div class="form-group">
                                                    <label>Region</label>
                                                    <select type="text" class="form-control select2" name="region" style="width: 100%;">
                                                        <option >Select Region</option>
                                                        <option 
                                                        <?php if($proj['region'] == "Central Region"){ echo "selected";} ?> value="Central Region">Central Region</option>

                                                        <option 
                                                        <?php if($proj['region'] == "Eastern Region"){ echo "selected";} ?> 
                                                        value="Eastern Region">Eastern Region</option>
                                                        <option 
                                                        <?php if($proj['region'] == "Northern Region"){ echo "selected";} ?>  
                                                        value="Northern Region">Northern Region</option>
                                                        <option 
                                                        <?php if($proj['region'] == "Western Region"){ echo "selected";} ?>
                                                        value="Western Region">Western Region</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Notes</label>
                                                    <textarea type="text" class="form-control" rows="5" name="notes" style="width: 100%;"><?php echo $proj['notes']; ?></textarea>
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

        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>

<?php echo $links; ?>

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