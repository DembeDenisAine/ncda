
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3>Objectives </h3>
                    <h6><?php if(!empty($district)){ echo 'Branch: '.$district; } ?></h6>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Facility List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <?php if(!empty($district)) { ?>
                                    <a href="<?php echo base_url('create-facility/'.$district);?>" 
                                    class="btn btn-success btn-sm pull-right">Create <i class="fas fa-plus"></i></a>
                                <?php } ?> 
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                
                <!-- /.col -->
            </div>
            <!-- /.row -->

        
            <!-- /.row -->
        </div><!-- /.container-fluid -->

