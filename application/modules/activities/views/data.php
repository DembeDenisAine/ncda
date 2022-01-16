 
                        
<?php if(!empty($activity_id)) { ?>
        <a href="<?php echo base_url('create-activity/'.$activity_id);?>" 
        class="btn btn-success btn-sm pull-right">Create <i class="fas fa-plus"></i></a>
    
<!-- /.card-header -->
<hr>
<?php } ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Activity Title</th>
            <?php if(empty($activity_name)) { ?>
                <th>Activity Title</th>
            <?php } ?> 
            <th>Details</th>
            <th>Parameters</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
               if($activities): $i=0;  
               foreach($activities as $activity): 
               $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $activity->activity_name; ?></td>

                <?php if(empty($activity_name)) { ?>
                    <td><?php echo $activity->objective_name; ?></td>
                <?php } ?> 

                <td><?php echo $activity->activity_description; ?></td>
                <td>
                    <a href="<?php echo base_url('parameter-list/'.$activity->id);?>" 
                    class="btn btn-success btn-sm">Parameters</a>
                </td>
                <td>
                    <a href="<?php echo base_url('edit-activity/'.$activity->id);?>" 
                    class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-activity/'.$activity->id);?>" 
                    class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

