
      <?php  include 'add_teams_modal.php'; ?>

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h6><b><?php echo $district;?></b>,<?php echo $facility;?>  Team Members </h6>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Facility -Teams </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    <!-- Main content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                            <div class="btn-group">
                            <a href="#addteam_member" data-toggle="modal" class="btn btn-info">Adda Member <i class="fas fa-plus"></i></a>
                            <a href="<?=base_url()?>facility-teams/<?php echo $facility_id; ?>?pdf=1"  class="btn btn-warning btn-sm pull-right">Export Pdf <i class="fas fa-download"></i></a>
                            </div>
                        </div>

                                <form class="mt-2" method="POST" action="<?=site_url('facility-teams')?>/<?php echo $facility_id; ?>">
                                    
                                    <label for="hint">Search <small>(e.g seach by name,phone)</small></label>
                                    <div class="input-group">
                                            <input value="<?=$search?>" id="hint" type="text" placeholder="Search here..." class="form-control" name="search">
                                        <button  class="input-group-addon btn bg-primary flat"  type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                    
                                </form>

                         </div>

                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Title</th>
                                        <th>Facility</th>
                                        <th>Contact</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    if($teams): 
                                     $i=0; 
                                     foreach($teams as $tm):
                                     $i++; 
                                     require('edit_teams_modal.php');
                                     ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $tm['first_name']." ".$tm['last_name']; ?></td>
                                        <td><?php echo $tm['gender']; ?></td>
                                        <td><?php echo $tm['title']; ?></td>
                                        <td><?php echo $tm['contact']; ?></td>
                                        <td><?php echo $tm['title']; ?></td>
                                         <td>
                    <div class="dropdown">
                        <button class="btn bg-primary btn-sm dropdown-toggle btn-select-option"
                                type="button"
                                data-toggle="dropdown">Options
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu options-dropdown" style="padding: 10px;">
                            <li>
                                <a href="#edit-team<?php echo $tm['id'];?>" data-toggle="modal" 
                            class="btn btn-primary btn-xs">Edit</a>
                            </li>
                            <li>
                                <a href="#del<?php echo $tm['id']; ?>" class="btn btn-danger btn-xs" data-toggle="modal"> Delete</a>
                            </li>
                        </ul>
                    </div>
                </td>
                                    </tr>

                                     <!-- Delete Modeal ------------>
            <div class="modal fade" id="del<?php echo $tm['id']; ?>">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form method="post" action="<?= site_url('delete-branch-staff') ?>/<?php echo $tm['id']; ?>/<?php echo $tm['district_id']; ?>">
                            <div class="modal-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                            This action is irreversible! Are you sure you want to delete <br> <u><?php echo $tm['first_name']." ".$tm['last_name']; ?></u>?
                                            <input type="hidden" name="id" value="<?php echo $tm['id']; ?>">
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

                                    <?php endforeach; ?>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                    <!-- /.card -->

                </div>
                
                <!-- /.col -->
            </div>
            <!-- /.row -->

        
            <!-- /.row -->
        </div><!-- /.container-fluid -->