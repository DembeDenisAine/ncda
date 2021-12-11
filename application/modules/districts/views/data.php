
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Branches/Districts</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Branches/District List</li>
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