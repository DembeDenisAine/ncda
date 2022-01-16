<a href="<?php echo base_url('projects-list');?>" 
    class="btn btn-primary btn-sm pull-right">BAck to Projects <i class="fas fa-arrow-left"></i></a>
<hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
    <div class="row " >
        <div class="col-md-12">
            <label>Project:</label>
            <h4><?php echo $project->project_name; ?></h4>
            <label>Description: </label>
            <p><?php echo $project->project_description; ?></p>
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

<?php if(!empty($proj_id)) { ?>
    <a href="<?php echo base_url('create-objective/'.$project->id);?>" 
    class="btn btn-success btn-sm pull-right">New Objective <i class="fas fa-plus"></i></a>
<?php } ?>
<br> <br> 
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
        <?php  if($objectives): $i=0;  foreach($objectives as $obj): $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $obj['objective_name']; ?></td>
                <td><?php echo $obj['objective_description']; ?></td>
                <td>
                    <a href="<?php echo base_url('activity-list/'.$obj['id']);?>" 
                    class="btn btn-success btn-sm">Activities</a>
                </td>
                <td>
                    <a href="<?php echo base_url('edit-objective/'.$obj['id']);?>" 
                    class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-objective/'.$obj['id']);?>" 
                    class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>

<?php echo $links; ?>
                