

<div class="row">
    <div class="btn-group">
        <button type="button" class="btn btn-default" data-toggle="modal" 
        data-target="#modal-facility">Add Facility <i class="fas fa-plus"></i></button>
         <a href="<?=base_url()?>facility-list?pdf=1"  class="btn btn-warning btn-sm pull-right">Export Pdf <i class="fas fa-download"></i></a>
     </div> 
</div>
<br>

<?php if(!empty($district)): ?>
    <h4><?=$district?> Facilities</h4>
<?php endif; ?>

 <form class="mt-2" method="POST" action="<?=site_url('facility-list')?>">
                                    
    <label for="hint">Search</label>
    <div class="input-group">
            <input value="<?=$search?>" id="hint" type="text" placeholder="Search here..." class="form-control" name="search">
        <button  class="input-group-addon btn bg-primary flat"  type="submit" class="btn btn-primary">Search</button>
    </div>
                                    
 </form>

<hr>


<table class="table table-bordered">
<thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Facility</th>
        <?php if(empty($district)) { ?>
            <th>Branch</th>
        <?php } ?>
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
                <div class="dropdown">
                    <button class="btn bg-primary btn-xs dropdown-toggle btn-select-option"
                            type="button"
                            data-toggle="dropdown">Options
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu options-dropdown" style="padding: 10px;">

                       <li>
                        <a href="<?php echo base_url('facility-teams/'.$fty['id']);?>">
                          <i class="fas fa-users"></i> View Teams</a>
                        </li>

                        <li>
                            <a href="#edt<?php echo $fty['id'];?>"  data-toggle="modal">
                            <i class="fas fa-edit"></i>  Edit Facility</a>
                        </li>
                        <li>
                            <a href="#del<?php echo $fty['id']; ?>" data-toggle="modal">
                             <i class="fas fa-trash"></i> Delete Facility</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>

        <!-- Delete facility Modeal ------------>
        <div class="modal fade" id="del<?php echo $fty['id']; ?>">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('delete-facility') ?>/<?php echo $fty['id']; ?>/<?php echo $district_id; ?>">
                            <div class="modal-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                            This action is irreversible! Are you sure you want to delete <br> <u><?php echo $fty['facility_name']; ?></u>?
                                            <input type="hidden" name="id" value="<?php echo $fty['id']; ?>">
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

        <!-- Edit facility Modeal ------------>
        <div class="modal fade" id="edt<?php echo $fty['id'];?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit Facility: <u><?php echo $fty['facility_name']; ?></u></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?= site_url('update-facility') ?>/<?php echo $fty['id'];?>">
                        <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Facility Name</label>
                                                <input type="text" class="form-control" name="facility_name" value="<?php echo $fty['facility_name']; ?>" style="width: 100%;">
                                                <input type="hidden" class="form-control" name="district_id" value="<?php echo $district_id; ?>">

                                                <input type="hidden" class="form-control" name="id" value="<?php echo $fty['id'];?>">
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
                                                <textarea type="text" class="form-control" rows="5" name="facilty_description" style="width: 100%;"><?php echo $fty['facilty_description']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info btn-xs">Save Changes <i class="fas fa-plus"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php endforeach; endif; ?>

</tbody>
</table>



<!-- Create facility Modeal ------------>
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