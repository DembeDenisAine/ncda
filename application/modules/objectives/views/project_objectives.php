<?php include('add_objective_modal.php'); ?>

<div class="btn-group">
<a href="<?php echo base_url('project-list');?>" 
    class="btn btn-primary btn-sm pull-right">Back to Projects <i class="fas fa-arrow-left"></i></a>

<?php if(!empty($proj_id)) { ?>
<a href="#add_objective"  data-toggle="modal"
class="btn btn-success btn-sm pull-right">New Objective <i class="fas fa-plus"></i></a>
<?php } ?>
</div>

 <hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
    <div class="row " >
        <div class="col-md-12">
            <label>Project:</label>
            <h4><?php echo $project->project_name; ?></h4>
            <label>Description: </label>
            <p><?php echo truncate($project->project_description,500); ?></p>
            <div class="grid">
                <div><strong><i class="fa fa-calendar"></i> Started:</strong> <?php echo text_date($project->start_date); ?></div>
                <div><strong><i class="fa fa-calendar"></i> Ends:</strong> <?php echo text_date($project->end_date); ?></div>
                <div><strong><i class="fa fa-clock"></i> Duration:</strong> <?php echo $project->duration; ?></div>
                <div><strong><i class="fa fa-check-circle"></i> Last Updated:</strong> <?php echo time_ago($project->updated_at); ?></div>
            </div>
        </div>
    </div>
    
    </div>
</div>
<br>
<br> 
<h3>Project Objectives</h3>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Objective Title</th>
            <th>Details</th>
            <th>Activities</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
           if($objectives): 
            $i = $page;  
            foreach($objectives as $obj):
                 $i++;
                 require('edit_objective_modal.php');
         ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $obj->objective_name; ?></td>
                <td><?php echo truncate($obj->objective_description,200); ?></td>
                <td>
                    <a href="<?php echo base_url('activity-list/'.$obj->id);?>" 
                    class="btn btn-success btn-sm">Activities</a>
                </td>
                <td>
                    <div class="btn-group">
                    <a href="#edit_objective<?=$obj->id?>" data-toggle="modal" 
                    class="btn btn-primary btn-sm">Edit</a> 
                    <a href="#delete<?php echo $obj->id;?>"  class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

<?php echo $links; ?>
                