
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h6><b>Branch: <?php echo $district;?></b>,<?php echo $facility;?> Facility Teams </h6>
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
                            <a href="<?=site_url('create-facility-member')?>/<?php echo $facility_id; ?>" class="btn btn-info pull-right">Add Member <i class="fas fa-plus"></i></a>
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

                                    <?php if($teams): ?>
                                    <?php $i=0; foreach($teams as $tm): $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $tm['first_name']." ".$tm['last_name']; ?></td>
                                        <td><?php echo $tm['gender']; ?></td>
                                        <td><?php echo $tm['title']; ?></td>
                                        <td><?php echo $tm['contact']; ?></td>
                                        <td><?php echo $tm['title']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('edit-district/'.$tm['id']);?>" 
                                            class="btn btn-primary btn-sm">Edit</a> 
                                            <a href="<?php echo base_url('delete-district/'.$tm['id']);?>" 
                                            class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
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