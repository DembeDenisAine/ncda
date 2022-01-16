<a href="<?php echo base_url('create-parameter/'.$actv_id);?>" 
    class="btn btn-primary btn-sm ">
    <i class="fas fa-arrow-left"></i>
    Back to Activities 
</a>

<?php if(!empty($actv_id)) { ?>
    <a href="<?php echo base_url('create-parameter/'.$actv_id);?>" 
    class="btn btn-success btn-sm pull-right">Create <i class="fas fa-plus"></i></a>
    <hr>
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
        <th style="width: 150px">Action</th>
    </tr>
</thead>
<tbody>
    <?php  
           if($parameters): $i=0;  
           foreach($parameters as $param): 
           $i++; 
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $param->parameter_name; ?></td>

            <?php if(empty($actv_name)) { ?>
                <td><?php echo $actv['activity_name']; ?></td>
            <?php } ?> 

            <td><?php echo $param->parameter_description; ?></td>
            <td>
                <a href="<?php echo base_url('edit-parameter/'.$param->id);?>" 
                class="btn btn-primary btn-sm">Edit</a> <a href="<?php echo base_url('delete-activity/'.$param->id);?>" 
                class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    <?php endforeach; endif; ?>

</tbody>
</table>