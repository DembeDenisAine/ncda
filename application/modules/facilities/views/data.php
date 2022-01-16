
<?php if(!empty($district)) { ?>
    <button type="button" class="btn btn-default" data-toggle="modal" 
    data-target="#modal-facility">Add Facility <i class="fas fa-plus"></i></button>
<hr>
<?php } ?> 

<table class="table table-bordered">
<thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Facility</th>
        <?php if(empty($district)) { ?>
            <th>Branch</th>
        <?php } ?> 
        <th>Teams</th>
        <th style="width: 150px">Action</th>
    </tr>
</thead>
<tbody>
    <?php  if($facilities): $i=0;  foreach($facilities as $fty): $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $fty['facility_name']; ?></td>

            <?php if(empty($district)) { ?>
                <td><?php echo $fty['district_name']; ?></td>
            <?php } ?> 
            <td>
                <a href="<?php echo base_url('facility-teams/'.$fty['id']);?>" 
                class="btn btn-success btn-sm">Teams</a>
            </td>
            <td>
                <a href="<?php echo base_url('edit-facility/'.$fty['id']);?>" 
                class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-facility/'.$fty['id']);?>" 
                class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    <?php endforeach; endif; ?>

</tbody>
</table>



<!-- Create Branch Modeal ------------>
<div class="modal fade" id="modal-facility">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h6 class="modal-title">Add Facility</h6>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" action="<?= site_url('save-facility') ?>">
                <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Facility Name</label>
                                        <input type="text" class="form-control" name="facility_name" style="width: 100%;">
                                        <input type="hidden" class="form-control" name="district_id" value="<?php echo $district_id; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Branch</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $district; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" class="form-control" rows="5" name="facilty_description" style="width: 100%;"> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                  </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info btn-xs">Save <i class="fas fa-plus"></i></button>
                </div>
            </form>
          </div>
      </div>
  </div>