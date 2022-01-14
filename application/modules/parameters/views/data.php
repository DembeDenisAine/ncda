
<?php if(!empty($actv_id)) { ?>
    <a href="<?php echo base_url('create-parameter/'.$actv_id);?>" 
    class="btn btn-success btn-sm pull-right">Create <i class="fas fa-plus"></i></a>
<?php } ?> 

<table class="table table-bordered">
<thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Parameter Title</th>
        <?php if(empty($actv_name)) { ?>
            <th>Activity</th>
        <?php } ?> 
        <th>Details</th>
        <th>Parameters</th>
        <th style="width: 150px">Action</th>
    </tr>
</thead>
<tbody>
    <?php  if($parameters): $i=0;  foreach($parameters as $actv): $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $actv['parameter_name']; ?></td>

            <?php if(empty($actv_name)) { ?>
                <td><?php echo $actv['activity_name']; ?></td>
            <?php } ?> 

            <td><?php echo $actv['parameter_description']; ?></td>
            <td>
                <a href="<?php echo base_url('parameter-list/'.$actv['id']);?>" 
                class="btn btn-success btn-sm">Parameters</a>
            </td>
            <td>
                <a href="<?php echo base_url('edit-parameter/'.$actv['id']);?>" 
                class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-activity/'.$actv['id']);?>" 
                class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    <?php endforeach; endif; ?>

</tbody>
</table>