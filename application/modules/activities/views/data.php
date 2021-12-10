
<!-- INICIO: Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3>Activities </h3>
                    <h6><?php if(!empty($actv_name)){ echo 'Activity: '.$actv_name; } ?></h6>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Activity List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <?php if(!empty($actv_id)) { ?>
                                    <a href="<?php echo base_url('create-activity/'.$actv_id);?>" 
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
                                        <th>Activity Title</th>
                                        <?php if(empty($actv_name)) { ?>
                                            <th>Activity Title</th>
                                        <?php } ?> 
                                        <th>Details</th>
                                        <th>Parameters</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  if($activities): $i=0;  foreach($activities as $actv): $i++; ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $actv->activity_name; ?></td>

                                            <?php if(empty($actv_name)) { ?>
                                                <td><?php echo $actv->objective_name; ?></td>
                                            <?php } ?> 

                                            <td><?php echo $actv->activity_description; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('parameter-list/'.$actv->id);?>" 
                                                class="btn btn-success btn-sm">Parameters</a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('edit-activity/'.$actv->id);?>" 
                                                class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-activity/'.$actv->id);?>" 
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- FIN: Contenido-->
