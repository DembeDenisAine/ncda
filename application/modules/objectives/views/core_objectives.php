<?php include('add_core_objective_modal.php'); ?>

<div class="row mb-4">
<a href="#add_objective"  data-toggle="modal"
class="btn btn-success btn-sm pull-right">Add Core Objective <i class="fas fa-plus"></i></a>
</div>

<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Objective Title</th>
            <th>Details</th>
            <th style="width: 150px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
           if($objectives): 
            $i = $page;  
            foreach($objectives as $obj):
                 $i++;
                 require('edit_core_objective_modal.php');
         ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $obj->objective_name; ?></td>
                <td><?php echo truncate($obj->objective_description,200); ?></td>
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
                