<a href="<?php echo base_url('objective-list/'.$objective->project_id);?>" 
class="btn btn-primary btn-sm pull-right"><i class="fas fa-arrow-left"></i> Back to  Project Objective</a>

<?php require_once('add_activity_modal.php'); ?>

<a href="#add_activity" data-toggle="modal" class="btn btn-success btn-sm pull-right"><i class="fas fa-plus"></i> Create New Activity</a>

<hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
        <div class="col-md-12">
            <label>Objective:</label>
             <h5><?php echo $objective->objective_name; ?></h5>
            <div class="grid"> 
                <div><strong><i class="fa fa-check-circle text-muted"></i> Last Updated:</strong> <?php echo time_ago($objective->updated_at); ?></div>
            </div>
        </div>
    </div>
</div>
<br>

<h4 class="text-muted">Activities</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Activity Title</th>
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

