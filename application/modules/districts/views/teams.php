
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>[<?php echo $district->district_name;?>] Branch -Teams </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Branch -Teams </li>
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
                            <h3 class="card-title">
                            <a href="<?=site_url('create-district')?>" class="btn btn-info pull-right">Add a District <i class="fas fa-plus"></i></a>
                            </h3>
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