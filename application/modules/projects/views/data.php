
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Projects</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bordered Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Project Title</th>
                                        <th style="width: 100px">Starts on</th>
                                        <th style="width: 100px">Ends on</th>
                                        <th>Duration</th>
                                        <th>Details</th>
                                        <th>Objectives</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if($projects): ?>
                                    <?php foreach($projects as $proj): ?>
                                    <tr>
                                        <td><?php echo $proj->id; ?></td>
                                        <td><?php echo $proj->project_name; ?></td>
                                        <td><?php echo $proj->start_date; ?></td>
                                        <td><?php echo $proj->end_date; ?></td>
                                        <td><?php echo $proj->duration; ?></td>
                                        <td><?php echo $proj->project_description; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('objective-list/'.$proj->id);?>" 
                                            class="btn btn-success btn-sm">Objectives</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('edit-project/'.$proj->id);?>" 
                                            class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-project/'.$proj->id);?>" 
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