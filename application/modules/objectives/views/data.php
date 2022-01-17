

<?php if(!empty($proj_id)) { ?>
    <a href="<?php echo base_url('create-objective/'.$proj_id);?>" 
    class="btn btn-success btn-sm pull-right">Create <i class="fas fa-plus"></i></a>
    <hr>
<?php } ?> 


<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Objective Title</th>
            <?php if(empty($proj_name)) { ?>
                <th>Project Title</th>
            <?php } ?> 
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

                <?php if($proj_name!='') { ?>
                    <td><?php echo $obj['project_name']; ?></td>
                <?php } ?> 

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
                