<?php require_once('add_activity_modal.php'); ?>


<div class="container">
<h4 class="text-muted">Branch Activities</h4>

<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add_activity"><i class="fas fa-plus"></i>  Add Activity</button>

<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Activity Title</th>
            <th>Details</th>
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
                <td><?php echo $activity->activity_description; ?></td>
                <td>
                    <a href="<?php echo base_url('branch-param/'.$activity->id);?>" 
                    class="btn btn-primary btn-sm">Details</a> <a href="<?php echo base_url('delete-activity/'.$activity->id);?>" 
                    class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>
</div>

