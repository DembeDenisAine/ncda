

<?php require_once('add_participant_modal.php'); ?>

<a href="#create-participant" data-toggle="modal"
   class="btn btn-default btn-sm pull-right">Add Participant <i class="fas fa-plus"></i></a>
<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Organization</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>Mobile</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
         if($participants): 
            $i=0;  
            foreach($participants as $row):
             $i++; 

              require 'edit_contact_modal.php';
             ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row->title." ".$row->first_name." ".$row->last_name; ?></td>
                <td><?php echo $row->represents; ?></td>
                <td><?php echo $row->address; ?></td>
                <td><?php echo $row->phone; ?></td>
                <td><?php echo $row->mobile; ?></td>
                <td> <a href="#contact<?=$row->id?>" data-toggle="modal"><i class="fa fa-expand option-icon"></i> Details</a></td>
                
            </tr>
        <?php endforeach; endif; ?>

    </tbody>
</table>
                