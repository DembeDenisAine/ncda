

<div class="btn-group">
    <a href="<?php echo base_url('activity-list/'.$activity->objective_id);?>" 
        class="btn btn-primary btn-sm ">
        <i class="fas fa-arrow-left"></i>
        Back to Activities 
    </a>
    <a href="#add_parameter"  data-toggle="modal" class="btn btn-success btn-sm pull-right"> 
        <i class="fas fa-plus"></i> Create New Indicator
    </a>
</div>

<?php require_once('add_parameter_modal.php'); ?>
<hr>

<div class="card list-card" style="border-left: 10px solid green;">
    <div class="card-body">
        <div class="col-md-12">
            <label>Activity:</label>
             <h5><?php echo $activity->activity_name; ?></h5>
        </div>
    </div>
</div>
<br>

<h4 class="text-muted">Activity Indicators</h4>

<table class="table table-bordered">
<thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Indicator Title</th>
        <th>Details</th>
        <th style="width: 150px">Action</th>
    </tr>
</thead>
<tbody>
    <?php  
           if($parameters): $i=0;  
           foreach($parameters as $param): 
           $i++; 

           require('update_parameter_modal.php');
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $param->parameter_name; ?></td>
            <td><?php echo $param->parameter_description; ?></td>
            <td>
                <a href="#edit_parameter<?=$param->id?>" data-toggle="modal" class="btn btn-primary btn-sm">Edit Indicator</a> 
                <!-- <a href="<?php echo base_url('delete-activity/'.$param->id);?>"  class="btn btn-danger btn-sm">Delete</a>-->
            </td> 
        </tr>
    <?php endforeach; endif; ?>

</tbody>
</table>