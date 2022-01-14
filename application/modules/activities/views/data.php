 
                        
<?php if(!empty($actv_id)) { ?>
        <a href="<?php echo base_url('create-activity/'.$actv_id);?>" 
        class="btn btn-success btn-sm pull-right">Create <i class="fas fa-plus"></i></a>
    
<!-- /.card-header -->
<hr>
<?php } ?>

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
                <td><?php echo $actv['activity_name']; ?></td>

                <?php if(empty($actv_name)) { ?>
                    <td><?php echo $actv['objective_name']; ?></td>
                <?php } ?> 

                <td><?php echo $actv['activity_description']; ?></td>
                <td>
                    <a href="<?php echo base_url('parameter-list/'.$actv['id']);?>" 
                    class="btn btn-success btn-sm">Parameters</a>
                </td>
                <td>
                    <a href="<?php echo base_url('edit-activity/'.$actv['id']);?>" 
                    class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-activity/'.$actv['id']);?>" 
                    class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

